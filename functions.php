<?php
function fish_market_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // wp_enqueue_style( 'fish_market-google-fonts', 'https://fonts.googleapis.com/css?family=Abril+Fatface', false );

}
add_action( 'wp_enqueue_scripts', 'fish_market_enqueue_styles' );


add_action( 'wp_enqueue_scripts', 'fish_market_scripts' );

function fish_market_scripts() {
  wp_enqueue_script( 'fish_market-script', get_stylesheet_directory_uri() . '/fish-market-scripts.js', array( 'jquery' )
  );
}


/**
* Add SVG Support
*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/**
* Page Slug Body Class
*/
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );
