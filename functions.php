<?php
function my_enqueue_scripts() {
	$_my_theme = wp_get_theme();
  // Enqueue parent theme stylesheet
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// Enqueue stylesheet
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/child-style.css', array(), WP_ENV == 'production' ? $_my_theme->get('Version') : date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/child-style.css' )));

	// Enqueue JavaScript
	wp_enqueue_script( 'custom-javascript', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), WP_ENV == 'production' ? $_my_theme->get('Version') : date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/custom.js')), true );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );
?>
