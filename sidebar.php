<aside id="secondary" class="widget-area col-md-4" role="complementary">

	<?php
	if( is_active_sidebar('blog-sidebar') ){
		dynamic_sidebar( 'blog-sidebar' );
	}

	?>
	<?php //dynamic_sidebar( 'page-sidebar' ); ?>

</aside><!-- #secondary -->