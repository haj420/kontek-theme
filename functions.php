<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */

/*
 * Your code goes below.
 */
//Code to include parent stylesheet
/*
This no longer works after moving to Godaddy
function kontek_style() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
*/
add_action( 'wp_enqueue_scripts', function() {


	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// First de-register the main child theme stylesheet
//	wp_deregister_style('child-style' );

	// Then add it again, using filemtime for the version number so everytime the child theme changes so will the version number
	//wp_register_style( 'child-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );

	// Finally enqueue it again
//	wp_enqueue_style( 'child-style' );

	// Enqueue custom JavaScript
// 	wp_enqueue_script( 'script', 'https://www.kontekwater.com/parts/wp-content/themes/kontek/custom.js', array ( 'jquery' ), filemtime( get_stylesheet_directory(). '/custom.js' ), true);
// 	function theme_js() {
//     wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/custom.js', array( 'jquery' ), '1.1', true );
// }

add_action('wp_enqueue_scripts', 'theme_js');

} );
//theme_directory_uri localized theme url for js scripts
// function theme_directory_uri(){
// wp_localize_script( 'ajax-login-script', 'uri_object', array(
//     'theme_directory_uri' => get_template_directory_uri()
// ));
// }
// add_action('init', 'theme_directory_uri');
//THE BELOW CODE WILL RETRIEVE THE URL IN JAVASCRIPT
//var theme_uri = uri_object.theme_directory_uri;
?>
