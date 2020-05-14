/**
 * Good reading: (Some outdated)
 * -----------------------------
 * https://eager.io/blog/a-brief-history-of-weird-scripting-languages/
 * https://www.oreilly.com/library/view/even-faster-web/9780596803773/ch04.html
 *
 *    "Iframes are loaded in parallel with other components in the main page.
 *    Whereas iframes are typically used to include one HTML page within another,
 *    the Script in Iframe technique leverages them to load JavaScript without
 *    blocking, as shown by the Script in Iframe example."
 *
 *
 * https://eager.io/blog/everything-I-know-about-the-script-tag/
 *
 *   crossorigin:
 *     "The idea is if you apply a handler to the window.onerror event, that
 *     handler is provided with some information about the page and script
 *     which you perhaps shouldn’t have if you’re loading code from an external
 *     site.  In secure browsers this info is not included unless you specify
 *     crossorigin."
 *
 *    "If you have a perverse desire to, you can also override the default type
 *    for every script tag on the page using a meta tag:"
 *
 *        <meta http-equiv="Content-Script-Type" content="text/vbscript">
 *
 * https://eager.io/blog/the-curious-case-of-document-write/
 *
 * Ideas for improving load time performance:
 * -----------------------------------------
 * 1. See https://www.html5rocks.com/en/tutorials/speed/script-loading/
 * "link[rel=subresource]" You can store the absolute paths to modules in local
 * storage and add those prefetches to the head upon refresh.
 * 2. A single iframe for actually executing the modules. The problem is that
 * the modules might polute the global namespace.
 *
 * Ideas for eliminating errors at load time (See Stdlib__int32.js)
 * ----------------------------------------------------------------
 * Save the previous load order in local storage and use as heuristic to make
 * sure test modules are loaded with the right previously scraped ones.  This
 * will also improve performance.
 */
