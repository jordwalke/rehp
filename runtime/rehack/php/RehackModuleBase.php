<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Bridges async operations between Hack and Reason. This is an implementation
 * detail/utility. Product code should never deal with this directly. For the
 * actual API you should interact with, see RehackModuleBase.
 *
 * This is missing some open source implementations of primitives:
 *
 * C\gen_each
 */
abstract final class RehackAsyncInterop {
  /*
   * TODO: Make this reentrant. For now, we won't.
   */
  private static bool $isEntered = false;
  private static vec<(function(): Awaitable<void>)> $queue = vec[];

  /**
   * If we're doing more than 100 rounds of awaitables, then we likely have a
   * problem!
   */
  private static int $maxRounds = 100;

  /**
   * Enqueues an awaitable, and registers an associated callback to be invoked
   * when the awaitable is awaited.
   */
  public static function enqueueAwaitable<T>(
    // Creates an Awaitable
    dynamic /*(function(int): Awaitable<T>)*/ $create_awaitable,
    // Invoked with the result of the created Awaitable.
    dynamic $cb,
  ): void {
    self::$queue[] = async () ==> {
      $cb(await $create_awaitable(0));
    };
  }

  private static async function genFlushOneRound(
    string $_field_name,
  ): Awaitable<vec<Exception>> {
    $old_queue = self::$queue;
    // Important to reset the queue because processing
    // callbacks could end up enqueuing more operations.
    self::$queue = vec[];
    $exceptions = new Ref(vec[]);
    // New awaitable queue to use while waiting for all awaitables to resolve.
    // We saw issues where the running awaitables enqueue awaitables, but the
    // entire set is awaited on, and until all of them resolve the queue may be
    // non-empty. A lot of time can ellapse. In that time other calls into
    // syncCall could occur and perceive a non-empty queue. That's bad because
    // we need to know if sync calls end up enqueing awaitables and so we check
    // to make sure the count is zero after the syncCall is done. With the
    // holding cell pattern below we can maintain the invariant that the queue
    // remains empty at any point in time something could enter the Rehack
    // entrypoints.
    // We don't support "reentry" - a genCall running another genCall, but with
    // the holding cell pattern below, we should support multiple independent
    // genCalls/syncCalls.
    $awaitable_holding_cell = new Ref(vec[]);
    await C\gen_each($old_queue, async $f ==> {
      try {
        await $f();
        // Remove any that were added to the queue right *now* so that we don't
        // have to wait for any sibling awaitables to finish before resetting
        // the queue (which would leave our queue non-empty long enough for
        // another entry into Rehack runtime to perceive it!)
        foreach (self::$queue as $job) {
          $awaitable_holding_cell->value[] = $job;
        }
        self::$queue = vec[];
      } catch (Exception $e) {
        $exceptions->value[] = $e;
      }
    });
    // Now add them back so the next flush will occur.
    foreach ($awaitable_holding_cell->value as $job) {
      self::$queue[] = $job;
    }
    return $exceptions->value;
  }

  public static async function genFlush(string $field_name): Awaitable<void> {
    $exception_to_throw = null;
    for ($i = 0; $i < self::$maxRounds; $i++) {
      if (C\is_empty(self::$queue)) {
        break;
      }
      $exceptions = await self::genFlushOneRound($field_name);
      // Throw the first exception if there was one. If this makes debugging
      // hard, then go change the line where this exception is caught and
      // enqueued and just make it throw there.
      $exception_to_throw ??= C\nfirst($exceptions);
    }
    if ($exception_to_throw !== null) {
      $new_to_throw = new Exception(
        "Error in compiled Reason code computing next ".
        "set of awaitables during genFlush",
        0,
        // Chaining the previous exception here.
        $exception_to_throw,
      );
      throw $new_to_throw;
    }
    if ($i >= self::$maxRounds) {
      throw new \Exception(
        'Flushing more than maxRounds which means there is likely a bug '.
        'in enqueueing IO/fetches',
      );
    }
  }

  public static function assertQueueCount(int $count): void {
    if (C\count(self::$queue) !== $count) {
      throw new \Exception(
        'Unexpected enqueueing of IO operations before or after sync call. This '.
        'should not occur when calling synchronously into Rehack generated code. '.
        'If you see this message at the end of a sync call, then your sync call '.
        'enqueued async when it should not have. It should have used genCall. '.
        'If seeing this at the beginning of a syncCall, then it is likely some '.
        'failed handling of queue cleanup upon previous error. In that case, '.
        'contact ads_prod_infra/jwalke.',
      );
    }
  }
  public static function assertQueueEmpty(): void {
    if (!C\is_empty(self::$queue)) {
      throw new \Exception(
        'The async queue should be completely drained at the end of processing'.
        'genCalls',
      );
    }
  }
}

