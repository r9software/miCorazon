<?php
/*
 * @package micorazon
  Template Name: Actividad
 */
?>
<?php get_header(); ?>
<div class="content">
	<div <?php post_class('post'); ?>>
		<h1><?php	the_title();?></h1>
		<p><?php  echo $post->post_content; ?></p>
	</div>
</div>
</div><!--main-->
<?php get_sidebar(); ?>
 <div class="clear"></div>
</div><!--page-->
<?php get_footer(); ?>