(function (glob) {
  function normalizeDataPath(main) {
    if (main) {
      if (
        main.lastIndexOf(".js") !== -1 ||
        main.lastIndexOf(".js") === main.length - 3
      ) {
        if (main.indexOf("/") === -1 && main[0] !== ".") {
          main = "./" + main;
        }
      }
      return main;
    }
    return null;
  }
  function parseBuildRootLocator(string) {
    var matchBuildRootLocator = string.match(/\${([^}]*)}\/(.*)/);
    if (matchBuildRootLocator) {
      var buildRootLocatorRelativeToPage = matchBuildRootLocator[1];
      var mainModulePathRelativeToBuildRoot = matchBuildRootLocator[2];
      return [
        buildRootLocatorRelativeToPage,
        mainModulePathRelativeToBuildRoot,
      ];
    } else {
      return [null, normalizeDataPath(string)];
    }
  }
  function extractAbsoluteMainModuleAsync(andThen) {
    var main = document.querySelector("script[data-main]");
    if (main) {
      var main = main.dataset.main;
      var parsed = parseBuildRootLocator(main);
      var buildRootLocatorRelativeToPage = parsed[0];
      var mainModulePathRelativeToBuildRoot = parsed[1];
      // The buildRootLocatorRelativeToPage script should set
      // `window.jsModulesAbsoluteRoot`, the build path relative to the
      // project root (which is for now always assumed to be the directory of
      // the current html page (todo: improve)).
      if (buildRootLocatorRelativeToPage) {
        var absBuildRootLocator =
          OneClick.dirName(OneClick.absNormalizedHtmlPath) +
          "/" +
          buildRootLocatorRelativeToPage;
        var scriptTag = document.createElement("script");
        scriptTag.type = "text/javascript";
        scriptTag.addEventListener("error", function () {
          andThen(
            null,
            "Build root locator " +
              absBuildRootLocator +
              " appears to not exist but was specified in the data-main" +
              " portion of the one-click.js script tag."
          );
        });
        scriptTag.addEventListener("load", function () {
          if (!window.jsModulesAbsoluteRoot) {
            andThen(
              null,
              "Build root locator at " +
                absBuildRootLocator +
                " did not set window.jsModulesAbsoluteRoot"
            );
          } else {
            andThen(
              OneClick.resolveFromAbsolute(
                window.jsModulesAbsoluteRoot,
                mainModulePathRelativeToBuildRoot
              ),
              null
            );
          }
        });
        document.body.appendChild(scriptTag);
        scriptTag.src = buildRootLocatorRelativeToPage;
      } else {
        andThen(
          normalizeDataPath(
            OneClick.resolveFromAbsolute(
              OneClick.dirName(OneClick.absNormalizedHtmlPath),
              main
            )
          ),
          null
        )
      }
    } else {
      andThen(
        null,
        "There is no data-main attribute on your one-click.js script tag."
      );
    }
  }

  function getNodeModulesAbsolutePath() {
    getAbsoluteNormalizedProjectRootPath() + "/node_modules";
  }

  function getNormalizedHtmlPath() {
    if (window.location.protocol === "file:") {
      var pathname = window.location.pathname;
      // Windows drive pathname. Turn /C:/foo into C:/foo
      if (pathname[0] === "/" && pathname[2] === ":" && pathname[3] === "/") {
        return pathname.substr(1);
      } else {
        return pathname;
      }
    } else {
      throw "one-click.js only works when loaded with file:// urls to an html page";
    }
  }
  /**
   * TODO: Allow attribute on html page to say that project root is actually
   * ../../
   */
  function getAbsoluteNormalizedProjectRootPath() {
    return OneClick.dirName(OneClick.absNormalizedHtmlPath);
  }

  function getPnpFilePath() {
    var pnpDir = document.querySelector("script[data-pnp]");
    if (pnpDir) {
      var pnpDir = pnpDir.dataset.pnp;
      return normalizeDataPath(pnpDir);
    } else {
      return null;
    }
  }

  var windowSetup = Object.getOwnPropertyNames(window)
    .reduce(function (cur, nm) {
      return nm[0].toUpperCase() === nm[0]
        ? cur.concat([nm + " = parent." + nm])
        : cur;
    }, [])
    .join(",");
  windowSetup += ";\n" + "process = {" + "  env: { }" + "};";
  var megaProxyFields = (varName, recordInto) => `
    var megaProxyFields = {
      get: function(target, prop, receiver) {
        if(prop == Symbol.toPrimitive) {
          return function() {0;};
        }
        return megaProxy;
      },
      has: function(target, key) {
        return true;
      },
      apply: function(target, thisArg, argumentsList) {
        return megaProxy;
      },
      construct: function(target, args) {
        return megaProxy;
      },
      set: function(obj, prop, value) {
        return value;
      }
    };
    // The proxy proxies a function for maximum proxiness.
    var megaProxy = new Proxy(function(){}, megaProxyFields);
    var ${varName} = new Proxy(function(){}, {
      get: function(target, prop, receiver) {
        ${recordInto}[modPath].push(prop);
        return megaProxy;
      },
      set: megaProxyFields.set,
      has: megaProxyFields.has,
      apply: megaProxyFields.apply,
      construct: megaProxyFields.construct
    });
  `;

  function printCircularDepError(wasNotLoaded) {
    // TODO: Support circular dependencies.
    var sawCircle = false;
    console.error(
      "Circular dependency or unsatisfiable module %c" +
        wasNotLoaded.relPath +
        "%c -> [" +
        Object.keys(wasNotLoaded.fieldAccessesByDependency)
          .map(function (dep) {
            return !OneClick.modulesFromRoot[dep]
              ? "empty "
              : (!sawCircle && dep === wasNotLoaded.relPath
                  ? ((sawCircle = true), "%c" + dep + "%c")
                  : dep) +
                  " -> [" +
                  Object.keys(
                    OneClick.modulesFromRoot[dep].fieldAccessesByDependency
                  )
                    .map(function (depDep) {
                      return !sawCircle && depDep === wasNotLoaded.relPath
                        ? ((sawCircle = true), "%c" + depDep + "%c")
                        : depDep;
                    })
                    .join(", ") +
                  "]";
          })
          .join(", ") +
        "]",
      "font-weight:bold; background: red; color: #ffffff",
      "font-weight:normal; background: none; color: none",
      sawCircle
        ? "font-weight:bold; background: red; color: #ffffff"
        : ". Inspect the following window.OneClick.modulesFromRoot dependency graph for cicular references. ",
      sawCircle
        ? "font-weight:normal; background: none; color: none"
        : window.OneClick.modulesFromRoot
    );
  }
  function resolveImpl(requiringDir, toRel) {
    if (toRel.length === 0) {
      throw ["Cannot resolve ", requiringDir.join("/"), toRel.join("/")];
    } else if (
      toRel[0][0] == "." &&
      toRel[0][1] === "." &&
      toRel[0].length === 2
    ) {
      if (requiringDir.length == 0) {
        return toRel;
      }
      return resolveImpl(
        requiringDir.slice(0, requiringDir.length - 1),
        toRel.slice(1)
      );
    } else {
      var total = requiringDir.concat(toRel);
      return total;
    }
  }
  var normalizeRequireOutsidePackage = function (path) {
    var splits = path.split("/");
    // require('someDependency/multiple/slashes/')
    // require('someDependency/')
    // require('someDependency')
    // Assume index.js
    if (path[path.length - 1] === "/" || splits.length === 1) {
      var last = splits[0];
      if (path.lastIndexOf(".js") !== path.length - 3) {
        return path + "/index.js";
      } else {
        return path;
      }
    } else {
      // Multiple slashes, path not ending in slash
      // require('someDependency/multiple/slashes.js')
      // require('someDependency/multiple/slashes')
      // Just ensure there is a .js at the end if not already there.
      if (path.lastIndexOf(".js") !== path.length - 3) {
        return path + ".js";
      } else {
        return path;
      }
    }
  };
  var normalizeRequireCallInsideAPackage = function (p) {
    if (p.length > 0 && p[p.length - 1] !== "/") {
      if (
        p.length > 3 &&
        p[p.length - 1] !== "s" &&
        p[p.length - 2] !== "j" &&
        p[p.length - 3] !== "."
      ) {
        return p + ".js";
      } else {
        return p;
      }
    } else {
      return p + "/index.js";
    }
  };
  /**
   * Only works for absolute paths.
   * C:/path/to/this/thing
   * C:/path/to/another/thing
   * =>
   * path/to/this/thing
   * path/to/another/thing
   * =>
   * to/this/thing
   * to/another/thing
   * =>
   * this/thing
   * another/thing
   * =>
   * ../ +
   * this/thing
   * another/thing
   */
  var relativeAbsolutesImpl = function (from, to) {
    if (from.length != 0 && to.length != 0) {
      if (from[0] === to[0]) {
        return relativeAbsolutesImpl(from.slice(1), to.slice(1));
      } else {
        return [".."].concat(relativeAbsolutesImpl(from.slice(1), to));
      }
    } else if (to.length !== 0) {
      // from.length must be
      return to;
    } else if (from.length !== 0) {
      return [".."].concat(relativeAbsolutesImpl(from.slice(1), []));
      // to.length must be
    }
  };
  var relativeAbsolutes = function (from, to) {
    if (from.length && from[from.length - 1] === "/") {
      from = from.substr(0, from.length - 1);
    }
    var from = from.split("/");
    var to = to.split("/");
    return relativeAbsolutesImpl(from, to).join("/");
  };
  var isRequiringInsideProject = function (requireCall) {
    return (
      (requireCall[0] === "." && requireCall[1] === "/") ||
      (requireCall[0] === "." &&
        requireCall[1] === "." &&
        requireCall[2] === "/")
    );
  };
  var OneClick = {
    // Set to true to debug the module loading.
    __DEBUG__MODULE_LOADING: false,
    absNormalizedHtmlPath: null,
    absMainPath: null,
    // If they specified a build output locator, we may not even know the path
    // to main so need a separate queue.
    cbsWaitingAbsMainPath: [],
    modulesFromRoot: {},
    pnpModuleExports: null,
    onMainRequireable: function onAbsoluteRequirable(cb) {
      if (!OneClick.absMainPath) {
        OneClick.cbsWaitingAbsMainPath.push(cb);
      } else {
        var reqPath = OneClick.absMainPath;
        var moduleData = OneClick.modulesFromRoot[reqPath];
        if (!moduleData || moduleData.status !== "loading") {
          OneClick.cbsWaitingAbsMainPath.push(cb);
        } else {
          return cb(moduleData.moduleExports);
        }
      }
    },
    // Convenience to subscribe to the main module being loaded.
    onMain: function onMain(cb) {
      OneClick.onMainRequireable(cb);
    },
    relativeAbsolutes: relativeAbsolutes,
    dirName: function (p) {
      var split = p.split("/");
      return split.slice(0, split.length - 1).join("/");
    },
    baseName: function (p) {
      var split = p.split("/");
      return split.length !== 0 ? split[split.length - 1] : "";
    },
    /**
     * Should behave like require('path').resolve for absolute "from".
     */
    resolveFromAbsolute: function (abs, to) {
      if (abs.length > 0 && abs[abs.length - 1] === "/") {
        abs = abs.substring(0, abs.length - 1);
      }
      if (OneClick.isAbs(to)) {
        return to;
      } else {
        var fromRelativeToRootSplit = abs.split("/");
        var toRelativePathSplit = to.split("/");
        // Remove all relative ".". Everything will just be either ../ or
        // implicitly relative.
        var fromRelativeToRootSplit =
          fromRelativeToRootSplit[0] === "."
            ? fromRelativeToRootSplit.slice(1)
            : fromRelativeToRootSplit;
        var toRelativePathSplit =
          toRelativePathSplit[0] === "."
            ? toRelativePathSplit.slice(1)
            : toRelativePathSplit;
        var segments = resolveImpl(
          // Remove the depending file, to leave only the dir
          fromRelativeToRootSplit,
          toRelativePathSplit
        );
        return segments.join("/");
      }
    },

    /**
     * Only handles modules outside of the requesters current package.
     */
    requireResolveUsingPnp: function (requestedBy, requireCall) {
      if (OneClick.pnpModuleExports) {
        // Only use pnp for dependencies outside of project.
        if (!isRequiringInsideProject(requireCall)) {
          requireCall = normalizeRequireOutsidePackage(requireCall);
          // Have to tell pnp that we're requiring "from the top of the project"
          var rootProjectDir = getAbsoluteNormalizedProjectRootPath();
          if (requestedBy.indexOf(rootProjectDir) === 0) {
            return OneClick.pnpModuleExports.resolveUnqualified(
              OneClick.pnpModuleExports.resolveToUnqualified(
                requireCall,
                rootProjectDir
              )
            );
          } else {
            return OneClick.pnpModuleExports.resolveUnqualified(
              OneClick.pnpModuleExports.resolveToUnqualified(
                requireCall,
                requestedBy
              )
            );
          }
        } else {
          return null;
        }
      } else {
        return null;
      }
    },
    requireResolveNodeApprox: function (requiringFileAbs, requireCall) {
      if (isRequiringInsideProject(requireCall)) {
        // If you're requiring inside your own project, you couldn't possibly
        // be requesting an implicit index inside your own package (unless you
        // were requesting a directory, in which case it might have a slash).
        requireCall = normalizeRequireCallInsideAPackage(requireCall);
        // This is what node requires are actually doing - they are a "resolve"
        // relative to the dir.
        var requiringDir = OneClick.dirName(requiringFileAbs);
        return OneClick.resolveFromAbsolute(requiringDir, requireCall);
      } else {
        var nodeModulesAbs = getNodeModulesAbsolutePath();
        return (
          nodeModulesAbs + "/" + normalizeRequireOutsidePackage(requireCall)
        );
      }
    },
    requireResolve: function (requiringFileAbs, requireCall) {
      if (OneClick.isAbs(requireCall)) {
        return requireCall;
      }
      var usingPnp = OneClick.requireResolveUsingPnp(
        requiringFileAbs,
        requireCall
      );
      if (usingPnp) {
        return usingPnp;
      } else {
        return OneClick.requireResolveNodeApprox(requiringFileAbs, requireCall);
      }
    },
    isAbs: function (p) {
      return p[0] === "/" || (p.length > 3 && p[1] === ":" && p[2] === "/");
    },
  };
  var canAndShouldBeLoadedNow = function (moduleData) {
    var allLoading = true;
    if (moduleData.status !== "loading") {
      for (var dep in moduleData.fieldAccessesByDependency) {
        if (OneClick.modulesFromRoot[dep].status !== "loading") {
          return null;
        }
      }
      return moduleData;
    } else {
      return null;
    }
  };
  // This time allow returning a module if its deps aren't loading yet, but
  // only as long as their backwards referenced module load-time field accesses
  // are empty.
  var canBreakCircularDependency = function (moduleData) {
    var allLoading = true;
    if (moduleData.status !== "loading") {
      for (var dep in moduleData.fieldAccessesByDependency) {
        var invalidatesAbilityToBreakCircularDependency =
          OneClick.modulesFromRoot[dep].status !== "loading" &&
          moduleData.fieldAccessesByDependency[dep].length !== 0;
        if (invalidatesAbilityToBreakCircularDependency) {
          return null;
        }
      }
      return moduleData;
    } else {
      return null;
    }
  };
  var notLoaded = function (moduleData) {
    if (moduleData.status !== "loading") {
      return moduleData;
    } else {
      return null;
    }
  };
  function allNonNull(predicate) {
    var all = [];
    for (var aRelModPath in OneClick.modulesFromRoot) {
      var moduleData = OneClick.modulesFromRoot[aRelModPath];
      var result = predicate(moduleData);
      if (result !== null) {
        return [result];
      }
    }
    return all;
  }
  window.require = function (path) {
    var resolved = OneClick.requireResolve(
      OneClick.absNormalizedHtmlPath,
      path
    );
    var moduleData = OneClick.modulesFromRoot[resolved];
    if (!moduleData) {
      throw (
        "Module " +
        resolved +
        " has not been initialized by anyone. You specified " +
        path
      );
    }
    if (moduleData.status !== "loading") {
      throw new Error(
        "Module has not yet been loaded " +
          path +
          ". Use OneClick.onRequirable(pathFromRoot, callback) or OneClick.onMain(cb) to " +
          "ensure the module is loaded before your code runs."
      );
    }
    return moduleData.moduleExports;
  };
  function loadModuleForModuleData(moduleData) {
    moduleData.status = "loading";
    var iframe = document.createElement("iframe");
    iframe.name = OneClick.baseName(moduleData.relPath);
    iframe.style = "display:none !important";
    document.body.appendChild(iframe);
    var doc = iframe.contentWindow.document;
    // If you remove the iframe, it will make it so that break points within it
    // do not work (and debugger calls as well) (and calls to console.log).
    var isolatedScript = `
        <html><head><title></title></head><body>
        <script>
          ${windowSetup}
          if(parent.OneClick.__DEBUG__MODULE_LOADING) {
            console.log('loading module ${moduleData.relPath}');
          }
          var origExports = {};
          window.module = {
            exports: origExports
          };
          window.exports = module.exports;
          require = function(reqPath) {
            var resolved = parent.OneClick.requireResolve("${moduleData.relPath}", reqPath);
            var moduleData = parent.window.OneClick.modulesFromRoot[resolved];
            if(!moduleData) {
              console.error(
                'Could not get module exports from ${moduleData.relPath} requiring ' +
                reqPath + '.' +
                ' This may be because we could not scrape the dependencies of ' + reqPath + '.' +
                'It might only issue its require statements later in the file. Try moving them ' +
                'closer to the top of the file.'
              );
              var moduleExports = {};
            } else {
              var moduleExports = moduleData.moduleExports;
            }
            return moduleExports;
          };
          // In this case, remapping the console isn't just for compatibility,
          // but there's a bug in chrome where consoles of iframes don't work.
          // https://github.com/karma-runner/karma/issues/1373
          // There's still an issue with the debugger not working in iframe'd
          // modules (Chrome only - no repro in Safari).
          // I believe it's becaue the code you place a debugger in is executed
          // in the iframe's context, but when called from another context such
          // as the Devtools Console does not invoke debuggers.
          // TODO: Add all the other builtins.
          Array = parent.Array;
        </script>
        <script src="${moduleData.relPath}"> </script></body></html>
        <script>
          if(typeof window.module.exports === 'object') {
            for(var exportedKey in window.module.exports) {
              parent.window.OneClick.modulesFromRoot["${moduleData.relPath}"].moduleExports[exportedKey] =
                window.module.exports[exportedKey];
            }
          } else {
            parent.window.OneClick.modulesFromRoot["${moduleData.relPath}"].moduleExports =
              window.module.exports;
          }

          if(parent.OneClick.__DEBUG__MODULE_LOADING) {
            console.log('set module exports ${moduleData.relPath}');
          }
         parent.afterModuleLoad(parent.window.OneClick.modulesFromRoot["${moduleData.relPath}"]);

        </script>
        </body></html>
    `;
    if (parent.OneClick.__DEBUG__MODULE_LOADING) {
      console.log("writing script for " + moduleData.relPath);
    }
    doc.open();
    doc.write(isolatedScript);
    doc.close();
    if (parent.OneClick.__DEBUG__MODULE_LOADING) {
      console.log("wrote script for " + moduleData.relPath);
    }
  }
  var handleScrapeMesage = function (moduleAt, makesRequireCalls) {
    var fieldAccessesByDependency = {};
    OneClick.modulesFromRoot[moduleAt].status = "scraped";
    for (var requireCall in makesRequireCalls) {
      var fieldAccesses = makesRequireCalls[requireCall];
      var rootRelRequireCall = OneClick.requireResolve(moduleAt, requireCall);
      fieldAccessesByDependency[rootRelRequireCall] = fieldAccesses;
      // Crawls the fieldAccessesByDependency:
      requireScrapeRound(moduleAt, requireCall);
    }
    OneClick.modulesFromRoot[
      moduleAt
    ].fieldAccessesByDependency = fieldAccessesByDependency;
    function allHaveStatus(status) {
      var allHave = true;
      for (var aRelModPath in OneClick.modulesFromRoot) {
        var moduleData = OneClick.modulesFromRoot[aRelModPath];
        for (var dependency in moduleData.fieldAccessesByDependency) {
          if (
            !OneClick.modulesFromRoot[dependency] ||
            OneClick.modulesFromRoot[dependency].status !== status
          ) {
            allHave = false;
          }
        }
      }
      return allHave;
    }
    var allScraped = allHaveStatus("scraped");
    if (allScraped) {
      var loadNext = function (max, previousLoadedModuleData) {
        if (max === 0) {
          throw "Could not load modules after 100 attempts";
        }
        var canBeLoaded = (canBeLoaded = allNonNull(canAndShouldBeLoadedNow));
        if (canBeLoaded.length === 0) {
          canBeLoaded = allNonNull(canBreakCircularDependency);
        }
        if (canBeLoaded.length !== 0) {
          window.afterModuleLoad = loadNext.bind(null, max - 1);
          canBeLoaded.forEach(function (cbl) {
            loadModuleForModuleData(cbl);
          });
        } else {
          var wasNotLoaded = allNonNull(notLoaded);
          if (wasNotLoaded.length !== 0) {
            printCircularDepError(wasNotLoaded);
          }
        }
        if (previousLoadedModuleData) {
          if (OneClick.absMainPath === previousLoadedModuleData.relPath) {
            OneClick.cbsWaitingAbsMainPath.forEach(function (cb) {
              cb(previousLoadedModuleData.moduleExports);
            });
            OneClick.cbsWaitingAbsMainPath = [];
          }
        }
      };
      loadNext(100, null);
    }
  };

  var handlePnpShimLoaded = function (moduleAt, makesRequireCalls) {
    if (parent.OneClick.__DEBUG__MODULE_LOADING) {
      console.log("handlePnpShimLoaded", makesRequireCalls);
    }
  };

  var handleBadRequireMessage = function (requestedBy, requireCall) {
    console.error(
      "Module " +
        requestedBy +
        " required('" +
        requireCall +
        "') which does not exist."
    );
  };
  var handleBadPnpShimRequireMessage = function (requireCall) {
    console.error(
      "You attempted to load pnp file  " +
        'data-pnp="' +
        requireCall +
        '"' +
        " requested by the one-click.js script tag attributes. " +
        " The pnp file specified could not be loaded for some reason. Does it exist?" +
        " We will fall back to regular resolving of modules in node_modules but if you installed things " +
        " via a pnp style package manager, this likely won't work because your node_moules aren't where " +
        " your modules are located. We'll try anyways. Expect tons of failures!"
    );
  };
  // We get messages back about which modules depend on which.
  window.onmessage = function (msg) {
    if (msg.data.type === "scrapeMessage") {
      handleScrapeMesage(msg.data.moduleAt, msg.data.makesRequireCalls);
    } else if (msg.data.type === "pnpShimLoaded") {
      handlePnpShimLoaded(msg.data.moduleAt, msg.data.makesRequireCalls);
    } else if (msg.data.type === "badRequire") {
      handleBadRequireMessage(msg.data.requestedBy, msg.data.requireCall);
    } else if (msg.data.type === "badRequireByPnpShim") {
      handleBadPnpShimRequireMessage(msg.data.requireCall);
    }
  };
  function requireScrapeRound(fromModulePath, reqPath) {
    var relativized = OneClick.requireResolve(fromModulePath, reqPath);
    return scrapeModuleIdempotent(relativized, fromModulePath);
  }
  function requirePreparePnpShim(pnpFilePath) {
    var relativized = OneClick.requireResolve(
      OneClick.absNormalizedHtmlPath,
      pnpFilePath
    );
    return scrapePnpShimInDir(relativized);
  }
  function requirePrepareMain(reqPath) {
    return requireScrapeRound(OneClick.absNormalizedHtmlPath, reqPath);
  }
  function scrapeModuleIdempotent(relPathFromRoot, requestedBy) {
    if (OneClick.modulesFromRoot[relPathFromRoot]) {
      if (
        OneClick.modulesFromRoot[relPathFromRoot].status === "scraping" ||
        OneClick.modulesFromRoot[relPathFromRoot].status === "scraped"
      ) {
        return;
      }
    }
    var moduleData = {
      status: "scraping",
      relPath: relPathFromRoot,
      // Initially set to empty because we actually copy over fields to this in
      // case something needed to depend on it in a circular manner.
      moduleExports: {},
      fieldAccessesByDependency: null,
    };
    OneClick.modulesFromRoot[relPathFromRoot] = moduleData;
    // Scrape the dependencies by dry running them.

    var scrapingScript = `<html><head><title></title></head><body>
      <script>
        // --------------------------------------------------------
        // This is the dependency scraping script. It will crawl through your
        // dependencies to determine the dependency graph by doing a dry run
        // loading of your modules. Then it will report that information to the
        // real module loader.  We attempt to suppress any IO we can, so that
        // it does not confuse the developer.
        ${windowSetup}
        window.recordedFieldAccessesByRequireCall = {};
        // Want to supress any perceived side effects that occur during module
        // load. TODO: Store these in a backup log that can be accessed.
        console = {log: function(args) { }};
        console.error = console.warn = console.table = window.console.log;
        // TODO: Mock out any classes like XHR or LocalStorage.
        window.onerror = function(msg, url, lineNo, columnNo, error){
          // In iframe error - this is entirely expected. We mask all
          // issues, but uncomment debugger if you want to know
          // exactly what went wrong when loading the module.  Since
          // this is only a dry run loading of the modules, we return
          // mocked modules which don't behave as expected. Something
          // will go wrong - but we just needed the information about
          // dependency graph, and we discard this instance of the
          // module.
          return true;
        };
        exports = {};
        module = {
          exports: exports
        };
        require = function(modPath) {
          window.recordedFieldAccessesByRequireCall[modPath] = [];
          // https://www.mattzeunert.com/2016/07/20/proxy-symbol-tostring.html
          ${megaProxyFields(
            "recordFieldAccess",
            "window.recordedFieldAccessesByRequireCall"
          )}
          return recordFieldAccess;
        };
        function onBadDep() {
          parent.postMessage({
              type: 'badRequire',
              requestedBy: "${requestedBy}",
              requireCall: "${relPathFromRoot}"
            },
            '*'
          );
        }
      </script>
      <script onerror="onBadDep()"src="${relPathFromRoot}"> </script></body></html>
      <script>
        parent.postMessage(
          {
            type:'scrapeMessage',
            moduleAt: "${relPathFromRoot}",
            makesRequireCalls: window.recordedFieldAccessesByRequireCall
          },
          '*'
        );
        // Just in case you try to require() in a Chrome console that is still
        // debugging this iframe.
        require = parent.require;
      </script>
    `;
    loadIframeScript(
      "Dry run " + relPathFromRoot + " Just To Scrape Dependency Graph",
      !OneClick.__DEBUG__MODULE_LOADING,
      scrapingScript
    );
  }

  function loadIframeScript(name, deleteAfterLoad, script) {
    var iframe = document.createElement("iframe");
    iframe.name = name;
    iframe.style = "display:none !important";
    document.body.appendChild(iframe);
    if (deleteAfterLoad) {
      iframe.onload = function () {
        document.body.removeChild(iframe);
      };
    }
    var doc = iframe.contentWindow.document;
    doc.open();
    doc.write(script);
    doc.close();
  }
  function scrapePnpShimInDir(absPnpPath) {
    var scrapingScript = `<html><head><title></title></head><body>
      <script>
        // iframe created to load pnp runtime: helps resolve module locations
        // for dependencies that don't appear in node_modules (esy, yarn v2 etc).
        ${windowSetup}
        // Not even sure this is necessary.
        window.recordedFieldAccessByPnpShimRequireCall = {};
        // TODO: Store these in a backup log that can be accessed.
        console = {log: function(args) { }};
        console.error = console.warn = console.table = window.console.log;

        // Don't want to mask pnp loading errors.
        // window.onerror = function(msg, url, lineNo, columnNo, error){
        //   parent.console.log('onerr scraping ${absPnpPath}', msg, url, lineNo, error);
        //   return true;
        // };
        // Mock out everything that pnp will access.
        exports = {};
        module = { exports: exports };
        process = {
          mainModule: {nothingWillBeEqualToThis: true},
          // Browser normalizes slashes in url location anyways.
          platform: 'darwin'
        };
        __dirname = "${OneClick.dirName(absPnpPath)}";
        __filename = "${absPnpPath}";
        require = function(modPath) {
          if(modPath === 'path') {
            return {
              resolve: parent.window.OneClick.resolveFromAbsolute,
              // Hack:
              isAbsolute: parent.window.OneClick.isAbs,
              // This is only called with pnpdir, pnp.js
              // hacky/wrong
              relative: parent.OneClick.relativeAbsolutes,
              normalize: p => p,
              dirname: parent.OneClick.dirName,
              basename: parent.OneClick.baseName,
            };
          } else if(modPath === 'module') {
            function Module(absPath) {this.__absPath = absPath};
            // Empty causes process.binding('natives') lookup
            Module.builtinModules = ['whatisthis'];
            Module._nodeModulePaths = pth => [];
            Module._extensions = {'.js': true};
            Module._resolveFilename = function(req, fakeModuleInstance) {
              return false;
              parent.OneClick.requireResolve(fakeModuleInstance.__absPath, req);
            };
            return Module;
          } else if(modPath === 'fs') {
            return {
              statSync: pth => {
                return {
                  isDirectory: () =>
                    pth[pth.length - 1] === '/' || pth.substr(pth.length - 3) !== '.js'
                }
              },
              lstatSync: pth => {
                return {
                  isDirectory: () => pth[pth.length - 1] === '/' || pth.substr(pth.length - 3) !== '.js',
                  isSymbolicLink: () => false
                }
              },
              // Will tell pnp that only index.js files exist.
              existsSync: pth => {
                return parent.OneClick.baseName(pth) === 'index.js';
              }
            }
          }
          window.recordedFieldAccessByPnpShimRequireCall[modPath] = [];
          // https://www.mattzeunert.com/2016/07/20/proxy-symbol-tostring.html
          ${megaProxyFields(
            "recordFieldAccess",
            "window.recordedFieldAccessByPnpShimRequireCall"
          )}
          return recordFieldAccess;
        };
        function onBadPnpLoad() {
          window.badPnpLoadAttempt = true;
          parent.postMessage({type: 'badRequireByPnpShim', requireCall: "${absPnpPath}"}, '*');
        }
      </script>
      <script onerror="onBadPnpLoad()"src="${absPnpPath}"> </script></body></html>
      <script>
        var absPnpPath = "${absPnpPath}";
        if (!window.badPnpLoadAttempt) {
          parent.window.OneClick.pnpModuleExports = module.exports;
          parent.postMessage(
            {
              type:'pnpShimLoaded',
              moduleAt: "${absPnpPath}",
              makesRequireCalls: window.recordedFieldAccessByPnpShimRequireCall
            },
            '*'
          );
        }
      </script>
    `;
    // Don't delete after load because we need it to hang around for debugging
    // etc.  It's not a super-faily module - just needed a little help running
    // in the browser.
    loadIframeScript("Pnp", false, scrapingScript);
  }

  // This isn't really commonJS compliant, but we'll relax it just for the data-main attribute.
  OneClick.absNormalizedHtmlPath = getNormalizedHtmlPath();
  extractAbsoluteMainModuleAsync(function (absMainPath, err) {
    if (!err) {
      OneClick.absMainPath = absMainPath;
      var pnpFilePath = getPnpFilePath();
      if (pnpFilePath) {
        requirePreparePnpShim(pnpFilePath);
      }
      requirePrepareMain(OneClick.absMainPath);
    } else {
      throw new Error(err);
    }
  });
  glob.OneClick = OneClick;
})(window);

