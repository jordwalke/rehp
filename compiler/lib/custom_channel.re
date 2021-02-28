module ActualChannel = {
  type t =
    | OutChannel(out_channel)
    | Stdout(out_channel)
    | Buffer(Buffer.t);

  let of_out_channel = oc => OutChannel(oc);
  let of_stdout = so => Stdout(so);
  let of_buffer = b => Buffer(b);
};

module type CustomChannel = {
  type t;
  let make: (ActualChannel.t, ~onBeforeWrite: string => string=?, unit) => t;
  let add_substring: (t, string, int, int) => unit;
  let close: t => unit;
};

module Channel: CustomChannel = {
  type t = {
    channel: ActualChannel.t,
    buffer: Buffer.t,
    onBeforeWrite: string => string,
  };
  let make = (ch, ~onBeforeWrite=?, ()) => {
    channel: ch,
    buffer: Buffer.create(100),
    onBeforeWrite:
      switch (onBeforeWrite) {
      | Some(fn) => fn
      | None => (x => x)
      },
  };
  let add_substring = (t, s, i, l) =>
    Buffer.add_substring(t.buffer, s, i, l);
  let close = t =>
    t.buffer
    |> Buffer.contents
    |> t.onBeforeWrite
    |> (
      switch (t.channel) {
      | ActualChannel.OutChannel(oc) => output_string(oc)
      | ActualChannel.Stdout(so) => output_string(so)
      | ActualChannel.Buffer(b) => Buffer.add_string(b)
      }
    )
    |> (
      () => {
        // Cleanup
        Buffer.clear(t.buffer);
        switch (t.channel) {
        | ActualChannel.OutChannel(oc) => close_out(oc)
        | ActualChannel.Stdout(_)
        | ActualChannel.Buffer(_) => ()
        };
      }
    );
};
