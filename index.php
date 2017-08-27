<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borsha</title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

 
	<div id="page" class="hfeed site">
	    <header></header>

	    <div id="primary" class="content-area">
	        <main id="main" class="site-main" role="main">

	        	<?php if ( have_posts() ) : ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
					<!-- //loop -->

						<div id="post-<?php the_ID();?>"  <?php post_class(); ?>>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_content(); ?>
						</div>
				
					<?php endwhile; ?>	

	        	<?php else: ?>
	        		<?php _e('No content found', 'borsha'); ?>
	        	<?php endif; ?>	



	        </main>
	        <aside></aside>
	    </div>

	    <footer></footer>

	</div>



    <?php wp_footer(); ?>
</body>


</html> 