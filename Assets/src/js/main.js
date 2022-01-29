import "../sass/main.scss";

(function ($) {
  "use strict";

  $(".submenu").before('<i class="icon-arrow-down switch"></i>');
  $(".vertical-menu li i.switch").on("click", function () {
    var $submenu = $(this).next(".submenu");
    $submenu.slideToggle(300);
    $submenu.parent().toggleClass("openmenu");
  });

  $(".humburger").on("click", function () {
    $(".canvas-menu").toggleClass("open");
    $(".main-overlay").toggleClass("active");
  });

  $(".canvas-menu .btn-close, .main-overlay").on("click", function () {
    $(".canvas-menu").removeClass("open");
    $(".main-overlay").removeClass("active");
  });
  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      $(".search-popup").removeClass("visible");
    }
  });
  $("div.search").on("click", function () {
    $(".search-popup").addClass("visible");
  });

  $(".search-popup .btn-close").on("click", function () {
    $(".search-popup").removeClass("visible");
  });

  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      $(".search-popup").removeClass("visible");
    }
  });
})(jQuery);

let btnToTop = document.getElementById("return-to-top");
btnToTop.addEventListener("click", topFunction);
function topFunction() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
