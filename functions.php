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
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), true );

	wp_enqueue_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), true, true );


	wp_enqueue_style( 'borsha-style', get_stylesheet_uri(), array(), true );

	wp_enqueue_script( 'borsha-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), true, true );

}
add_action('wp_enqueue_scripts', 'load_theme_assets');

function borsha_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'basic' ),
		'id'            => 'blog-sidebar',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'basic' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'basic' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<p class="wtitle">',
		'after_title'   => '</p>',
	) );

}


add_action( 'widgets_init', 'borsha_widgets_init' );


/**Include files **/
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

