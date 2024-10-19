!function(t, i) {
    if ("object" == typeof exports && "object" == typeof module)
        module.exports = i();
    else if ("function" == typeof define && define.amd)
        define([], i);
    else {
        var e = i();
        for (var s in e)
            ("object" == typeof exports ? exports : t)[s] = e[s]
    }
}(this, (function() {
    return function(t) {
        var i = {};
        function e(s) {
            if (i[s])
                return i[s].exports;
            var n = i[s] = {
                i: s,
                l: !1,
                exports: {}
            };
            return t[s].call(n.exports, n, n.exports, e),
            n.l = !0,
            n.exports
        }
        return e.m = t,
        e.c = i,
        e.d = function(t, i, s) {
            e.o(t, i) || Object.defineProperty(t, i, {
                enumerable: !0,
                get: s
            })
        }
        ,
        e.r = function(t) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
                value: "Module"
            }),
            Object.defineProperty(t, "__esModule", {
                value: !0
            })
        }
        ,
        e.t = function(t, i) {
            if (1 & i && (t = e(t)),
            8 & i)
                return t;
            if (4 & i && "object" == typeof t && t && t.__esModule)
                return t;
            var s = Object.create(null);
            if (e.r(s),
            Object.defineProperty(s, "default", {
                enumerable: !0,
                value: t
            }),
            2 & i && "string" != typeof t)
                for (var n in t)
                    e.d(s, n, function(i) {
                        return t[i]
                    }
                    .bind(null, n));
            return s
        }
        ,
        e.n = function(t) {
            var i = t && t.__esModule ? function() {
                return t.default
            }
            : function() {
                return t
            }
            ;
            return e.d(i, "a", i),
            i
        }
        ,
        e.o = function(t, i) {
            return Object.prototype.hasOwnProperty.call(t, i)
        }
        ,
        e.p = "",
        e(e.s = 0)
    }([function(t, i, e) {
        "use strict";
        e.r(i),
        e.d(i, "Fireworks", (function() {
            return l
        }
        ));
        var s = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(t) {
            return window.setTimeout(t, 1e3 / 60)
        }
        ;
        function n(t, i, e, s) {
            var n = Math.pow;
            return Math.sqrt(n(t - e, 2) + n(i - s, 2))
        }
        function h(t, i) {
            return Math.random() * (i - t) + t
        }
        function r(t, i) {
            return Math.floor(t + Math.random() * (i + 1 - t))
        }
        function o(t, i) {
            for (var e = 0; e < i.length; e++) {
                var s = i[e];
                s.enumerable = s.enumerable || !1,
                s.configurable = !0,
                "value"in s && (s.writable = !0),
                Object.defineProperty(t, s.key, s)
            }
        }
        var a = function() {
            function t(i, e, s, h, o, a, _, u, c) {
                for (!function(t, i) {
                    if (!(t instanceof i))
                        throw new TypeError("Cannot call a class as a function")
                }(this, t),
                this._currentDistance = 0,
                this._coordinates = [],
                this._x = i,
                this._y = e,
                this._sx = i,
                this._sy = e,
                this._dx = s,
                this._dy = h,
                this._ctx = o,
                this._hue = a,
                this._speed = _,
                this._acceleration = u,
                this._traceLength = c,
                this._totalDistance = n(this._sx, this._sy, this._dx, this._dy); this._traceLength--; )
                    this._coordinates.push([i, e]);
                this._angle = Math.atan2(this._dy - this._sy, this._dx - this._sx),
                this._brightness = r(50, 70)
            }
            var i, e, s;
            return i = t,
            (e = [{
                key: "update",
                value: function(t) {
                    this._coordinates.pop(),
                    this._coordinates.unshift([this._x, this._y]),
                    this._speed *= this._acceleration;
                    var i = Math.cos(this._angle) * this._speed
                      , e = Math.sin(this._angle) * this._speed;
                    this._currentDistance = n(this._sx, this._sy, this._x + i, this._y + e),
                    this._currentDistance >= this._totalDistance ? t(this._dx, this._dy, this._hue) : (this._x += i,
                    this._y += e)
                }
            }, {
                key: "draw",
                value: function() {
                    var t = this._coordinates.length - 1;
                    this._ctx.beginPath(),
                    this._ctx.moveTo(this._coordinates[t][0], this._coordinates[t][1]),
                    this._ctx.lineTo(this._x, this._y),
                    this._ctx.strokeStyle = "hsl(" + this._hue + ", 100%, " + this._brightness + "%)",
                    this._ctx.stroke()
                }
            }]) && o(i.prototype, e),
            s && o(i, s),
            t
        }();
        function _(t, i) {
            for (var e = 0; e < i.length; e++) {
                var s = i[e];
                s.enumerable = s.enumerable || !1,
                s.configurable = !0,
                "value"in s && (s.writable = !0),
                Object.defineProperty(t, s.key, s)
            }
        }
        var u = function() {
            function t(i, e, s, n, o, a, _) {
                for (!function(t, i) {
                    if (!(t instanceof i))
                        throw new TypeError("Cannot call a class as a function")
                }(this, t),
                this._coordinates = [],
                this._alpha = 1,
                this._x = i,
                this._y = e,
                this._ctx = s,
                this._hue = n,
                this._friction = o,
                this._gravity = a,
                this._explosionLength = _; this._explosionLength--; )
                    this._coordinates.push([i, e]);
                this._angle = h(0, 2 * Math.PI),
                this._speed = r(1, 10),
                this._hue = r(this._hue - 20, this._hue + 20),
                this._brightness = r(50, 80),
                this._decay = h(.015, .03)
            }
            var i, e, s;
            return i = t,
            (e = [{
                key: "update",
                value: function(t) {
                    this._coordinates.pop(),
                    this._coordinates.unshift([this._x, this._y]),
                    this._speed *= this._friction,
                    this._x += Math.cos(this._angle) * this._speed,
                    this._y += Math.sin(this._angle) * this._speed + this._gravity,
                    this._alpha -= this._decay,
                    this._alpha <= this._decay && t()
                }
            }, {
                key: "draw",
                value: function() {
                    var t = this._coordinates.length - 1;
                    this._ctx.beginPath(),
                    this._ctx.moveTo(this._coordinates[t][0], this._coordinates[t][1]),
                    this._ctx.lineTo(this._x, this._y),
                    this._ctx.strokeStyle = "hsla(" + this._hue + ", 100%, " + this._brightness + "%, " + this._alpha + ")",
                    this._ctx.stroke()
                }
            }]) && _(i.prototype, e),
            s && _(i, s),
            t
        }();
        function c(t, i) {
            for (var e = 0; e < i.length; e++) {
                var s = i[e];
                s.enumerable = s.enumerable || !1,
                s.configurable = !0,
                "value"in s && (s.writable = !0),
                Object.defineProperty(t, s.key, s)
            }
        }
        var l = function() {
            function t(i) {
                var e, s = this;
                !function(t, i) {
                    if (!(t instanceof i))
                        throw new TypeError("Cannot call a class as a function")
                }(this, t),
                this._boundaries = {
                    top: 50,
                    bottom: 0,
                    left: 50,
                    right: 0
                },
                this._sound = {
                    enable: !1,
                    list: ["explosion0.mp3", "explosion1.mp3", "explosion2.mp3"],
                    min: 4,
                    max: 8
                },
                this._tick = 0,
                this._version = "1.0.4",
                this._running = !1,
                this._fireworks = [],
                this._particles = [],
                this._target = i.target,
                this._canvas = document.createElement("canvas"),
                this._ctx = this._canvas.getContext("2d"),
                this.updateSize(),
                this._target.appendChild(this._canvas),
                this._hue = i.hue || 120,
                this._startDelay = i.startDelay || 30,
                this._minDelay = i.minDelay || 30,
                this._maxDelay = i.maxDelay || 90,
                this._speed = i.speed || 2,
                this._acceleration = i.acceleration || 1.05,
                this._friction = i.friction || .95,
                this._gravity = i.gravity || 1.5,
                this._particleCount = i.particles || 50,
                this._traceLength = i.trace || 3,
                this._explosionLength = i.explosion || 5,
                this._autoresize = null === (e = i.autoresize) || void 0 === e || e,
                this._boundaries = Object.assign(Object.assign({}, this._boundaries), i.boundaries),
                this._sound = Object.assign(Object.assign({}, this._sound), i.sound),
                this._autoresize && window.addEventListener("resize", (function() {
                    s.updateSize()
                }
                ))
            }
            var i, e, n;
            return i = t,
            (e = [{
                key: "start",
                value: function() {
                    this._running || (this._running = !0,
                    this.clear(),
                    this.render())
                }
            }, {
                key: "stop",
                value: function() {
                    this._running = !1,
                    this.clear()
                }
            }, {
                key: "pause",
                value: function() {
                    this._running = !this._running,
                    this._running && this.render()
                }
            }, {
                key: "clear",
                value: function() {
                    this._ctx && (this._fireworks = [],
                    this._particles = [],
                    this._ctx.clearRect(0, 0, this._width, this._height))
                }
            }, {
                key: "updateSize",
                value: function() {
                    var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}
                      , i = t.width
                      , e = void 0 === i ? this._target.clientWidth : i
                      , s = t.height
                      , n = void 0 === s ? this._target.clientHeight : s;
                    this._width = e,
                    this._height = n,
                    this._canvas.width = e,
                    this._canvas.height = n,
                    this.updateBoundaries({
                        right: e,
                        bottom: n
                    })
                }
            }, {
                key: "updateBoundaries",
                value: function(t) {
                    this._boundaries = Object.assign(Object.assign({}, this._boundaries), t)
                }
            }, {
                key: "render",
                value: function() {
                    var t = this;
                    if (this._ctx && this._running) {
                        var i;
                        for (s((function() {
                            return t.render()
                        }
                        )),
                        this._hue += .5,
                        this._ctx.globalCompositeOperation = "destination-out",
                        this._ctx.fillStyle = "rgba(0, 0, 0, 0.5)",
                        this._ctx.fillRect(0, 0, this._width, this._height),
                        this._ctx.globalCompositeOperation = "lighter",
                        i = this._fireworks.length; i--; )
                            this._fireworks[i].draw(),
                            this._fireworks[i].update((function(e, s, n) {
                                var o = t._particleCount;
                                if (t._sound.enable && t._sound.list.length > 0) {
                                    var a = r(0, t._sound.list.length - 1)
                                      , _ = h(t._sound.min / 10, t._sound.max / 10)
                                      , c = new Audio(t._sound.list[a]);
                                    c.volume = _,
                                    c.play()
                                }
                                for (; o--; )
                                    t._particles.push(new u(e,s,t._ctx,n,t._friction,t._gravity,t._explosionLength));
                                t._fireworks.splice(i, 1)
                            }
                            ));
                        for (i = this._particles.length; i--; )
                            this._particles[i].draw(),
                            this._particles[i].update((function() {
                                t._particles.splice(i, 1)
                            }
                            ));
                        this._tick > 2 * this._startDelay && (this._fireworks.push(new a(.5 * this._width,this._height,r(this._boundaries.left, this._boundaries.right - 50),r(this._boundaries.top, .5 * this._boundaries.bottom),this._ctx,this._hue,this._speed,this._acceleration,this._traceLength)),
                        this._startDelay = r(this._minDelay, this._maxDelay),
                        this._tick = 0),
                        this._hue > 345 && (this._hue = 0),
                        this._tick++
                    }
                }
            }, {
                key: "isRunning",
                get: function() {
                    return this._running
                }
            }]) && c(i.prototype, e),
            n && c(i, n),
            t
        }()
    }
    ])
}
));