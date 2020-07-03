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
          <?php echo do_shortcode('[bf form_slug="comenzar-una-llamada"]'); ?>
        </div>
      </div>

    </div>
  </div>
</section>
