<?php
/* ==========================================================================
 *  Theme settings
 * ========================================================================== */
 function basic_setup(){

		if ( ! isset( $content_width ) ) {
			$content_width = 725;
		}

		load_theme_textdomain( 'borsha', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );	

		register_nav_menus( array(
			'top'    => __( 'Main Menu', 'basic' ),
			'bottom' => __( 'Footer Menu', 'basic' )
		) );	

 }
 add_action('after_setup_theme', 'basic_setup');

 /* ==========================================================================
 *  Load scripts and styles
 * ========================================================================== */
function load_theme_assets(){
	
	wp_enqueue_style( 'borsha-style', get_stylesheet_uri(), array(), true );

	wp_enqueue_script( 'borsha-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), true, true );

}
add_action('wp_enqueue_scripts', 'load_theme_assets');

