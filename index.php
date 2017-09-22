<?php
get_header();
?>

<div id="main" class="content-area maxwidth clearfix">

    <main id="content" class="site-main content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
                <!-- //loop -->

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

					<?php the_content(); ?>
                </div>

			<?php endwhile; ?>

		<?php else: ?>
			<?php _e( 'No content found', 'borsha' ); ?>
		<?php endif; ?>

    </main>

    <?php get_sidebar();?>
</div>
<?php
get_footer();