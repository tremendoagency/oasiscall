<?php
/**
 * Template Name: Studio Archive
 *
 * Template for displaying Studio CPT archive.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div id="swiper" class="swiper-container">
  <div class="swiper-wrapper">
    <!-- The Loop -->
    <?php $loop = new WP_Query( array( 'post_type' => 'studio' ) ); ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <div class="swiper-slide">
        <h1><?php the_title() ?></h1>
      </div>
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
    var homeSLider = new Swiper('#swiper', {
      speed: 1000,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
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
