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
<div id="studios-slider" class="swiper-container">
  <div class="swiper-wrapper">
    <!-- The Loop -->
    <?php $loop = new WP_Query( array( 'post_type' => 'studio' ) ); ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <div class="swiper-slide">
        <div class="swiper-slide-bg" style="background-image: url('<?php show_studio_cover('studio_file_list', 'full'); ?>')"></div>
        <div class="container h-100 d-flex justify-content-center align-items-center rl">
          <div class="col-7 swiper-slide-image" style="background-image: url('<?php show_studio_cover('studio_file_list', 'full'); ?>')"></div>
          <div class="col-10 swiper-slide-text">
            <div class="row">
              <h6><?php echo get_post_meta(get_the_ID(),'studio_description_text',true); ?></h6>
            </div>
            <div class="row">
              <h1 class="text-uppercase"><?php the_title() ?></h1>
            </div>
            <div class="row">
              <a href="<?php echo get_permalink(); ?>" class="viewmore text-uppercase">View More</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- Add Pagination -->
  <!-- Add Arrows -->
  <div class="swiper-button-next swiper-button-white"></div>
  <div class="swiper-button-prev swiper-button-white"></div>
</div>
<script>
  (function($) {
    "use strict"; // Start of use strict
    
    // Home Slider
    var homeSLider = new Swiper('#studios-slider', {
      speed: 1000,
      loop: true,
      grabCursor: true,
      mousewheel: true,
      pagination: {
        el: '.swiper-pagination',
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