/**
 * Base class for all compiled Reason modules. Implements interop between Hack
 * code and Reason.
 *
 * Calling Synchronously From Reason Into Hack:
 * --------------------------------------------
 * Use the Extern modules:
 *
 * let result =
 *   Extern.call2(
 *     Extern.rawExpr("\\HackClass::something"),
 *     Extern.fromVal(someArg),
 *     Extern.fromVal(100),
 *   );
 *
 * Calling Asynchronously From Reason Into Hack:
 * --------------------------------------------
 * Use the Extern modules, but this time to create Hack Awaitables.  Then use
 * `Lib.await` to await on them instead of just calling them directly.
 *
 * // Make a function that returns an awaitable.
 * let createMyAwaitable =
 *   () => Extern.call(
 *     Extern.raw("SomeAwaitable::make"),
 *     Extern.fromVal(someArg)
 *   );
 * // Pass it to Lib.await. The second arg (callback) will be invoked
 * // with the result of awaiting.
 * let result = Lib.await(createAwaitable, res => Console.log(res));
 *
 *
 * Calling Synchronously From Hack to Reason:
 * ------------------------------------------
 *
 * First, export the bindings you want to be exposed from Reason to Hack.
 * To do that, include them in your MyReasonModule.re module like:
 *
 *   let myReasonField = 0;
 *   let myReasonFunction = i => i;
 *   let notExportedField = "not exported";
 *   let exports = Extern.obj([|
 *     ("myReasonField", Extern.toUnsafe(myReasonField)),
 *     ("myReasonFunction", Extern.toUnsafe(myreasonFunction)),
 *   |]);
 *
 * Then call one of the exported items from Hack via:
 *
 *     Rehack\MyReasonModule::syncCall("myReasonFunction", 999);
 *
 * Calling Asynchronously From Reason Into Hack:
 * --------------------------------------------
 *
 * Export your desired items from MyReasonModule as before, but to expose async
 * functions to Hack, they should be of the form:
 *
 *     let exportThis = (arg1, arg2, cb) =>  {
 *        // Do some async stuff then invoke cb when done.
 *        // You should invoke callback with unit even if you don't
 *        // need to return anything.
 *        cb(result);
 *     };
 *
 *     let exports = Extern.obj([|i
 *       ("exportThis", Extern.toUnsafe(exportThis))
 *     |]);
 *
 * If your exported function is of that form (with the final arg being a callback)
 * then it can be called asynchronously from Hack and can be awaited upon.
 *
 *     $result = await Rehack\GeneratedModule::genCall(
 *       "exportedFieldName",
 *       arg1,
 *       arg2,
 *     );
 *
 * When awaiting on the async Reason function via `genCall`, do not provide the
 * callback argument.
 *
 * Invariant: The Async queue should always be empty whenever new calls into
 * Rehack are "reentered".
 */
abstract class RehackModuleBase {
  /**
   * Returns the compiled module output.
   */
  abstract public static function get(): Vector<dynamic>;

  /**
   * Gets the "exports" from Reason to Hack.
   */
  private static function getExports(): dynamic {
    $module = static::get();
    $count = C\count($module);
    $exports = null;
    for ($i = $count - 1; $i >= 0; $i--) {
      if (is_array($module[$i])) {
        if ($exports !== null) {
          throw new \Exception(
            'Rehack compiled module exports more than one Hack array'.
            'The "exports" are the first item in the module that are a '.
            'standard Hack array. See comment on RehackModuleBase',
          );
        }
        $exports = $module[$i];
      }
    }
    if ($exports === null) {
      throw new \Exception(
        'Rehack compiled module does not contain exports but '.
        'exports were requested. The "exports" are the first item in '.
        'the module that are a standard Hack array. See comment on '.
        'RehackModuleBase',
      );
    }
    return $exports;
  }

  private static function callRehackFunction(
    dynamic $f,
    varray<dynamic> $args,
  ): mixed {
    $count = C\count($args);
    if ($count === 0) {
      // Call with the "unit" arg.
      return $f(0);
    } else if ($count === 1) {
      return Rehack\caml_call1($f, $args[0]);
    } else if ($count === 2) {
      return Rehack\caml_call2($f, $args[0], $args[1]);
    } else if ($count === 3) {
      return Rehack\caml_call3($f, $args[0], $args[1], $args[2]);
    } else if ($count === 4) {
      return Rehack\caml_call4($f, $args[0], $args[1], $args[2], $args[3]);
    } else if ($count === 5) {
      return
        Rehack\caml_call5($f, $args[0], $args[1], $args[2], $args[3], $args[4]);
    } else if ($count === 6) {
      return Rehack\caml_call6(
        $f,
        $args[0],
        $args[1],
        $args[2],
        $args[3],
        $args[4],
        $args[5],
      );
    } else if ($count === 7) {
      return Rehack\caml_call7(
        $f,
        $args[0],
        $args[1],
        $args[2],
        $args[3],
        $args[4],
        $args[5],
        $args[6],
      );
    } else if ($count === 8) {
      return Rehack\caml_call8(
        $f,
        $args[0],
        $args[1],
        $args[2],
        $args[3],
        $args[4],
        $args[5],
        $args[6],
        $args[7],
      );
    } else {
      throw new \Exception(
        'Cannot call into Rehack generated code with > 8 parameters',
      );
    }
  }

