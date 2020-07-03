<?php

function theme_enqueue_styles() {

  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css' );
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_scripts() {
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/vendor/swiper.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts');

/* Bootstrap Menu */

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

/* Custom Post Types */

add_action( 'init', 'register_cpts' );

// Register CPTs
function register_cpts() {

  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Calls' ),
    'singular_name'      => __( 'Call' ),
    'add_new'            => __( 'Add New Call' ),
    'add_new_item'       => __( 'Add New Call' ),
    'edit_item'          => __( 'Edit Call' ),
    'new_item'           => __( 'New Call' ),
    'all_items'          => __( 'All Call' ),
    'view_item'          => __( 'View Call' ),
    'search_items'       => __( 'Search Call' ),
    'featured_image'     => 'Poster',
    'set_featured_image' => 'Add Poster'
  );

  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Holds our Call post specific data',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor'),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'query_var'         => true
  );

  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // Parameter 2 is the $args array
  register_post_type('call', $args);
}

/* Custom Metaboxes */

function coach_metaboxes(){

	/* Initiate the metabox */
	$cmb = new_cmb2_box( array(
		'id'            => 'coach_custom_metabox',
		'title'         => __( 'Más Información', 'cmb2' ),
		'object_types'  => array('user'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
  ) );
  $cmb->add_field( array(
		'name' => esc_html__( 'Foto de perfil', 'cmb2' ),
		'desc' => esc_html__( 'Subí una foto de perfil', 'cmb2' ),
		'id'   => 'user_profile_pic',
		'type' => 'file',
	) );
}
add_action('cmb2_admin_init', 'coach_metaboxes');

/* display images */

function show_images_on_swiper($file_list_meta_key, $img_size = 'medium'){
	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1);
	$images = '';
	// Loop through them and output an image
	foreach ((array) $files as $attachment_id => $attachment_url){
		$images .= '<div class="swiper-slide" style="background-image:url(';
		$images .= wp_get_attachment_image_url( $attachment_id, $img_size, false);
		$images .= ')"></div>';
	}
	echo $images ? $images : '';
}

function show_studio_cover($file_list_meta_key, $img_size = 'medium'){
	// Get the list of files
	$first = true;
	$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1);
	foreach ((array) $files as $attachment_id => $attachment_url){
		if ($first){
			$image = wp_get_attachment_image_url( $attachment_id, $img_size, false);
      $first = false;
		}
	}
	echo $image ? $image : '';
}

/* Create meetings with Frontend Form */

function meeting_metaboxes(){

	/* Initiate the metabox */
	$cmb = new_cmb2_box( array(
		'id'            => 'metting_customer_fullname',
		'title'         => __( 'Nombre completo', 'cmb2' ),
		'object_types'  => array('Zoom Meeting'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
  ) );
  $cmb = new_cmb2_box( array(
		'id'            => 'metting_customer_email',
		'title'         => __( 'Email', 'cmb2' ),
		'object_types'  => array('Zoom Meeting'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
  ) );
}
add_action('cmb2_admin_init', 'meeting_metaboxes');

function wds_frontend_form_register() {
    $cmb = new_cmb2_box( array(
        'id'           => 'front-end-post-form',
        'object_types' => array('meeting'),
        'hookup'       => false,
        'save_fields'  => false,
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Meeting Title', 'wds-post-submit' ),
        'id'      => 'submitted_post_title',
        'type'    => 'text',
        'default' => __( 'New Post', 'wds-post-submit' ),
    ) );

    $cmb->add_field( array(
        'name' => __( 'Nombre', 'wds-post-submit' ),
        'desc' => __( 'Ingresa tu nombre completo', 'wds-post-submit' ),
        'id'   => 'metting_customer_fullname',
        'type' => 'text',
    ) );

    $cmb->add_field( array(
        'name' => __( 'Email', 'wds-post-submit' ),
        'desc' => __( 'Ingresa tu Email', 'wds-post-submit' ),
        'id'   => 'metting_customer_email',
        'type' => 'text_email',
    ) );

}
add_action( 'cmb2_init', 'wds_frontend_form_register' );