<?php
/**
 * Template Name: Users
 *
 * Template for displaying Users.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$args = array(
  'role' => 'Author'
);
 
// Custom query.
$my_user_query = new WP_User_Query( $args );
 
// Get query results.
$coachs = $my_user_query->get_results();
 
// Check for editors
if (!empty($coachs)){
  // Loop over editors.
  foreach ( $coachs as $coach ) {
    // Get each editor's data.
    $coach_info = get_userdata($coach->ID);
    // Show coach's slide.
    echo '<div class="swiper-slide">
      <div class="team-member">
        <a href="' . site_url() . '/author/'. $coach_info->user_nicename .'"><img class="mx-auto rounded-circle" src="'. $coach_info->user_profile_pic .'" alt=""></a>
        <h4>'. $coach_info->display_name .'</h4>
        <a class="btn btn-secondary rounded-pill" href="' . site_url() . '/author/'. $coach_info->user_nicename .'">Ver Perfil</a>
      </div>
    </div>';
  }
}
else {
  // Display "no editors found" message.
  echo __( 'No editors found!', 'tutsplus' );
}
 
?>