  private static function syncCallFunctionWithArgs(
    string $function_name_for_debug,
    dynamic $f,
    dynamic ...$args
  ): dynamic {
    RehackAsyncInterop::assertQueueCount(0);
    // Synchronous calls should not ever add to the queue.
    $exports = self::getExports();
    $f = $exports[$function_name_for_debug];
    if (!PHP\is_callable($f)) {
      throw new \Exception(
        'Calling into generated Rehack code requesting to call function '.
        $function_name_for_debug.
        ' but that field is not a function',
      );
    }
    $ret = self::callRehackFunction($f, $args);
    RehackAsyncInterop::assertQueueCount(0);
    return $ret;
  }


  /**
   * Make blocking, non-async calls into Rehack code. If calling `syncCall`,
   * and an IO is attempted, then a runtime exception will be raised because
   * someone is calling into a synchronous entrypoint, and something is
   * attempting to schedule a Awaitable.
   * Because we always maintain a perceived queue count of zero outside of
   * processing the queue, we can check if the queue count remains zero in
   * order to detect syncCalls attempting to enqueue awaitables.  In
   * `syncCall`, the final argument is merely for debugging purposes.  In
   * `syncCallName`, the first (string) argument is to resolve the name of the
   * export from a dictionary (this API shouldn't be used any more now that we
   * have `syncCall` with automatically named exports (no dictionary required).
   */
  public static function syncCall(
    string $debug_name,
    int $index,
    dynamic ...$args
  ): dynamic {
    // Synchronous calls should not ever add to the queue.
    RehackAsyncInterop::assertQueueCount(0);
    $module = static::get();
    $f = $module[$index];
    return self::syncCallFunctionWithArgs($debug_name, $f, ...$args);
  }


  public static function syncCallName(
    string $field_name,
    dynamic ...$args
  ): dynamic {
    // Synchronous calls should not ever add to the queue.
    RehackAsyncInterop::assertQueueCount(0);
    $exports = self::getExports();
    $f = $exports[$field_name];
    return self::syncCallFunctionWithArgs($field_name, $f, ...$args);
  }

  /**
   * Performs calls into Rehack code that may perform async operations.
   * @param $field_name is only used for debugging/logging purposes.
   */
  protected static async function genCallFunctionWithArgs(
    dynamic $f,
    varray<dynamic> $args,
    dynamic $field_name,
  ): Awaitable<dynamic> {
    if (!PHP\is_callable($f)) {
      throw new \Exception(
        'Calling into generated Rehack code requesting to call function '.
        $field_name.
        ' but that field is not a function',
      );
    }
    $didCallCallback = new Ref(false);
    $result = new Ref(null);

    $args[] = (
      (dynamic $res) ==> {
        if ($didCallCallback->value !== false) {
          throw new \Exception(
            'When genCall-ing into exported '.
            static::class.
            '->'.
            $field_name.
            ' the hack callback was invoked more than once.',
          );
        }
        $didCallCallback->value = true;
        $result->value = $res;
        return 0;
      }
    ) as dynamic;
    $unit = self::callRehackFunction($f, $args);
    if ($unit !== 0) {
      throw new \Exception(
        'When genCall-ing into exported '.
        static::class.
        '->'.
        $field_name.
        ' with '.
        (C\count($args) - 1).
        ' args '.
        '(plus one additional arg automatically passed by '.
        'the system), the return value was not unit/0, which means you '.
        'probably did not supply enough arguments or you are calling '.
        'the wrong member.',
      );
    }
    await RehackAsyncInterop::genFlush($field_name);
    if (!$didCallCallback->value) {
      throw new \Exception(
        'When calling into exported '.
        static::class.
        "->".
        $field_name.
        ' the generated Rehack code did not invoke the supplied callback '.
        'with the final result.',
      );
    }
    RehackAsyncInterop::assertQueueEmpty();
    return $result->value;
  }

  /**
  * Performs calls into Rehack code that may perform async operations.
  */
  public static async function genCallName(
    string $field_name,
    dynamic ...$args
  ): Awaitable<dynamic> {
    $exports = self::getExports();
    $f = $exports[$field_name];
    return await self::genCallFunctionWithArgs($f, $args, $field_name);
  }

  /**
   * Performs calls into Rehack code that may perform async operations, and
   * resolves the function by integer index.
   */
  public static async function genCall(
    string $debug_name,
    int $index,
    dynamic ...$args
  ): Awaitable<dynamic> {
    $module = static::get();
    $f = $module[$index];
    return await self::genCallFunctionWithArgs($f, $args, $debug_name);
  }
}
