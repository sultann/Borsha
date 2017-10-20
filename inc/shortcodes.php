<?php
add_shortcode( 'hi_user', 'borsha_hi_user_callback' );

function borsha_hi_user_callback() {
	if ( is_user_logged_in() ) {
		$user = get_user_by( 'id', get_current_user_id() );

		return 'Hi, ' . $user->display_name;
	}
}

add_shortcode( 'custom_heading', 'borhsa_user_heading_callback' );

function borhsa_user_heading_callback( $attr, $content = null ) {

	$default = array(
		'tag' => 'h1',
		'color' => 'green',
		'align' => 'left',
	);

	$a = wp_parse_args(
		$attr,
		$default
	);
	$style = '';

	if( isset($a['color']) && !empty($a['color']) ){
		$style .= "color:{$a['color']};";
	}

	if( isset($a['align']) && !empty($a['align']) ){
		$style .= "text-align:{$a['align']};";
	}


	return "<h2 style='{$style}'>{$content}</h2>";
}


//** Google Map  **//
function borsha_google_map($attr){
	$att = wp_parse_args($attr, array(
		'lat' => '23.746466',
		'lon' => '90.376015',
	));
	ob_start();
	?>
	<iframe
		width="600"
		height="300"
		frameborder="0"
		scrolling="no"
		marginheight="0"
		marginwidth="0"
		src="https://maps.google.com/maps?q=<?php echo $att['lat'];?>,<?php echo $att['lon'];?>&hl=es;z=14&amp;output=embed"
	>
	</iframe>
	<?php
	$output = ob_get_contents();
	ob_get_clean();
	return $output;

}
add_shortcode('borhsa_map', 'borsha_google_map');


function featured_box_callback($attr, $content = null ){
	//icon
	//title
	//desc

	$att = wp_parse_args( $attr, array(
		'icon' => 'fa-code',
		'title' => 'Write your title here',
		'border' => 'yes',
	));

	ob_start();
	?>

	<div class="featured-box <?php echo $att['border'] =='yes' ? 'border': '' ; ?>">
		<div class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
			<i class="hi-icon fa <?php echo $att['icon']; ?>"></i>
		</div>
		<h3 class="text-xs-center featured-box__title"><?php echo $att['title']; ?></h3>
		<p class="text-xs-center"><?php echo $att['desc']; ?></p>
	</div>

	<?php
	$output = ob_get_contents();
	return $output;

}
add_shortcode('featured_box', 'featured_box_callback');