<?php
/**
 * The Template for displaying all single posts.
 *
 * @package micorazon
 */
get_header();
?>
<div class="content">


	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- content -->
</div><!--main-->
<?php get_sidebar(); ?>
 <div class="clear"></div>
</div><!--page-->
<?php get_footer(); ?>