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

<div id="home-slider" class="swiper-container">
  <div class="swiper-wrapper">
    <!-- The Loop -->
    <?php while ( have_posts() ) : the_post(); ?>
      <h1><?php echo get_post_meta(get_the_ID(),'studio_short_description_text',true); ?></h1>
      <?php show_images_on_swiper('tremendo_admin_file_list', 'full'); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- Add Pagination -->
  <div class="swiper-pagination"></div>
  <!-- Add Arrows -->
  <div class="swiper-button-next swiper-button-white"></div>
  <div class="swiper-button-prev swiper-button-white"></div>
</div>
<script>
  (function($) {
    "use strict"; // Start of use strict
    
    // Home Slider
    var homeSLider = new Swiper('#home-slider', {
      speed: 1000,
      effect: 'fade',
      loop: true,
      direction: 'vertical',
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
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
</script>

<?php
get_footer();
