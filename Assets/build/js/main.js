!function(){"use strict";var n;(n=jQuery)(".submenu").before('<i class="icon-arrow-down switch"></i>'),n(".vertical-menu li i.switch").on("click",function(){var e=n(this).next(".submenu");e.slideToggle(300),e.parent().toggleClass("openmenu")}),n(".humburger").on("click",function(){n(".canvas-menu").toggleClass("open"),n(".main-overlay").toggleClass("active")}),n(".canvas-menu .btn-close, .main-overlay").on("click",function(){n(".canvas-menu").removeClass("open"),n(".main-overlay").removeClass("active")}),n(document).keyup(function(e){"Escape"===e.key&&n(".search-popup").removeClass("visible")}),n("div.search").on("click",function(){n(".search-popup").addClass("visible")}),n(".search-popup .btn-close").on("click",function(){n(".search-popup").removeClass("visible")}),n(document).keyup(function(e){"Escape"===e.key&&n(".search-popup").removeClass("visible")});let e=document.getElementById("return-to-top");e.addEventListener("click",function(){window.scrollTo({top:0,behavior:"smooth"})})}();