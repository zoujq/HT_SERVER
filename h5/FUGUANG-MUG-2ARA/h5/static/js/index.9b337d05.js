(function(n){function e(e){for(var t,r,c=e[0],u=e[1],s=e[2],l=0,p=[];l<c.length;l++)r=c[l],Object.prototype.hasOwnProperty.call(i,r)&&i[r]&&p.push(i[r][0]),i[r]=0;for(t in u)Object.prototype.hasOwnProperty.call(u,t)&&(n[t]=u[t]);d&&d(e);while(p.length)p.shift()();return a.push.apply(a,s||[]),o()}function o(){for(var n,e=0;e<a.length;e++){for(var o=a[e],t=!0,r=1;r<o.length;r++){var u=o[r];0!==i[u]&&(t=!1)}t&&(a.splice(e--,1),n=c(c.s=o[0]))}return n}var t={},i={index:0},a=[];function r(n){return c.p+"static/js/"+({"pages-connect-connect~pages-index-index":"pages-connect-connect~pages-index-index","pages-connect-connect":"pages-connect-connect","pages-index-index":"pages-index-index","pages-loading-loading":"pages-loading-loading"}[n]||n)+"."+{"pages-connect-connect~pages-index-index":"71bbd9f0","pages-connect-connect":"091eb764","pages-index-index":"81f885d5","pages-loading-loading":"21a06948"}[n]+".js"}function c(e){if(t[e])return t[e].exports;var o=t[e]={i:e,l:!1,exports:{}};return n[e].call(o.exports,o,o.exports,c),o.l=!0,o.exports}c.e=function(n){var e=[],o=i[n];if(0!==o)if(o)e.push(o[2]);else{var t=new Promise((function(e,t){o=i[n]=[e,t]}));e.push(o[2]=t);var a,u=document.createElement("script");u.charset="utf-8",u.timeout=120,c.nc&&u.setAttribute("nonce",c.nc),u.src=r(n);var s=new Error;a=function(e){u.onerror=u.onload=null,clearTimeout(l);var o=i[n];if(0!==o){if(o){var t=e&&("load"===e.type?"missing":e.type),a=e&&e.target&&e.target.src;s.message="Loading chunk "+n+" failed.\n("+t+": "+a+")",s.name="ChunkLoadError",s.type=t,s.request=a,o[1](s)}i[n]=void 0}};var l=setTimeout((function(){a({type:"timeout",target:u})}),12e4);u.onerror=u.onload=a,document.head.appendChild(u)}return Promise.all(e)},c.m=n,c.c=t,c.d=function(n,e,o){c.o(n,e)||Object.defineProperty(n,e,{enumerable:!0,get:o})},c.r=function(n){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(n,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(n,"__esModule",{value:!0})},c.t=function(n,e){if(1&e&&(n=c(n)),8&e)return n;if(4&e&&"object"===typeof n&&n&&n.__esModule)return n;var o=Object.create(null);if(c.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var t in n)c.d(o,t,function(e){return n[e]}.bind(null,t));return o},c.n=function(n){var e=n&&n.__esModule?function(){return n["default"]}:function(){return n};return c.d(e,"a",e),e},c.o=function(n,e){return Object.prototype.hasOwnProperty.call(n,e)},c.p="./",c.oe=function(n){throw console.error(n),n};var u=window["webpackJsonp"]=window["webpackJsonp"]||[],s=u.push.bind(u);u.push=e,u=u.slice();for(var l=0;l<u.length;l++)e(u[l]);var d=s;a.push([0,"chunk-vendors"]),o()})({0:function(n,e,o){n.exports=o("f453")},"0344":function(n,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var t={onLaunch:function(){console.log("App Launch")},onShow:function(){console.log("App Show")},onHide:function(){console.log("App Hide")},globalData:{index_loop_id:-1}};e.default=t},2567:function(n,e,o){"use strict";var t=o("4aac"),i=o.n(t);i.a},"2dcf":function(n,e,o){var t=o("24fb");e=t(!1),e.push([n.i,"\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/*每个页面公共css */body{background-color:#f7f7f7}@media (prefers-color-scheme:dark){body{background-color:#000}}",""]),n.exports=e},"4aac":function(n,e,o){var t=o("2dcf");"string"===typeof t&&(t=[[n.i,t,""]]),t.locals&&(n.exports=t.locals);var i=o("4f06").default;i("4c70564e",t,!0,{sourceMap:!1,shadowMode:!1})},5476:function(n,e,o){"use strict";(function(n){var e=o("4ea4"),t=e(o("e143"));n["____B40E779____"]=!0,delete n["____B40E779____"],n.__uniConfig={globalStyle:{navigationBarTextStyle:"black",navigationBarTitleText:"FUGUANG-MUG",navigationBarBackgroundColor:"#F8F8F8",backgroundColor:"#F7F7F7"}},n.__uniConfig.compilerVersion="2.8.13",n.__uniConfig.responsive={minWidth:768},n.__uniConfig.router={mode:"hash",base:"./"},n.__uniConfig.publicPath="./",n.__uniConfig["async"]={loading:"AsyncLoading",error:"AsyncError",delay:200,timeout:6e4},n.__uniConfig.debug=!1,n.__uniConfig.networkTimeout={request:6e4,connectSocket:6e4,uploadFile:6e4,downloadFile:6e4},n.__uniConfig.sdkConfigs={},n.__uniConfig.qqMapKey="XVXBZ-NDMC4-JOGUS-XGIEE-QVHDZ-AMFV2",n.__uniConfig.nvue={"flex-direction":"column"},n.__uniConfig.__webpack_chunk_load__=o.e,t.default.component("pages-index-index",(function(n){var e={component:Promise.all([o.e("pages-connect-connect~pages-index-index"),o.e("pages-index-index")]).then(function(){return n(o("d791"))}.bind(null,o)).catch(o.oe),delay:__uniConfig["async"].delay,timeout:__uniConfig["async"].timeout};return __uniConfig["async"]["loading"]&&(e.loading={name:"SystemAsyncLoading",render:function(n){return n(__uniConfig["async"]["loading"])}}),__uniConfig["async"]["error"]&&(e.error={name:"SystemAsyncError",render:function(n){return n(__uniConfig["async"]["error"])}}),e})),t.default.component("pages-connect-connect",(function(n){var e={component:Promise.all([o.e("pages-connect-connect~pages-index-index"),o.e("pages-connect-connect")]).then(function(){return n(o("fe8f"))}.bind(null,o)).catch(o.oe),delay:__uniConfig["async"].delay,timeout:__uniConfig["async"].timeout};return __uniConfig["async"]["loading"]&&(e.loading={name:"SystemAsyncLoading",render:function(n){return n(__uniConfig["async"]["loading"])}}),__uniConfig["async"]["error"]&&(e.error={name:"SystemAsyncError",render:function(n){return n(__uniConfig["async"]["error"])}}),e})),t.default.component("pages-loading-loading",(function(n){var e={component:o.e("pages-loading-loading").then(function(){return n(o("c0b0"))}.bind(null,o)).catch(o.oe),delay:__uniConfig["async"].delay,timeout:__uniConfig["async"].timeout};return __uniConfig["async"]["loading"]&&(e.loading={name:"SystemAsyncLoading",render:function(n){return n(__uniConfig["async"]["loading"])}}),__uniConfig["async"]["error"]&&(e.error={name:"SystemAsyncError",render:function(n){return n(__uniConfig["async"]["error"])}}),e})),n.__uniRoutes=[{path:"/",alias:"/pages/index/index",component:{render:function(n){return n("Page",{props:Object.assign({isQuit:!0,isEntry:!0},__uniConfig.globalStyle,{navigationStyle:"custom"})},[n("pages-index-index",{slot:"page"})])}},meta:{id:1,name:"pages-index-index",isNVue:!1,pagePath:"pages/index/index",isQuit:!0,isEntry:!0,windowTop:0}},{path:"/pages/connect/connect",component:{render:function(n){return n("Page",{props:Object.assign({},__uniConfig.globalStyle,{navigationStyle:"custom"})},[n("pages-connect-connect",{slot:"page"})])}},meta:{name:"pages-connect-connect",isNVue:!1,pagePath:"pages/connect/connect",windowTop:0}},{path:"/pages/loading/loading",component:{render:function(n){return n("Page",{props:Object.assign({},__uniConfig.globalStyle,{navigationStyle:"custom"})},[n("pages-loading-loading",{slot:"page"})])}},meta:{name:"pages-loading-loading",isNVue:!1,pagePath:"pages/loading/loading",windowTop:0}},{path:"/preview-image",component:{render:function(n){return n("Page",{props:{navigationStyle:"custom"}},[n("system-preview-image",{slot:"page"})])}},meta:{name:"preview-image",pagePath:"/preview-image"}},{path:"/choose-location",component:{render:function(n){return n("Page",{props:{navigationStyle:"custom"}},[n("system-choose-location",{slot:"page"})])}},meta:{name:"choose-location",pagePath:"/choose-location"}},{path:"/open-location",component:{render:function(n){return n("Page",{props:{navigationStyle:"custom"}},[n("system-open-location",{slot:"page"})])}},meta:{name:"open-location",pagePath:"/open-location"}}],n.UniApp&&new n.UniApp}).call(this,o("c8ba"))},b006:function(n,e,o){"use strict";o.r(e);var t=o("f9e2"),i=o("f346");for(var a in i)"default"!==a&&function(n){o.d(e,n,(function(){return i[n]}))}(a);o("2567");var r,c=o("f0c5"),u=Object(c["a"])(i["default"],t["b"],t["c"],!1,null,null,null,!1,t["a"],r);e["default"]=u.exports},f346:function(n,e,o){"use strict";o.r(e);var t=o("0344"),i=o.n(t);for(var a in t)"default"!==a&&function(n){o.d(e,n,(function(){return t[n]}))}(a);e["default"]=i.a},f453:function(n,e,o){"use strict";var t=o("4ea4"),i=t(o("5530"));o("e260"),o("e6cf"),o("cca6"),o("a79d"),o("5476"),o("1c31");var a=t(o("e143")),r=t(o("b006"));a.default.config.productionTip=!1,r.default.mpType="app";var c=new a.default((0,i.default)({},r.default));c.$mount()},f9e2:function(n,e,o){"use strict";var t;o.d(e,"b",(function(){return i})),o.d(e,"c",(function(){return a})),o.d(e,"a",(function(){return t}));var i=function(){var n=this,e=n.$createElement,o=n._self._c||e;return o("App",{attrs:{keepAliveInclude:n.keepAliveInclude}})},a=[]}});