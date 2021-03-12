!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],t):t((e=e||self).jQuery)}(this,function(D){"use strict";function s(e,t){for(var i=0;i<t.length;i++){var a=t[i];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}D=D&&D.hasOwnProperty("default")?D.default:D;var n={autoShow:!1,autoHide:!1,autoPick:!1,inline:!1,container:null,trigger:null,language:"",format:"mm/dd/yyyy",date:null,startDate:null,endDate:null,startView:0,weekStart:0,yearFirst:!1,yearSuffix:"",days:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],daysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],daysMin:["Su","Mo","Tu","We","Th","Fr","Sa"],months:["January","February","March","April","May","June","July","August","September","October","November","December"],monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],itemTag:"li",mutedClass:"muted",pickedClass:"picked",disabledClass:"disabled",highlightedClass:"highlighted",template:'<div class="datepicker-container"><div class="datepicker-panel" data-view="years picker"><ul><li data-view="years prev">&lsaquo;</li><li data-view="years current"></li><li data-view="years next">&rsaquo;</li></ul><ul data-view="years"></ul></div><div class="datepicker-panel" data-view="months picker"><ul><li data-view="year prev">&lsaquo;</li><li data-view="year current"></li><li data-view="year next">&rsaquo;</li></ul><ul data-view="months"></ul></div><div class="datepicker-panel" data-view="days picker"><ul><li data-view="month prev">&lsaquo;</li><li data-view="month current"></li><li data-view="month next">&rsaquo;</li></ul><ul data-view="week"></ul><ul data-view="days"></ul></div></div>',offset:10,zIndex:1e3,filter:null,show:null,hide:null,pick:null},e="undefined"!=typeof window,t=e?window:{},i=!!e&&"ontouchstart"in t.document.documentElement,d="datepicker",r="click.".concat(d),h="focus.".concat(d),o="hide.".concat(d),l="keyup.".concat(d),c="pick.".concat(d),a="resize.".concat(d),u="scroll.".concat(d),f="show.".concat(d),p="touchstart.".concat(d),g="".concat(d,"-hide"),y={},m=0,v=1,w=2,k=Object.prototype.toString;function b(e){return"string"==typeof e}var C=Number.isNaN||t.isNaN;function $(e){return"number"==typeof e&&!C(e)}function x(e){return void 0===e}function F(e){return"date"===(t=e,k.call(t).slice(8,-1).toLowerCase())&&!C(e.getTime());var t}function M(a,s){for(var e=arguments.length,n=new Array(2<e?e-2:0),t=2;t<e;t++)n[t-2]=arguments[t];return function(){for(var e=arguments.length,t=new Array(e),i=0;i<e;i++)t[i]=arguments[i];return a.apply(s,n.concat(t))}}function Y(e){return'[data-view="'.concat(e,'"]')}function G(e,t){return[31,(i=e,i%4==0&&i%100!=0||i%400==0?29:28),31,30,31,30,31,31,30,31,30,31][t];var i}function S(e,t,i){return Math.min(i,G(e,t))}var V=/(y|m|d)+/g;function T(e){var t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:1,i=String(Math.abs(e)),a=i.length,s="";for(e<0&&(s+="-");a<t;)a+=1,s+="0";return s+i}var I=/\d+/g,j={show:function(){this.built||this.build(),this.shown||this.trigger(f).isDefaultPrevented()||(this.shown=!0,this.$picker.removeClass(g).on(r,D.proxy(this.click,this)),this.showView(this.options.startView),this.inline||(this.$scrollParent.on(u,D.proxy(this.place,this)),D(window).on(a,this.onResize=M(this.place,this)),D(document).on(r,this.onGlobalClick=M(this.globalClick,this)),D(document).on(l,this.onGlobalKeyup=M(this.globalKeyup,this)),i&&D(document).on(p,this.onTouchStart=M(this.touchstart,this)),this.place()))},hide:function(){this.shown&&(this.trigger(o).isDefaultPrevented()||(this.shown=!1,this.$picker.addClass(g).off(r,this.click),this.inline||(this.$scrollParent.off(u,this.place),D(window).off(a,this.onResize),D(document).off(r,this.onGlobalClick),D(document).off(l,this.onGlobalKeyup),i&&D(document).off(p,this.onTouchStart))))},toggle:function(){this.shown?this.hide():this.show()},update:function(){var e=this.getValue();e!==this.oldValue&&(this.setDate(e,!0),this.oldValue=e)},pick:function(e){var t=this.$element,i=this.date;this.trigger(c,{view:e||"",date:i}).isDefaultPrevented()||(i=this.formatDate(this.date),this.setValue(i),this.isInput&&(t.trigger("input"),t.trigger("change")))},reset:function(){this.setDate(this.initialDate,!0),this.setValue(this.initialValue),this.shown&&this.showView(this.options.startView)},getMonthName:function(e,t){var i=this.options,a=i.monthsShort,s=i.months;return D.isNumeric(e)?e=Number(e):x(t)&&(t=e),!0===t&&(s=a),s[$(e)?e:this.date.getMonth()]},getDayName:function(e,t,i){var a=this.options,s=a.days;return D.isNumeric(e)?e=Number(e):(x(i)&&(i=t),x(t)&&(t=e)),i?s=a.daysMin:t&&(s=a.daysShort),s[$(e)?e:this.date.getDay()]},getDate:function(e){var t=this.date;return e?this.formatDate(t):new Date(t)},setDate:function(e,t){var i=this.options.filter;if(F(e)||b(e)){if(e=this.parseDate(e),D.isFunction(i)&&!1===i.call(this.$element,e,"day"))return;this.date=e,this.viewDate=new Date(e),t||this.pick(),this.built&&this.render()}},setStartDate:function(e){F(e)||b(e)?this.startDate=this.parseDate(e):this.startDate=null,this.built&&this.render()},setEndDate:function(e){F(e)||b(e)?this.endDate=this.parseDate(e):this.endDate=null,this.built&&this.render()},parseDate:function(a){var s=this.format,e=[];return F(a)||(b(a)&&(e=a.match(I)||[]),F(a=a?new Date(a):new Date)||(a=new Date),e.length===s.parts.length&&(D.each(e,function(e,t){var i=parseInt(t,10);switch(s.parts[e]){case"yy":a.setFullYear(2e3+i);break;case"yyyy":a.setFullYear(2===t.length?2e3+i:i);break;case"mm":case"m":a.setMonth(i-1)}}),D.each(e,function(e,t){var i=parseInt(t,10);switch(s.parts[e]){case"dd":case"d":a.setDate(i)}}))),new Date(a.getFullYear(),a.getMonth(),a.getDate())},formatDate:function(e){var t=this.format,i="";if(F(e)){var a=e.getFullYear(),s=e.getMonth(),n=e.getDate(),r={d:n,dd:T(n,2),m:s+1,mm:T(s+1,2),yy:String(a).substring(2),yyyy:T(a,4)};i=t.source,D.each(t.parts,function(e,t){i=i.replace(t,r[t])})}return i},destroy:function(){this.unbind(),this.unbuild(),this.$element.removeData(d)}},P={click:function(e){var t=D(e.target),i=this.options,a=this.date,s=this.viewDate,n=this.format;if(e.stopPropagation(),e.preventDefault(),!t.hasClass("disabled")){var r=t.data("view"),h=s.getFullYear(),o=s.getMonth(),l=s.getDate();switch(r){case"years prev":case"years next":h="years prev"===r?h-10:h+10,s.setFullYear(h),s.setDate(S(h,o,l)),this.renderYears();break;case"year prev":case"year next":h="year prev"===r?h-1:h+1,s.setFullYear(h),s.setDate(S(h,o,l)),this.renderMonths();break;case"year current":n.hasYear&&this.showView(w);break;case"year picked":n.hasMonth?this.showView(v):(t.siblings(".".concat(i.pickedClass)).removeClass(i.pickedClass).data("view","year"),this.hideView()),this.pick("year");break;case"year":h=parseInt(t.text(),10),a.setDate(S(h,o,l)),a.setFullYear(h),s.setDate(S(h,o,l)),s.setFullYear(h),n.hasMonth?this.showView(v):(t.addClass(i.pickedClass).data("view","year picked").siblings(".".concat(i.pickedClass)).removeClass(i.pickedClass).data("view","year"),this.hideView()),this.pick("year");break;case"month prev":case"month next":(o="month prev"===r?o-1:o+1)<0?(h-=1,o+=12):11<o&&(h+=1,o-=12),s.setFullYear(h),s.setDate(S(h,o,l)),s.setMonth(o),this.renderDays();break;case"month current":n.hasMonth&&this.showView(v);break;case"month picked":n.hasDay?this.showView(m):(t.siblings(".".concat(i.pickedClass)).removeClass(i.pickedClass).data("view","month"),this.hideView()),this.pick("month");break;case"month":o=D.inArray(t.text(),i.monthsShort),a.setFullYear(h),a.setDate(S(h,o,l)),a.setMonth(o),s.setFullYear(h),s.setDate(S(h,o,l)),s.setMonth(o),n.hasDay?this.showView(m):(t.addClass(i.pickedClass).data("view","month picked").siblings(".".concat(i.pickedClass)).removeClass(i.pickedClass).data("view","month"),this.hideView()),this.pick("month");break;case"day prev":case"day next":case"day":"day prev"===r?o-=1:"day next"===r&&(o+=1),l=parseInt(t.text(),10),a.setDate(1),a.setFullYear(h),a.setMonth(o),a.setDate(l),s.setDate(1),s.setFullYear(h),s.setMonth(o),s.setDate(l),this.renderDays(),"day"===r&&this.hideView(),this.pick("day");break;case"day picked":this.hideView(),this.pick("day")}}},globalClick:function(e){for(var t=e.target,i=this.element,a=this.$trigger[0],s=!0;t!==document;){if(t===a||t===i){s=!1;break}t=t.parentNode}s&&this.hide()},keyup:function(){this.update()},globalKeyup:function(e){var t=e.target,i=e.key,a=e.keyCode;this.isInput&&t!==this.element&&this.shown&&("Tab"===i||9===a)&&this.hide()},touchstart:function(e){var t=e.target;this.isInput&&t!==this.element&&!D.contains(this.$picker[0],t)&&(this.hide(),this.element.blur())}},N={render:function(){this.renderYears(),this.renderMonths(),this.renderDays()},renderWeek:function(){var i=this,a=[],e=this.options,t=e.weekStart,s=e.daysMin;t=parseInt(t,10)%7,s=s.slice(t).concat(s.slice(0,t)),D.each(s,function(e,t){a.push(i.createItem({text:t}))}),this.$week.html(a.join(""))},renderYears:function(){var e,t=this.options,i=this.startDate,a=this.endDate,s=t.disabledClass,n=t.filter,r=t.yearSuffix,h=this.viewDate.getFullYear(),o=(new Date).getFullYear(),l=this.date.getFullYear(),d=[],c=!1,u=!1;for(e=-5;e<=6;e+=1){var f=new Date(h+e,1,1),p=!1;i&&(p=f.getFullYear()<i.getFullYear(),-5===e&&(c=p)),!p&&a&&(p=f.getFullYear()>a.getFullYear(),6===e&&(u=p)),!p&&n&&(p=!1===n.call(this.$element,f,"year"));var g=h+e===l,y=g?"year picked":"year";d.push(this.createItem({picked:g,disabled:p,text:h+e,view:p?"year disabled":y,highlighted:f.getFullYear()===o}))}this.$yearsPrev.toggleClass(s,c),this.$yearsNext.toggleClass(s,u),this.$yearsCurrent.toggleClass(s,!0).html("".concat(h+-5+r," - ").concat(h+6).concat(r)),this.$years.html(d.join(""))},renderMonths:function(){var e,t=this.options,i=this.startDate,a=this.endDate,s=this.viewDate,n=t.disabledClass||"",r=t.monthsShort,h=D.isFunction(t.filter)&&t.filter,o=s.getFullYear(),l=new Date,d=l.getFullYear(),c=l.getMonth(),u=this.date.getFullYear(),f=this.date.getMonth(),p=[],g=!1,y=!1;for(e=0;e<=11;e+=1){var m=new Date(o,e,1),v=!1;i&&(v=(g=m.getFullYear()===i.getFullYear())&&m.getMonth()<i.getMonth()),!v&&a&&(v=(y=m.getFullYear()===a.getFullYear())&&m.getMonth()>a.getMonth()),!v&&h&&(v=!1===h.call(this.$element,m,"month"));var w=o===u&&e===f,k=w?"month picked":"month";p.push(this.createItem({disabled:v,picked:w,highlighted:o===d&&m.getMonth()===c,index:e,text:r[e],view:v?"month disabled":k}))}this.$yearPrev.toggleClass(n,g),this.$yearNext.toggleClass(n,y),this.$yearCurrent.toggleClass(n,g&&y).html(o+t.yearSuffix||""),this.$months.html(p.join(""))},renderDays:function(){var e,t,i,a=this.$element,s=this.options,n=this.startDate,r=this.endDate,h=this.viewDate,o=this.date,l=s.disabledClass,d=s.filter,c=s.months,u=s.weekStart,f=s.yearSuffix,p=h.getFullYear(),g=h.getMonth(),y=new Date,m=y.getFullYear(),v=y.getMonth(),w=y.getDate(),k=o.getFullYear(),D=o.getMonth(),b=o.getDate(),C=[],$=p,x=g,F=!1;0===g?($-=1,x=11):x-=1,e=G($,x);var M=new Date(p,g,1);for((i=M.getDay()-parseInt(u,10)%7)<=0&&(i+=7),n&&(F=M.getTime()<=n.getTime()),t=e-(i-1);t<=e;t+=1){var Y=new Date($,x,t),S=!1;n&&(S=Y.getTime()<n.getTime()),!S&&d&&(S=!1===d.call(a,Y,"day")),C.push(this.createItem({disabled:S,highlighted:$===m&&x===v&&Y.getDate()===w,muted:!0,picked:$===k&&x===D&&t===b,text:t,view:"day prev"}))}var V=[],T=p,I=g,j=!1;11===g?(T+=1,I=0):I+=1,e=G(p,g),i=42-(C.length+e);var P=new Date(p,g,e);for(r&&(j=P.getTime()>=r.getTime()),t=1;t<=i;t+=1){var N=new Date(T,I,t),q=T===k&&I===D&&t===b,A=!1;r&&(A=N.getTime()>r.getTime()),!A&&d&&(A=!1===d.call(a,N,"day")),V.push(this.createItem({disabled:A,picked:q,highlighted:T===m&&I===v&&N.getDate()===w,muted:!0,text:t,view:"day next"}))}var O=[];for(t=1;t<=e;t+=1){var W=new Date(p,g,t),z=!1;n&&(z=W.getTime()<n.getTime()),!z&&r&&(z=W.getTime()>r.getTime()),!z&&d&&(z=!1===d.call(a,W,"day"));var E=p===k&&g===D&&t===b,J=E?"day picked":"day";O.push(this.createItem({disabled:z,picked:E,highlighted:p===m&&g===v&&W.getDate()===w,text:t,view:z?"day disabled":J}))}this.$monthPrev.toggleClass(l,F),this.$monthNext.toggleClass(l,j),this.$monthCurrent.toggleClass(l,F&&j).html(s.yearFirst?"".concat(p+f," ").concat(c[g]):"".concat(c[g]," ").concat(p).concat(f)),this.$days.html(C.join("")+O.join("")+V.join(""))}},q="".concat(d,"-top-left"),A="".concat(d,"-top-right"),O="".concat(d,"-bottom-left"),W="".concat(d,"-bottom-right"),z=[q,A,O,W].join(" "),E=function(){function i(e){var t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{};!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,i),this.$element=D(e),this.element=e,this.options=D.extend({},n,y[t.language],D.isPlainObject(t)&&t),this.$scrollParent=function(e){var t=1<arguments.length&&void 0!==arguments[1]&&arguments[1],i=D(e),a=i.css("position"),s="absolute"===a,n=t?/auto|scroll|hidden/:/auto|scroll/,r=i.parents().filter(function(e,t){var i=D(t);return(!s||"static"!==i.css("position"))&&n.test(i.css("overflow")+i.css("overflow-y")+i.css("overflow-x"))}).eq(0);return"fixed"!==a&&r.length?r:D(e.ownerDocument||document)}(e,!0),this.built=!1,this.shown=!1,this.isInput=!1,this.inline=!1,this.initialValue="",this.initialDate=null,this.startDate=null,this.endDate=null,this.init()}var e,t,a;return e=i,a=[{key:"setDefaults",value:function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{};D.extend(n,y[e.language],D.isPlainObject(e)&&e)}}],(t=[{key:"init",value:function(){var e=this.$element,t=this.options,i=t.startDate,a=t.endDate,s=t.date;this.$trigger=D(t.trigger),this.isInput=e.is("input")||e.is("textarea"),this.inline=t.inline&&(t.container||!this.isInput),this.format=function(i){var e=String(i).toLowerCase(),t=e.match(V);if(!t||0===t.length)throw new Error("Invalid date format.");return i={source:e,parts:t},D.each(t,function(e,t){switch(t){case"dd":case"d":i.hasDay=!0;break;case"mm":case"m":i.hasMonth=!0;break;case"yyyy":case"yy":i.hasYear=!0}}),i}(t.format);var n=this.getValue();this.initialValue=n,this.oldValue=n,s=this.parseDate(s||n),i&&(i=this.parseDate(i),s.getTime()<i.getTime()&&(s=new Date(i)),this.startDate=i),a&&(a=this.parseDate(a),i&&a.getTime()<i.getTime()&&(a=new Date(i)),s.getTime()>a.getTime()&&(s=new Date(a)),this.endDate=a),this.date=s,this.viewDate=new Date(s),this.initialDate=new Date(this.date),this.bind(),(t.autoShow||this.inline)&&this.show(),t.autoPick&&this.pick()}},{key:"build",value:function(){if(!this.built){this.built=!0;var e=this.$element,t=this.options,i=D(t.template);this.$picker=i,this.$week=i.find(Y("week")),this.$yearsPicker=i.find(Y("years picker")),this.$yearsPrev=i.find(Y("years prev")),this.$yearsNext=i.find(Y("years next")),this.$yearsCurrent=i.find(Y("years current")),this.$years=i.find(Y("years")),this.$monthsPicker=i.find(Y("months picker")),this.$yearPrev=i.find(Y("year prev")),this.$yearNext=i.find(Y("year next")),this.$yearCurrent=i.find(Y("year current")),this.$months=i.find(Y("months")),this.$daysPicker=i.find(Y("days picker")),this.$monthPrev=i.find(Y("month prev")),this.$monthNext=i.find(Y("month next")),this.$monthCurrent=i.find(Y("month current")),this.$days=i.find(Y("days")),this.inline?D(t.container||e).append(i.addClass("".concat(d,"-inline"))):(D(document.body).append(i.addClass("".concat(d,"-dropdown"))),i.addClass(g).css({zIndex:parseInt(t.zIndex,10)})),this.renderWeek()}}},{key:"unbuild",value:function(){this.built&&(this.built=!1,this.$picker.remove())}},{key:"bind",value:function(){var e=this.options,t=this.$element;D.isFunction(e.show)&&t.on(f,e.show),D.isFunction(e.hide)&&t.on(o,e.hide),D.isFunction(e.pick)&&t.on(c,e.pick),this.isInput&&t.on(l,D.proxy(this.keyup,this)),this.inline||(e.trigger?this.$trigger.on(r,D.proxy(this.toggle,this)):this.isInput?t.on(h,D.proxy(this.show,this)):t.on(r,D.proxy(this.show,this)))}},{key:"unbind",value:function(){var e=this.$element,t=this.options;D.isFunction(t.show)&&e.off(f,t.show),D.isFunction(t.hide)&&e.off(o,t.hide),D.isFunction(t.pick)&&e.off(c,t.pick),this.isInput&&e.off(l,this.keyup),this.inline||(t.trigger?this.$trigger.off(r,this.toggle):this.isInput?e.off(h,this.show):e.off(r,this.show))}},{key:"showView",value:function(e){var t=this.$yearsPicker,i=this.$monthsPicker,a=this.$daysPicker,s=this.format;if(s.hasYear||s.hasMonth||s.hasDay)switch(Number(e)){case w:i.addClass(g),a.addClass(g),s.hasYear?(this.renderYears(),t.removeClass(g),this.place()):this.showView(m);break;case v:t.addClass(g),a.addClass(g),s.hasMonth?(this.renderMonths(),i.removeClass(g),this.place()):this.showView(w);break;default:t.addClass(g),i.addClass(g),s.hasDay?(this.renderDays(),a.removeClass(g),this.place()):this.showView(v)}}},{key:"hideView",value:function(){!this.inline&&this.options.autoHide&&this.hide()}},{key:"place",value:function(){if(!this.inline){var e=this.$element,t=this.options,i=this.$picker,a=D(document).outerWidth(),s=D(document).outerHeight(),n=e.outerWidth(),r=e.outerHeight(),h=i.width(),o=i.height(),l=e.offset(),d=l.left,c=l.top,u=parseFloat(t.offset),f=q;C(u)&&(u=10),o<c&&s<c+r+o?(c-=o+u,f=O):c+=r+u,a<d+h&&(d+=n-h,f=f.replace("left","right")),i.removeClass(z).addClass(f).css({top:c,left:d})}}},{key:"trigger",value:function(e,t){var i=D.Event(e,t);return this.$element.trigger(i),i}},{key:"createItem",value:function(e){var t=this.options,i=t.itemTag,a={text:"",view:"",muted:!1,picked:!1,disabled:!1,highlighted:!1},s=[];return D.extend(a,e),a.muted&&s.push(t.mutedClass),a.highlighted&&s.push(t.highlightedClass),a.picked&&s.push(t.pickedClass),a.disabled&&s.push(t.disabledClass),"<".concat(i,' class="').concat(s.join(" "),'" data-view="').concat(a.view,'">').concat(a.text,"</").concat(i,">")}},{key:"getValue",value:function(){var e=this.$element;return this.isInput?e.val():e.text()}},{key:"setValue",value:function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:"",t=this.$element;this.isInput?t.val(e):this.inline&&!this.options.container||t.text(e)}}])&&s(e.prototype,t),a&&s(e,a),i}();if(D.extend&&D.extend(E.prototype,N,P,j),D.fn){var J=D.fn.datepicker;D.fn.datepicker=function(h){for(var e=arguments.length,o=new Array(1<e?e-1:0),t=1;t<e;t++)o[t-1]=arguments[t];var l;return this.each(function(e,t){var i=D(t),a="destroy"===h,s=i.data(d);if(!s){if(a)return;var n=D.extend({},i.data(),D.isPlainObject(h)&&h);s=new E(t,n),i.data(d,s)}if(b(h)){var r=s[h];D.isFunction(r)&&(l=r.apply(s,o),a&&i.removeData(d))}}),x(l)?this:l},D.fn.datepicker.Constructor=E,D.fn.datepicker.languages=y,D.fn.datepicker.setDefaults=E.setDefaults,D.fn.datepicker.noConflict=function(){return D.fn.datepicker=J,this}}}),function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],t):t(e.jQuery)}(this,function(e){"use strict";e.fn.datepicker.languages["ca-ES"]={format:"dd/mm/yyyy",days:["diumenge","dilluns","dimarts","dimecres","dijous","divendres","dissabte"],daysShort:["dg.","dl.","dt.","dc.","dj.","dv.","ds."],daysMin:["dg","dl","dt","dc","dj","dv","ds"],weekStart:1,months:["gener","febrer","març","abril","maig","juny","juliol","agost","setembre","octubre","novembre","desembre"],monthsShort:["gen.","febr.","març","abr.","maig","juny","jul.","ag.","set.","oct.","nov.","des."]}});