(function($) {
  "use strict"; // Start of use strict


  // Global Vars

  window.root = '/oasiscall';
  window.meetingID = Date.now();
  window.userCompatible = true;
  checkBrowser();

  // Preloader

  $(window).on('load', function () {
    setTimeout((function() {
      $('#loader').animate({ "opacity": "0" }, 1000, function(){
        $('#loader').remove();
      });
    }), 1000);
  });
  
  function checkBrowser(){
    if (BrowserDetect.browser === 'Safari' && BrowserDetect.version < 13){
      nonCompatible();
      window.userCompatible = false;
    }
    else if (BrowserDetect.browser === 'Chrome' && BrowserDetect.version < 82){
      nonCompatible();
      window.userCompatible = false;
    }
    else if (BrowserDetect.browser === 'Safari' && BrowserDetect.version < 78){
      nonCompatible();
      window.userCompatible = false;
    }
    else if (BrowserDetect.browser === 'Explorer'){
      nonCompatible();
      window.userCompatible = false;
    }
  }
  function nonCompatible(){
    $('#non-compatible').removeClass('d-none');
    $('#submit-call').text('Quiero que me llamen');
  }

  // Navigation

  var navigation = new Swiper('#navigation', {
    speed: 1000,
    direction: 'vertical',
    mousewheel: true,
    forceToAxis: true,
    hashNavigation:true
  });

  navigation.on('slideChangeTransitionStart', function () {
    invertNavbar();
  });

  function invertNavbar(){
    if ($('.swiper-slide-active').hasClass('invert-menu')){
      $('nav').addClass('inverted');
    }
    else{
        $('nav').removeClass('inverted');
    }
  }

  //Team

  var team = new Swiper('#team .swiper-container', {
    speed: 1000,
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 0,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 0,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 0,
      },
    }
  });

  $('#navbar-toggler').click(function() {
    $('#navbar').toggleClass('open');
    $('.mobile-navbar').toggleClass('show');
  });

  $('.slide-to').on( "click", function(event){
    event.preventDefault();
    navigation.slideTo($(this).attr('data-slide'));
    $('.mobile-navbar').removeClass('show');
    $('#navbar').removeClass('open');
  });


  // MailChimp Form

  $('#call-form').MailChimpForm({
    url: 'https://oasis-calls.us10.list-manage.com/subscribe/post?u=c2721d71977933bb468bd91de&amp;id=0289645fb6',
    fields: '0:EMAIL,1:CONTACT,2:FULLNAME,3:PHONE,4:MEETINGID',
    submitSelector: '#submit-call',
    customMessages: {
      E001: 'Completá tu nombre',
      E003: 'Ingresá un email válido',
    },
    onOk: (message) => {
      window.location.href = window.root + '/call/#'+meetingID;
    }
  });
  
  $('#call-form input[name="EMAIL"]').val(meetingID + "@oasiscalls.com");
  if (window.userCompatible){
    $('#call-form input[name="MEETINGID"]').val("https://meet.jit.si/oasiscall" + meetingID);
  }
  else{
    $('#call-form input[name="MEETINGID"]').val("Llamar por teléfono");
  }


})(jQuery); // End of use strict
