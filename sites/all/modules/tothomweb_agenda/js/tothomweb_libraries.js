(function(e, t) {
    typeof exports === "object" && typeof module !== "undefined" ? t(require("jquery")) : typeof define === "function" && define.amd ? define([ "jquery" ], t) : (e = e || self, 
    t(e.jQuery));
})(this, function(b) {
    "use strict";
    b = b && b.hasOwnProperty("default") ? b["default"] : b;
    function a(e, t) {
        if (!(e instanceof t)) {
            throw new TypeError("Cannot call a class as a function");
        }
    }
    function s(e, t) {
        for (var i = 0; i < t.length; i++) {
            var a = t[i];
            a.enumerable = a.enumerable || false;
            a.configurable = true;
            if ("value" in a) a.writable = true;
            Object.defineProperty(e, a.key, a);
        }
    }
    function e(e, t, i) {
        if (t) s(e.prototype, t);
        if (i) s(e, i);
        return e;
    }
    var r = {
        autoShow: false,
        autoHide: false,
        autoPick: false,
        inline: false,
        container: null,
        trigger: null,
        language: "",
        format: "mm/dd/yyyy",
        date: null,
        startDate: null,
        endDate: null,
        startView: 0,
        weekStart: 0,
        yearFirst: false,
        yearSuffix: "",
        days: [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ],
        daysShort: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
        daysMin: [ "Su", "Mo", "Tu", "We", "Th", "Fr", "Sa" ],
        months: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
        monthsShort: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
        itemTag: "li",
        mutedClass: "muted",
        pickedClass: "picked",
        disabledClass: "disabled",
        highlightedClass: "highlighted",
        template: '<div class="datepicker-container">' + '<div class="datepicker-panel" data-view="years picker">' + "<ul>" + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + "</ul>" + '<ul data-view="years"></ul>' + "</div>" + '<div class="datepicker-panel" data-view="months picker">' + "<ul>" + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + "</ul>" + '<ul data-view="months"></ul>' + "</div>" + '<div class="datepicker-panel" data-view="days picker">' + "<ul>" + '<li data-view="month prev">&lsaquo;</li>' + '<li data-view="month current"></li>' + '<li data-view="month next">&rsaquo;</li>' + "</ul>" + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + "</div>" + "</div>",
        offset: 10,
        zIndex: 1e3,
        filter: null,
        show: null,
        hide: null,
        pick: null
    };
    var t = typeof window !== "undefined";
    var i = t ? window : {};
    var n = t ? "ontouchstart" in i.document.documentElement : false;
    var u = "datepicker";
    var h = "click.".concat(u);
    var l = "focus.".concat(u);
    var o = "hide.".concat(u);
    var d = "keyup.".concat(u);
    var c = "pick.".concat(u);
    var f = "resize.".concat(u);
    var v = "scroll.".concat(u);
    var p = "show.".concat(u);
    var g = "touchstart.".concat(u);
    var y = "".concat(u, "-hide");
    var m = {};
    var w = {
        DAYS: 0,
        MONTHS: 1,
        YEARS: 2
    };
    var k = Object.prototype.toString;
    function D(e) {
        return k.call(e).slice(8, -1).toLowerCase();
    }
    function C(e) {
        return typeof e === "string";
    }
    var $ = Number.isNaN || i.isNaN;
    function x(e) {
        return typeof e === "number" && !$(e);
    }
    function M(e) {
        return typeof e === "undefined";
    }
    function F(e) {
        return D(e) === "date" && !$(e.getTime());
    }
    function S(a, s) {
        for (var e = arguments.length, r = new Array(e > 2 ? e - 2 : 0), t = 2; t < e; t++) {
            r[t - 2] = arguments[t];
        }
        return function() {
            for (var e = arguments.length, t = new Array(e), i = 0; i < e; i++) {
                t[i] = arguments[i];
            }
            return a.apply(s, r.concat(t));
        };
    }
    function Y(e) {
        return '[data-view="'.concat(e, '"]');
    }
    function T(e) {
        return e % 4 === 0 && e % 100 !== 0 || e % 400 === 0;
    }
    function R(e, t) {
        return [ 31, T(e) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ][t];
    }
    function V(e, t, i) {
        return Math.min(i, R(e, t));
    }
    var I = /(y|m|d)+/g;
    function j(i) {
        var e = String(i).toLowerCase();
        var t = e.match(I);
        if (!t || t.length === 0) {
            throw new Error("Invalid date format.");
        }
        i = {
            source: e,
            parts: t
        };
        b.each(t, function(e, t) {
            switch (t) {
              case "dd":
              case "d":
                i.hasDay = true;
                break;

              case "mm":
              case "m":
                i.hasMonth = true;
                break;

              case "yyyy":
              case "yy":
                i.hasYear = true;
                break;

              default:
            }
        });
        return i;
    }
    function N(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
        var i = b(e);
        var a = i.css("position");
        var s = a === "absolute";
        var r = t ? /auto|scroll|hidden/ : /auto|scroll/;
        var n = i.parents().filter(function(e, t) {
            var i = b(t);
            if (s && i.css("position") === "static") {
                return false;
            }
            return r.test(i.css("overflow") + i.css("overflow-y") + i.css("overflow-x"));
        }).eq(0);
        return a === "fixed" || !n.length ? b(e.ownerDocument || document) : n;
    }
    function P(e) {
        var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;
        var i = String(Math.abs(e));
        var a = i.length;
        var s = "";
        if (e < 0) {
            s += "-";
        }
        while (a < t) {
            a += 1;
            s += "0";
        }
        return s + i;
    }
    var A = /\d+/g;
    var O = {
        show: function e() {
            if (!this.built) {
                this.build();
            }
            if (this.shown) {
                return;
            }
            if (this.trigger(p).isDefaultPrevented()) {
                return;
            }
            this.shown = true;
            this.$picker.removeClass(y).on(h, b.proxy(this.click, this));
            this.showView(this.options.startView);
            if (!this.inline) {
                this.$scrollParent.on(v, b.proxy(this.place, this));
                b(window).on(f, this.onResize = S(this.place, this));
                b(document).on(h, this.onGlobalClick = S(this.globalClick, this));
                b(document).on(d, this.onGlobalKeyup = S(this.globalKeyup, this));
                if (n) {
                    b(document).on(g, this.onTouchStart = S(this.touchstart, this));
                }
                this.place();
            }
        },
        hide: function e() {
            if (!this.shown) {
                return;
            }
            if (this.trigger(o).isDefaultPrevented()) {
                return;
            }
            this.shown = false;
            this.$picker.addClass(y).off(h, this.click);
            if (!this.inline) {
                this.$scrollParent.off(v, this.place);
                b(window).off(f, this.onResize);
                b(document).off(h, this.onGlobalClick);
                b(document).off(d, this.onGlobalKeyup);
                if (n) {
                    b(document).off(g, this.onTouchStart);
                }
            }
        },
        toggle: function e() {
            if (this.shown) {
                this.hide();
            } else {
                this.show();
            }
        },
        update: function e() {
            var t = this.getValue();
            if (t === this.oldValue) {
                return;
            }
            this.setDate(t, true);
            this.oldValue = t;
        },
        pick: function e(t) {
            var i = this.$element;
            var a = this.date;
            if (this.trigger(c, {
                view: t || "",
                date: a
            }).isDefaultPrevented()) {
                return;
            }
            a = this.formatDate(this.date);
            this.setValue(a);
            if (this.isInput) {
                i.trigger("input");
                i.trigger("change");
            }
        },
        reset: function e() {
            this.setDate(this.initialDate, true);
            this.setValue(this.initialValue);
            if (this.shown) {
                this.showView(this.options.startView);
            }
        },
        getMonthName: function e(t, i) {
            var a = this.options;
            var s = a.monthsShort;
            var r = a.months;
            if (b.isNumeric(t)) {
                t = Number(t);
            } else if (M(i)) {
                i = t;
            }
            if (i === true) {
                r = s;
            }
            return r[x(t) ? t : this.date.getMonth()];
        },
        getDayName: function e(t, i, a) {
            var s = this.options;
            var r = s.days;
            if (b.isNumeric(t)) {
                t = Number(t);
            } else {
                if (M(a)) {
                    a = i;
                }
                if (M(i)) {
                    i = t;
                }
            }
            if (a) {
                r = s.daysMin;
            } else if (i) {
                r = s.daysShort;
            }
            return r[x(t) ? t : this.date.getDay()];
        },
        getDate: function e(t) {
            var i = this.date;
            return t ? this.formatDate(i) : new Date(i);
        },
        setDate: function e(t, i) {
            var a = this.options.filter;
            if (F(t) || C(t)) {
                t = this.parseDate(t);
                if (b.isFunction(a) && a.call(this.$element, t, "day") === false) {
                    return;
                }
                this.date = t;
                this.viewDate = new Date(t);
                if (!i) {
                    this.pick();
                }
                if (this.built) {
                    this.render();
                }
            }
        },
        setStartDate: function e(t) {
            if (F(t) || C(t)) {
                this.startDate = this.parseDate(t);
            } else {
                this.startDate = null;
            }
            if (this.built) {
                this.render();
            }
        },
        setEndDate: function e(t) {
            if (F(t) || C(t)) {
                this.endDate = this.parseDate(t);
            } else {
                this.endDate = null;
            }
            if (this.built) {
                this.render();
            }
        },
        parseDate: function e(a) {
            var s = this.format;
            var t = [];
            if (!F(a)) {
                if (C(a)) {
                    t = a.match(A) || [];
                }
                a = a ? new Date(a) : new Date();
                if (!F(a)) {
                    a = new Date();
                }
                if (t.length === s.parts.length) {
                    b.each(t, function(e, t) {
                        var i = parseInt(t, 10);
                        switch (s.parts[e]) {
                          case "yy":
                            a.setFullYear(2e3 + i);
                            break;

                          case "yyyy":
                            a.setFullYear(t.length === 2 ? 2e3 + i : i);
                            break;

                          case "mm":
                          case "m":
                            a.setMonth(i - 1);
                            break;

                          default:
                        }
                    });
                    b.each(t, function(e, t) {
                        var i = parseInt(t, 10);
                        switch (s.parts[e]) {
                          case "dd":
                          case "d":
                            a.setDate(i);
                            break;

                          default:
                        }
                    });
                }
            }
            return new Date(a.getFullYear(), a.getMonth(), a.getDate());
        },
        formatDate: function e(t) {
            var i = this.format;
            var a = "";
            if (F(t)) {
                var s = t.getFullYear();
                var r = t.getMonth();
                var n = t.getDate();
                var h = {
                    d: n,
                    dd: P(n, 2),
                    m: r + 1,
                    mm: P(r + 1, 2),
                    yy: String(s).substring(2),
                    yyyy: P(s, 4)
                };
                a = i.source;
                b.each(i.parts, function(e, t) {
                    a = a.replace(t, h[t]);
                });
            }
            return a;
        },
        destroy: function e() {
            this.unbind();
            this.unbuild();
            this.$element.removeData(u);
        }
    };
    var q = {
        click: function e(t) {
            var i = b(t.target);
            var a = this.options, s = this.date, r = this.viewDate, n = this.format;
            t.stopPropagation();
            t.preventDefault();
            if (i.hasClass("disabled")) {
                return;
            }
            var h = i.data("view");
            var l = r.getFullYear();
            var o = r.getMonth();
            var u = r.getDate();
            switch (h) {
              case "years prev":
              case "years next":
                {
                    l = h === "years prev" ? l - 10 : l + 10;
                    r.setFullYear(l);
                    r.setDate(V(l, o, u));
                    this.renderYears();
                    break;
                }

              case "year prev":
              case "year next":
                l = h === "year prev" ? l - 1 : l + 1;
                r.setFullYear(l);
                r.setDate(V(l, o, u));
                this.renderMonths();
                break;

              case "year current":
                if (n.hasYear) {
                    this.showView(w.YEARS);
                }
                break;

              case "year picked":
                if (n.hasMonth) {
                    this.showView(w.MONTHS);
                } else {
                    i.siblings(".".concat(a.pickedClass)).removeClass(a.pickedClass).data("view", "year");
                    this.hideView();
                }
                this.pick("year");
                break;

              case "year":
                l = parseInt(i.text(), 10);
                s.setDate(V(l, o, u));
                s.setFullYear(l);
                r.setDate(V(l, o, u));
                r.setFullYear(l);
                if (n.hasMonth) {
                    this.showView(w.MONTHS);
                } else {
                    i.addClass(a.pickedClass).data("view", "year picked").siblings(".".concat(a.pickedClass)).removeClass(a.pickedClass).data("view", "year");
                    this.hideView();
                }
                this.pick("year");
                break;

              case "month prev":
              case "month next":
                o = h === "month prev" ? o - 1 : o + 1;
                if (o < 0) {
                    l -= 1;
                    o += 12;
                } else if (o > 11) {
                    l += 1;
                    o -= 12;
                }
                r.setFullYear(l);
                r.setDate(V(l, o, u));
                r.setMonth(o);
                this.renderDays();
                break;

              case "month current":
                if (n.hasMonth) {
                    this.showView(w.MONTHS);
                }
                break;

              case "month picked":
                if (n.hasDay) {
                    this.showView(w.DAYS);
                } else {
                    i.siblings(".".concat(a.pickedClass)).removeClass(a.pickedClass).data("view", "month");
                    this.hideView();
                }
                this.pick("month");
                break;

              case "month":
                o = b.inArray(i.text(), a.monthsShort);
                s.setFullYear(l);
                s.setDate(V(l, o, u));
                s.setMonth(o);
                r.setFullYear(l);
                r.setDate(V(l, o, u));
                r.setMonth(o);
                if (n.hasDay) {
                    this.showView(w.DAYS);
                } else {
                    i.addClass(a.pickedClass).data("view", "month picked").siblings(".".concat(a.pickedClass)).removeClass(a.pickedClass).data("view", "month");
                    this.hideView();
                }
                this.pick("month");
                break;

              case "day prev":
              case "day next":
              case "day":
                if (h === "day prev") {
                    o -= 1;
                } else if (h === "day next") {
                    o += 1;
                }
                u = parseInt(i.text(), 10);
                s.setDate(1);
                s.setFullYear(l);
                s.setMonth(o);
                s.setDate(u);
                r.setDate(1);
                r.setFullYear(l);
                r.setMonth(o);
                r.setDate(u);
                this.renderDays();
                if (h === "day") {
                    this.hideView();
                }
                this.pick("day");
                break;

              case "day picked":
                this.hideView();
                this.pick("day");
                break;

              default:
            }
        },
        globalClick: function e(t) {
            var i = t.target;
            var a = this.element, s = this.$trigger;
            var r = s[0];
            var n = true;
            while (i !== document) {
                if (i === r || i === a) {
                    n = false;
                    break;
                }
                i = i.parentNode;
            }
            if (n) {
                this.hide();
            }
        },
        keyup: function e() {
            this.update();
        },
        globalKeyup: function e(t) {
            var i = t.target, a = t.key, s = t.keyCode;
            if (this.isInput && i !== this.element && this.shown && (a === "Tab" || s === 9)) {
                this.hide();
            }
        },
        touchstart: function e(t) {
            var i = t.target;
            if (this.isInput && i !== this.element && !b.contains(this.$picker[0], i)) {
                this.hide();
                this.element.blur();
            }
        }
    };
    var E = {
        render: function e() {
            this.renderYears();
            this.renderMonths();
            this.renderDays();
        },
        renderWeek: function e() {
            var i = this;
            var a = [];
            var t = this.options, s = t.weekStart, r = t.daysMin;
            s = parseInt(s, 10) % 7;
            r = r.slice(s).concat(r.slice(0, s));
            b.each(r, function(e, t) {
                a.push(i.createItem({
                    text: t
                }));
            });
            this.$week.html(a.join(""));
        },
        renderYears: function e() {
            var t = this.options, i = this.startDate, a = this.endDate;
            var s = t.disabledClass, r = t.filter, n = t.yearSuffix;
            var h = this.viewDate.getFullYear();
            var l = new Date();
            var o = l.getFullYear();
            var u = this.date.getFullYear();
            var d = -5;
            var c = 6;
            var f = [];
            var v = false;
            var p = false;
            var g;
            for (g = d; g <= c; g += 1) {
                var y = new Date(h + g, 1, 1);
                var m = false;
                if (i) {
                    m = y.getFullYear() < i.getFullYear();
                    if (g === d) {
                        v = m;
                    }
                }
                if (!m && a) {
                    m = y.getFullYear() > a.getFullYear();
                    if (g === c) {
                        p = m;
                    }
                }
                if (!m && r) {
                    m = r.call(this.$element, y, "year") === false;
                }
                var w = h + g === u;
                var k = w ? "year picked" : "year";
                f.push(this.createItem({
                    picked: w,
                    disabled: m,
                    text: h + g,
                    view: m ? "year disabled" : k,
                    highlighted: y.getFullYear() === o
                }));
            }
            this.$yearsPrev.toggleClass(s, v);
            this.$yearsNext.toggleClass(s, p);
            this.$yearsCurrent.toggleClass(s, true).html("".concat(h + d + n, " - ").concat(h + c).concat(n));
            this.$years.html(f.join(""));
        },
        renderMonths: function e() {
            var t = this.options, i = this.startDate, a = this.endDate, s = this.viewDate;
            var r = t.disabledClass || "";
            var n = t.monthsShort;
            var h = b.isFunction(t.filter) && t.filter;
            var l = s.getFullYear();
            var o = new Date();
            var u = o.getFullYear();
            var d = o.getMonth();
            var c = this.date.getFullYear();
            var f = this.date.getMonth();
            var v = [];
            var p = false;
            var g = false;
            var y;
            for (y = 0; y <= 11; y += 1) {
                var m = new Date(l, y, 1);
                var w = false;
                if (i) {
                    p = m.getFullYear() === i.getFullYear();
                    w = p && m.getMonth() < i.getMonth();
                }
                if (!w && a) {
                    g = m.getFullYear() === a.getFullYear();
                    w = g && m.getMonth() > a.getMonth();
                }
                if (!w && h) {
                    w = h.call(this.$element, m, "month") === false;
                }
                var k = l === c && y === f;
                var D = k ? "month picked" : "month";
                v.push(this.createItem({
                    disabled: w,
                    picked: k,
                    highlighted: l === u && m.getMonth() === d,
                    index: y,
                    text: n[y],
                    view: w ? "month disabled" : D
                }));
            }
            this.$yearPrev.toggleClass(r, p);
            this.$yearNext.toggleClass(r, g);
            this.$yearCurrent.toggleClass(r, p && g).html(l + t.yearSuffix || "");
            this.$months.html(v.join(""));
        },
        renderDays: function e() {
            var t = this.$element, i = this.options, a = this.startDate, s = this.endDate, r = this.viewDate, n = this.date;
            var h = i.disabledClass, l = i.filter, o = i.months, u = i.weekStart, d = i.yearSuffix;
            var c = r.getFullYear();
            var f = r.getMonth();
            var v = new Date();
            var p = v.getFullYear();
            var g = v.getMonth();
            var y = v.getDate();
            var m = n.getFullYear();
            var w = n.getMonth();
            var k = n.getDate();
            var D;
            var b;
            var C;
            var $ = [];
            var x = c;
            var M = f;
            var F = false;
            if (f === 0) {
                x -= 1;
                M = 11;
            } else {
                M -= 1;
            }
            D = R(x, M);
            var S = new Date(c, f, 1);
            C = S.getDay() - parseInt(u, 10) % 7;
            if (C <= 0) {
                C += 7;
            }
            if (a) {
                F = S.getTime() <= a.getTime();
            }
            for (b = D - (C - 1); b <= D; b += 1) {
                var Y = new Date(x, M, b);
                var T = false;
                if (a) {
                    T = Y.getTime() < a.getTime();
                }
                if (!T && l) {
                    T = l.call(t, Y, "day") === false;
                }
                $.push(this.createItem({
                    disabled: T,
                    highlighted: x === p && M === g && Y.getDate() === y,
                    muted: true,
                    picked: x === m && M === w && b === k,
                    text: b,
                    view: "day prev"
                }));
            }
            var V = [];
            var I = c;
            var j = f;
            var N = false;
            if (f === 11) {
                I += 1;
                j = 0;
            } else {
                j += 1;
            }
            D = R(c, f);
            C = 42 - ($.length + D);
            var P = new Date(c, f, D);
            if (s) {
                N = P.getTime() >= s.getTime();
            }
            for (b = 1; b <= C; b += 1) {
                var A = new Date(I, j, b);
                var O = I === m && j === w && b === k;
                var q = false;
                if (s) {
                    q = A.getTime() > s.getTime();
                }
                if (!q && l) {
                    q = l.call(t, A, "day") === false;
                }
                V.push(this.createItem({
                    disabled: q,
                    picked: O,
                    highlighted: I === p && j === g && A.getDate() === y,
                    muted: true,
                    text: b,
                    view: "day next"
                }));
            }
            var E = [];
            for (b = 1; b <= D; b += 1) {
                var H = new Date(c, f, b);
                var W = false;
                if (a) {
                    W = H.getTime() < a.getTime();
                }
                if (!W && s) {
                    W = H.getTime() > s.getTime();
                }
                if (!W && l) {
                    W = l.call(t, H, "day") === false;
                }
                var z = c === m && f === w && b === k;
                var J = z ? "day picked" : "day";
                E.push(this.createItem({
                    disabled: W,
                    picked: z,
                    highlighted: c === p && f === g && H.getDate() === y,
                    text: b,
                    view: W ? "day disabled" : J
                }));
            }
            this.$monthPrev.toggleClass(h, F);
            this.$monthNext.toggleClass(h, N);
            this.$monthCurrent.toggleClass(h, F && N).html(i.yearFirst ? "".concat(c + d, " ").concat(o[f]) : "".concat(o[f], " ").concat(c).concat(d));
            this.$days.html($.join("") + E.join("") + V.join(""));
        }
    };
    var H = "".concat(u, "-top-left");
    var W = "".concat(u, "-top-right");
    var z = "".concat(u, "-bottom-left");
    var J = "".concat(u, "-bottom-right");
    var G = [ H, W, z, J ].join(" ");
    var K = function() {
        function i(e) {
            var t = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
            a(this, i);
            this.$element = b(e);
            this.element = e;
            this.options = b.extend({}, r, m[t.language], b.isPlainObject(t) && t);
            this.$scrollParent = N(e, true);
            this.built = false;
            this.shown = false;
            this.isInput = false;
            this.inline = false;
            this.initialValue = "";
            this.initialDate = null;
            this.startDate = null;
            this.endDate = null;
            this.init();
        }
        e(i, [ {
            key: "init",
            value: function e() {
                var t = this.$element, i = this.options;
                var a = i.startDate, s = i.endDate, r = i.date;
                this.$trigger = b(i.trigger);
                this.isInput = t.is("input") || t.is("textarea");
                this.inline = i.inline && (i.container || !this.isInput);
                this.format = j(i.format);
                var n = this.getValue();
                this.initialValue = n;
                this.oldValue = n;
                r = this.parseDate(r || n);
                if (a) {
                    a = this.parseDate(a);
                    if (r.getTime() < a.getTime()) {
                        r = new Date(a);
                    }
                    this.startDate = a;
                }
                if (s) {
                    s = this.parseDate(s);
                    if (a && s.getTime() < a.getTime()) {
                        s = new Date(a);
                    }
                    if (r.getTime() > s.getTime()) {
                        r = new Date(s);
                    }
                    this.endDate = s;
                }
                this.date = r;
                this.viewDate = new Date(r);
                this.initialDate = new Date(this.date);
                this.bind();
                if (i.autoShow || this.inline) {
                    this.show();
                }
                if (i.autoPick) {
                    this.pick();
                }
            }
        }, {
            key: "build",
            value: function e() {
                if (this.built) {
                    return;
                }
                this.built = true;
                var t = this.$element, i = this.options;
                var a = b(i.template);
                this.$picker = a;
                this.$week = a.find(Y("week"));
                this.$yearsPicker = a.find(Y("years picker"));
                this.$yearsPrev = a.find(Y("years prev"));
                this.$yearsNext = a.find(Y("years next"));
                this.$yearsCurrent = a.find(Y("years current"));
                this.$years = a.find(Y("years"));
                this.$monthsPicker = a.find(Y("months picker"));
                this.$yearPrev = a.find(Y("year prev"));
                this.$yearNext = a.find(Y("year next"));
                this.$yearCurrent = a.find(Y("year current"));
                this.$months = a.find(Y("months"));
                this.$daysPicker = a.find(Y("days picker"));
                this.$monthPrev = a.find(Y("month prev"));
                this.$monthNext = a.find(Y("month next"));
                this.$monthCurrent = a.find(Y("month current"));
                this.$days = a.find(Y("days"));
                if (this.inline) {
                    b(i.container || t).append(a.addClass("".concat(u, "-inline")));
                } else {
                    b(document.body).append(a.addClass("".concat(u, "-dropdown")));
                    a.addClass(y).css({
                        zIndex: parseInt(i.zIndex, 10)
                    });
                }
                this.renderWeek();
            }
        }, {
            key: "unbuild",
            value: function e() {
                if (!this.built) {
                    return;
                }
                this.built = false;
                this.$picker.remove();
            }
        }, {
            key: "bind",
            value: function e() {
                var t = this.options, i = this.$element;
                if (b.isFunction(t.show)) {
                    i.on(p, t.show);
                }
                if (b.isFunction(t.hide)) {
                    i.on(o, t.hide);
                }
                if (b.isFunction(t.pick)) {
                    i.on(c, t.pick);
                }
                if (this.isInput) {
                    i.on(d, b.proxy(this.keyup, this));
                }
                if (!this.inline) {
                    if (t.trigger) {
                        this.$trigger.on(h, b.proxy(this.toggle, this));
                    } else if (this.isInput) {
                        i.on(l, b.proxy(this.show, this));
                    } else {
                        i.on(h, b.proxy(this.show, this));
                    }
                }
            }
        }, {
            key: "unbind",
            value: function e() {
                var t = this.$element, i = this.options;
                if (b.isFunction(i.show)) {
                    t.off(p, i.show);
                }
                if (b.isFunction(i.hide)) {
                    t.off(o, i.hide);
                }
                if (b.isFunction(i.pick)) {
                    t.off(c, i.pick);
                }
                if (this.isInput) {
                    t.off(d, this.keyup);
                }
                if (!this.inline) {
                    if (i.trigger) {
                        this.$trigger.off(h, this.toggle);
                    } else if (this.isInput) {
                        t.off(l, this.show);
                    } else {
                        t.off(h, this.show);
                    }
                }
            }
        }, {
            key: "showView",
            value: function e(t) {
                var i = this.$yearsPicker, a = this.$monthsPicker, s = this.$daysPicker, r = this.format;
                if (r.hasYear || r.hasMonth || r.hasDay) {
                    switch (Number(t)) {
                      case w.YEARS:
                        a.addClass(y);
                        s.addClass(y);
                        if (r.hasYear) {
                            this.renderYears();
                            i.removeClass(y);
                            this.place();
                        } else {
                            this.showView(w.DAYS);
                        }
                        break;

                      case w.MONTHS:
                        i.addClass(y);
                        s.addClass(y);
                        if (r.hasMonth) {
                            this.renderMonths();
                            a.removeClass(y);
                            this.place();
                        } else {
                            this.showView(w.YEARS);
                        }
                        break;

                      default:
                        i.addClass(y);
                        a.addClass(y);
                        if (r.hasDay) {
                            this.renderDays();
                            s.removeClass(y);
                            this.place();
                        } else {
                            this.showView(w.MONTHS);
                        }
                    }
                }
            }
        }, {
            key: "hideView",
            value: function e() {
                if (!this.inline && this.options.autoHide) {
                    this.hide();
                }
            }
        }, {
            key: "place",
            value: function e() {
                if (this.inline) {
                    return;
                }
                var t = this.$element, i = this.options, a = this.$picker;
                var s = b(document).outerWidth();
                var r = b(document).outerHeight();
                var n = t.outerWidth();
                var h = t.outerHeight();
                var l = a.width();
                var o = a.height();
                var u = t.offset(), d = u.left, c = u.top;
                var f = parseFloat(i.offset);
                var v = H;
                if ($(f)) {
                    f = 10;
                }
                if (c > o && c + h + o > r) {
                    c -= o + f;
                    v = z;
                } else {
                    c += h + f;
                }
                if (d + l > s) {
                    d += n - l;
                    v = v.replace("left", "right");
                }
                a.removeClass(G).addClass(v).css({
                    top: c,
                    left: d
                });
            }
        }, {
            key: "trigger",
            value: function e(t, i) {
                var a = b.Event(t, i);
                this.$element.trigger(a);
                return a;
            }
        }, {
            key: "createItem",
            value: function e(t) {
                var i = this.options;
                var a = i.itemTag;
                var s = {
                    text: "",
                    view: "",
                    muted: false,
                    picked: false,
                    disabled: false,
                    highlighted: false
                };
                var r = [];
                b.extend(s, t);
                if (s.muted) {
                    r.push(i.mutedClass);
                }
                if (s.highlighted) {
                    r.push(i.highlightedClass);
                }
                if (s.picked) {
                    r.push(i.pickedClass);
                }
                if (s.disabled) {
                    r.push(i.disabledClass);
                }
                return "<".concat(a, ' class="').concat(r.join(" "), '" data-view="').concat(s.view, '">').concat(s.text, "</").concat(a, ">");
            }
        }, {
            key: "getValue",
            value: function e() {
                var t = this.$element;
                return this.isInput ? t.val() : t.text();
            }
        }, {
            key: "setValue",
            value: function e() {
                var t = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
                var i = this.$element;
                if (this.isInput) {
                    i.val(t);
                } else if (!this.inline || this.options.container) {
                    i.text(t);
                }
            }
        } ], [ {
            key: "setDefaults",
            value: function e() {
                var t = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
                b.extend(r, m[t.language], b.isPlainObject(t) && t);
            }
        } ]);
        return i;
    }();
    if (b.extend) {
        b.extend(K.prototype, E, q, O);
    }
    if (b.fn) {
        var L = b.fn.datepicker;
        b.fn.datepicker = function e(h) {
            for (var t = arguments.length, l = new Array(t > 1 ? t - 1 : 0), i = 1; i < t; i++) {
                l[i - 1] = arguments[i];
            }
            var o;
            this.each(function(e, t) {
                var i = b(t);
                var a = h === "destroy";
                var s = i.data(u);
                if (!s) {
                    if (a) {
                        return;
                    }
                    var r = b.extend({}, i.data(), b.isPlainObject(h) && h);
                    s = new K(t, r);
                    i.data(u, s);
                }
                if (C(h)) {
                    var n = s[h];
                    if (b.isFunction(n)) {
                        o = n.apply(s, l);
                        if (a) {
                            i.removeData(u);
                        }
                    }
                }
            });
            return !M(o) ? o : this;
        };
        b.fn.datepicker.Constructor = K;
        b.fn.datepicker.languages = m;
        b.fn.datepicker.setDefaults = K.setDefaults;
        b.fn.datepicker.noConflict = function e() {
            b.fn.datepicker = L;
            return this;
        };
    }
});

(function(e, t) {
    typeof exports === "object" && typeof module !== "undefined" ? t(require("jquery")) : typeof define === "function" && define.amd ? define([ "jquery" ], t) : t(e.jQuery);
})(this, function(e) {
    "use strict";
    e.fn.datepicker.languages["ca-ES"] = {
        format: "dd/mm/yyyy",
        days: [ "diumenge", "dilluns", "dimarts", "dimecres", "dijous", "divendres", "dissabte" ],
        daysShort: [ "dg.", "dl.", "dt.", "dc.", "dj.", "dv.", "ds." ],
        daysMin: [ "dg", "dl", "dt", "dc", "dj", "dv", "ds" ],
        weekStart: 1,
        months: [ "gener", "febrer", "març", "abril", "maig", "juny", "juliol", "agost", "setembre", "octubre", "novembre", "desembre" ],
        monthsShort: [ "gen.", "febr.", "març", "abr.", "maig", "juny", "jul.", "ag.", "set.", "oct.", "nov.", "des." ]
    };
});