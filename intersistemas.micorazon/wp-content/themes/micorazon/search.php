<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package micorazon
 */

get_header(); ?>
<div class="content">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-search-title"><?php printf( __( 'Resultados de: %s', 'micorazon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php wp_pagenavi(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

</div><!-- content -->
</div><!--main-->
<?php get_sidebar(); ?>
 <div class="clear"></div>
</div><!--page-->
<?php get_footer(); ?>
