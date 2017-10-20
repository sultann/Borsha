<?php
/* ==========================================================================
 *  Theme settings
 * ========================================================================== */
function basic_setup() {

	if ( ! isset( $content_width ) ) {
		$content_width = 725;
	}

//	load_theme_borsha( 'borsha', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );

	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	register_nav_menus( array(
		'top'    => __( 'Main Menu', 'basic' ),
		'bottom' => __( 'Footer Menu', 'basic' )
	) );

}

add_action( 'after_setup_theme', 'basic_setup' );

/* ==========================================================================
*  Load scripts and styles
* ========================================================================== */
function load_theme_assets() {
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), true );

	wp_enqueue_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), true, true );


	wp_enqueue_style( 'borsha-style', get_stylesheet_uri(), array(), true );

	wp_enqueue_script( 'borsha-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), true, true );

}

add_action( 'wp_enqueue_scripts', 'load_theme_assets' );

function borsha_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'basic' ),
		'id'   => 'blog-sidebar',
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

/*

function add_borsha_event() {
	register_post_type( 'borhsa_event',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'event'),
		)
	);
}
add_action( 'init', 'add_borsha_event' );



function borsha_add_meta_boxes(){

	add_meta_box('borsha_event_details', __('Event Details', 'borsha'), 'borsha_event_details_callback', 'borhsa_event');

}
add_action('add_meta_boxes', 'borsha_add_meta_boxes');

function borsha_event_details_callback($post){
	$event_name = get_post_meta($post->ID, '_borhsa_event_location', true);
	$event_start = get_post_meta($post->ID, '_borhsa_event_start', true);
	$event_end = get_post_meta($post->ID, '_borhsa_event_end', true);



	?>
	<style>
		.borsha-inputs{
			display: block;
			width: 50%;
			clear: both;
			margin-bottom: 10px;
		}
	</style>

	<label for="">Location Name</label>
	<input type="text" class="borsha-inputs" name="_borhsa_event_location" value="<?php echo $event_name; ?>">
	<label for="">Event Start Date</label>
	<input type="date" class="borsha-inputs" name="_borhsa_event_start" value="<?php echo $event_start; ?>">
	<label for="">Event Start end</label>
	<input type="date" class="borsha-inputs" name="_borhsa_event_end" value="<?php echo $event_end; ?>">
	<?php
}

function borsha_save_event_details($post_id){
	$post_type = get_post_type($post_id);

	if( $post_type == 'borhsa_event' ){
		if( isset($_POST['_borhsa_event_location'])){
			update_post_meta($post_id, '_borhsa_event_location', trim($_POST['_borhsa_event_location']));
		}

		if( isset($_POST['_borhsa_event_start'])){
			update_post_meta($post_id, '_borhsa_event_start', trim($_POST['_borhsa_event_start']));
		}

		if( isset($_POST['_borhsa_event_end'])){
			update_post_meta($post_id, '_borhsa_event_end', trim($_POST['_borhsa_event_end']));
		}
	}
}
add_action('save_post', 'borsha_save_event_details');
*/

/**
 * Register our metaboxes
 */

function borhsa_add_meta_boxes() {
	add_meta_box( 'brosha_event_details', 'Event Details', 'brosha_event_details_callback', 'post' );
}

add_action( 'add_meta_boxes', 'borhsa_add_meta_boxes' );

function brosha_event_details_callback( $post ) {
	?>

    <label for="">Location Name</label>
    <input type="text" class="borsha-inputs" name="_borhsa_event_location"
           value="<?php echo get_post_meta( $post->ID, '_borhsa_event_location', true ); ?>">

	<?php
}

/**
 * Save our metabox value
 */
function borhsa_save_event_details( $post_id ) {

	if ( get_post_type( $post_id ) == 'post' ) {

		if ( isset( $_POST['_borhsa_event_location'] ) ) {
			update_post_meta( $post_id, '_borhsa_event_location', trim( $_POST['_borhsa_event_location'] ) );
		}

	}

}

add_action( 'save_post', 'borhsa_save_event_details' );


function borsha_register_cp() {

	$labels = array(
		'name'               => _x( 'Restaurants', 'post type general name', 'borhsa' ),
		'singular_name'      => _x( 'Restaurant', 'post type singular name', 'borhsa' ),
		'menu_name'          => _x( 'Restaurants', 'admin menu', 'borhsa' ),
		'name_admin_bar'     => _x( 'Restaurant', 'add new on admin bar', 'borhsa' ),
		'add_new'            => _x( 'Add New', 'book', 'borhsa' ),
		'add_new_item'       => __( 'Add New Restaurant', 'borhsa' ),
		'new_item'           => __( 'New Restaurant', 'borhsa' ),
		'edit_item'          => __( 'Edit Restaurant', 'borhsa' ),
		'view_item'          => __( 'View Restaurant', 'borhsa' ),
		'all_items'          => __( 'All Restaurants', 'borhsa' ),
		'search_items'       => __( 'Search Restaurants', 'borhsa' ),
		'parent_item_colon'  => __( 'Parent Restaurants:', 'borhsa' ),
		'not_found'          => __( 'No Restaurants found.', 'borhsa' ),
		'not_found_in_trash' => __( 'No Restaurants found in Trash.', 'borhsa' )
	);


	$args = array(
		'public'             => true,
		'labels'             => $labels,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'custom-fields' )
	);
	register_post_type( 'restaurant', $args );

}

add_action( 'init', 'borsha_register_cp' );

function borsha_restaurant_type_taxonomy(){

	$labels = array(
		'name'                       => _x( 'Restaurant Types', 'taxonomy general name', 'borsha' ),
		'singular_name'              => _x( 'Restaurant Type', 'taxonomy singular name', 'borsha' ),
		'search_items'               => __( 'Search Restaurant Types', 'borsha' ),
		'popular_items'              => __( 'Popular Restaurant Types', 'borsha' ),
		'all_items'                  => __( 'All Restaurant Types', 'borsha' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Restaurant Type', 'borsha' ),
		'update_item'                => __( 'Update Restaurant Type', 'borsha' ),
		'add_new_item'               => __( 'Add New Restaurant Type', 'borsha' ),
		'new_item_name'              => __( 'New Restaurant Type Name', 'borsha' ),
		'separate_items_with_commas' => __( 'Separate restaurants with commas', 'borsha' ),
		'add_or_remove_items'        => __( 'Add or remove restaurants', 'borsha' ),
		'choose_from_most_used'      => __( 'Choose from the most used restaurants', 'borsha' ),
		'not_found'                  => __( 'No restaurant found.', 'borsha' ),
		'menu_name'                  => __( 'Restaurant Types', 'borsha' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
	);


	register_taxonomy( 'restaurant_type', array('restaurant'), $args );
}
add_action('init', 'borsha_restaurant_type_taxonomy');

//add shortcodes
require "inc/shortcodes.php";