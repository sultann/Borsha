<?php
get_header();
?>
	<div class="container">
		<div id="main" class="content-area maxwidth clearfix row">

			<main id="content" class="site-main content col-md-8" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<!-- //loop -->

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<h2 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>

						<?php the_content(); ?>
					</div>

				<?php endwhile; ?>

			</main>

			<?php get_sidebar();?>
		</div>
	</div>
<?php
get_footer();