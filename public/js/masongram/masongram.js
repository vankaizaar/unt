!function(t,n,o){"use strict";t.masongram=o.fn.masongram=function(t){return this.each(function(){new e(this,t)})};var e=function(){function e(t,n){var o=this;d.forEach(function(t){o.require(t)}),u||(this.configure(n),this.setup(t))}var c,r,s,l,d=["jQuery","Masonry"],u=!1;return e.prototype={require:function(n){var o=void 0!==t[n];return o||(u=!0,console.error("Dependency unavailable: "+n)),o},configure:function(t){c=o.extend(!0,{endpoint:"users/self",loop:!1,count:10,offset:10,size:"low_resolution",caption:"{caption}",location:"inherit&caption"},t)},setup:function(e){var i=this;r=o("<div>").attr({class:"masongram-container"}).appendTo(e),o("<div>").attr({class:"masongram-image-sizer masongram-image-size-"+c.size}).appendTo(r),r.masonry({itemSelector:".masongram-image-container",columnWidth:".masongram-image-sizer",percentPosition:!0}),s=new a(c),s.on("loaded",function(t){i.append(t)});var l;o(t).scroll(function(){l||(l=setTimeout(function(){r.imagesLoaded().progress(function(){o(t).scrollTop()>o(n).height()-o(t).height()*(1+c.offset/100)&&i.load()}),l=null},100))}),r.on("layoutComplete",function(){r.imagesLoaded().progress(function(){o("body").height()<o(t).height()&&i.load()})}),i.load()},load:function(){l||(l=!0,s.load())},append:function(n){n.forEach(function(e,a){var s=new i(e,{caption:c.caption,size:c.size,location:c.location}),d=s.getObject();setTimeout(function(){d.imagesLoaded().progress(function(){r.append(d).masonry("appended",d),a+1===n.length&&(l=!1,o(t).trigger("scroll"))})},200*a)})}},e}(),a=function(){function t(t){n=t,e="https://api.instagram.com/v1/"+n.endpoint+"/media/recent/"}var n,e;return t.prototype={load:function(){if(e){var t=this,a=o.Deferred();return o.ajax({type:"POST",url:e,data:{access_token:n.access_token,count:n.count},dataType:"jsonp"}).success(function(i){o(t).trigger("loaded",[i.data]),a.resolve(i.data),n.loop||(e=!(!i.pagination||!i.pagination.next_url)&&i.pagination.next_url)}).error(function(){a.reject("Error fetching data")}),a.promise()}},on:function(t,n){o(this).on(t,function(t,o){n(o)})}},t}(),i=function(){function t(t,n){e=t,a=n,this.parseLocation(),this.create()}var n,e,a,i="NO_DATA";return t.prototype={create:function(){n=o("<div>").attr({tabindex:0,class:"masongram-image-container masongram-image-size-"+a.size});var t=o("<img>").attr({src:e.images[a.size].url,width:e.images[a.size].width,height:e.images[a.size].height,class:"masongram-image"});t.appendTo(n);var i=o("<div>",{class:"masongram-image-caption-container"}),c=o("<div>",{class:"masongram-image-caption"});e.caption&&e.caption.text&&c.html(this.parseCaption()),c.appendTo(i),i.appendTo(n)},getObject:function(){return n},parseLocation:function(){if(a.location.indexOf("inherit")===-1&&delete e.location,a.location.indexOf("caption")!==-1&&e.caption&&e.caption.text&&/@[\d]+\.[\d]+,[\d]+\.[\d]+/.test(e.caption.text)){var t=e.caption.text.match(/@([\d]+\.[\d]+),([\d]+\.[\d]+)/);e.caption.text=e.caption.text.replace(/\s*@([\d]+\.[\d]+),([\d]+\.[\d]+)/,""),e.location={latitude:t[1],longitude:t[2]}}},parseCaption:function(){var t=a.caption;if(/{.*}/.test(t)){var n=t.match(/{([^}]+)}/g);n.forEach(function(n){switch(n){case"{location}":t=t.replace(n,e.location&&void 0!==e.location.latitude&&void 0!==e.location.longitude?e.location.latitude+","+e.location.longitude:i);break;case"{latitude}":t=t.replace(n,e.location&&void 0!==e.location.latitude?e.location.latitude:i);break;case"{longitude}":t=t.replace(n,e.location&&void 0!==e.location.longitude?e.location.longitude:i);break;case"{caption}":t=t.replace(n,e.caption&&void 0!==e.caption.text?e.caption.text:i);break;case"{likes}":t=t.replace(n,e.likes&&void 0!==e.likes.count?e.likes.count:i);break;case"{link}":t=t.replace(n,e.link?e.link:i)}})}return t}},t}()}(window,document,jQuery);
//# sourceMappingURL=masongram.min.js.map