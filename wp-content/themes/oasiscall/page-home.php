<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying the Home Page.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<section class="h-100 d-flex align-items-center">
  <div id="navigation" class="swiper-container d-flex align-items-center">
    <div class="swiper-wrapper">

      <!-- Header -->

      <div id="home" class="swiper-slide bg-gradient">
        <div class="inner">
          <a href="<?php echo site_url().'/zoom-meetings/test-meeting/'?>" class="btn-call rounded-circle"></a>
          <div class="circle rounded-circle"></div>
          <div class="circle rounded-circle"></div>
          <div class="circle rounded-circle"></div>
          <div class="circle rounded-circle"></div>
        </div>
        <div class="position-absolute text-center w-100 intro-text">
          <div class="col-8 mx-auto">
            <h5>Tocá el botón para hablar con alguien</h5>
          </div>
        </div>
        <div class="position-absolute w-100 actions d-flex justify-content-center">
          <button class="slide-to btn rounded-pill btn-light text-secondary text-uppercase mx-1" data-slide="1">Ver Coachs</button>
          <button class="slide-to btn rounded-pill btn-light text-secondary text-uppercase mx-1" data-slide="2">Saber Más</button>
        </div>
      </div>

      <!-- Team -->

      <div id="team" class="swiper-slide bg-light d-flex align-items-center invert-menu">
        <div class="container justify-content-between d-flex flex-column">
          <div class="row">
            <div class="col-10 col-lg-12 mx-auto text-center">
              <h2 class="section-heading text-uppercase">Personas que pueden ayudarte</h2>
              <p class="large text-muted pb-md-4 d-none d-md-block">Especialistas en resolución rápida de conflictos</p>
            </div>
          </div>
          <div class="row">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <?php get_template_part( 'template-parts/content', 'users' ); ?>
              </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
      </div>

      <div id="download" class="swiper-slide download bg-gradient text-center d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-8 col-md-10 mx-auto">
              <h2 class="section-heading text-light">Probá tambien nuestra app de meditación</h2>
              <p class="text-light">Disponible para descargar desde Google Play y App Store</p>
              <div class="badges">
                <a class="badge-link" href="https://play.google.com/store/apps/details?id=meditAr.argentinAr.app" target="_blank"><img src="img/google-play-badge.svg" alt=""></a>
                <a class="badge-link" href="https://apps.apple.com/us/app/meditar-app/id1501894220?l=es&ls=1" target="_blank"><img src="img/app-store-badge.svg" alt=""></a>
              </div>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col-12 text-center text-light">
              <span class="copyright">Copyright &copy; Oasis Call 2020</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  (function($) {
    "use strict"; // Start of use strict
    
    // Navigation

    if ($('body').hasClass('home')){

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
    }
  })(jQuery); // End of use strict
</script>
