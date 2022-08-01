importScripts("https://storage.googleapis.com/workbox-cdn/releases/5.0.0/workbox-sw.js"),workbox.core.skipWaiting(),workbox.core.clientsClaim(),workbox.routing.registerRoute(new RegExp("/(?:icon-|js|css|img)"),new workbox.strategies.CacheFirst),workbox.routing.registerRoute(new RegExp(".(?:jpg|jpeg|png|gif|svg)$"),new workbox.strategies.CacheFirst),workbox.routing.registerRoute(new RegExp("/"),new workbox.strategies.NetworkFirst({cacheName:"pages"})),workbox.routing.registerRoute(new RegExp(".*(?:googleapis|gstatic).com.*$"),new workbox.strategies.NetworkFirst({cacheName:"google"})),workbox.precaching.precacheAndRoute([{url:"offline",revision:Date.now()}].concat([{"revision":"7f20e55cd1ddbfce1c8e08c5622af6b9","url":"100.png"},{"revision":"da8b034c50b9da2ab4fff0584a18db29","url":"114.png"},{"revision":"342dd7829f09b27f562365706018344a","url":"120.png"},{"revision":"8b7f6e63922beb831de18010e0ad7e56","url":"144.png"},{"revision":"afa3e3021a512f9f585366627091c43d","url":"152.png"},{"revision":"a8209e199ee0eda80d56cd72b41115d7","url":"196.png"},{"revision":"fc854620fc5fca28e85d98b308306b38","url":"256.png"},{"revision":"3d4df8c148134ceb3a165acab1e4703d","url":"32.png"},{"revision":"cb95a92e96b8169dd48de4ed52d50fde","url":"48.png"},{"revision":"3a3082775c73eec958bd6272bb9b866f","url":"512.png"},{"revision":"f98f921beb5c0b6b59afb6a8ae9696c7","url":"76.png"},{"revision":"32336e830832d71652f00c631bad677d","url":"88.png"},{"revision":"61be10c6555f8806d8a7cb3b0f250ab9","url":"build/assets/app.bf533996.js"},{"revision":"91a5160d4342730f44deff994048511a","url":"build/assets/vendor.cfa10b40.js"},{"revision":"1fdc9e18feefb07a878c22b75ce8ab03","url":"css/app.css"},{"revision":"79f3e5f841a2d4425d7cd118b0112872","url":"js/app.js"},{"revision":"fcd590a0382a624b4dadb8b228fd382c","url":"logos/images/FtmJlMdQzXtTYMFcKe3diNjxQYNhTGZEVrSlqEzu.png"},{"revision":"fbedfee06c3bdc1bedaab010353c1c18","url":"offline.html"},{"revision":"ea520bdaf27947d98ac84f3a9b8f19fb","url":"sw.js"},{"revision":"a2d5834a309f390346f470ada9ff61b5","url":"vendor/installer/index.8626dda2.css"},{"revision":"2f3089ebbc0b785783018da270980683","url":"vendor/installer/index.9c793cbf.js"},{"revision":"b717051a38182157486700bc748103cd","url":"vendor/installer/vendor.7628f02f.css"},{"revision":"9dba6fadbd180c0851a48eddd5ecf0d6","url":"vendor/installer/vendor.968a0644.js"}]));const customHandler=async e=>{try{return await workbox.strategies.NetworkFirst({cacheName:"pages",plugins:[new workbox.expiration.ExpirationPlugin({maxEntries:200})]}).handle(e)||caches.match("offline")}catch(e){return caches.match("offline")}},navigationRoute=new workbox.routing.NavigationRoute(customHandler,{blacklist:[new RegExp("/(login|password)")]});workbox.routing.registerRoute(navigationRoute);
