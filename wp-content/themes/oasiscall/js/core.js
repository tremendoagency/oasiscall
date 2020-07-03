(function($) {
  "use strict"; // Start of use strict

  // Home Slider

  var homeSLider = new Swiper('#home-slider', {
    speed: 1000,
    direction: 'vertical',
    mousewheel: true,
    forceToAxis: true,
    hashNavigation:true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

})(jQuery); // End of use strict