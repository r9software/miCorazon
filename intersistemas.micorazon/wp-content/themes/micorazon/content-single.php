<?php
/**
 * @package micorazon
 */
?>
<?php require'navegacion.php'; ?>
<div class="information-int" >
	<div  <?php post_class( 'post' ); ?>>
		<h1><?php the_title(); ?></h1>
		<!--<?php if ( have_comments() ) : ?>
		<div class="options">
			<?php $commentarios = get_comments(array(
					'post_id' => $post->ID));
						$cuenta= count( $commentarios);
					?>
						 <?php echo $cuenta." Comentarios"; ?>
			<?php //comments_number('', '1 Comentario', '% Comentarios' ); ?></div>
		<?php endif ?>-->
		<?php the_post_thumbnail( 'post' ); ?>
		<?php the_content(); ?>
		<?php
    $defaults = array(
       'before'           => '<p>' . __( 'Página:' ),
       'after'            => '</p>'
   );
?>
		<?php wp_link_pages($defaults); ?>
	</div>
	
	<!--
	<div class="comments-num"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?><?php $commentarios = get_comments(array(
					'post_id' => $post->ID));
						$cuenta= count( $commentarios);
					?>
						 <?php echo $cuenta." Comentarios"; ?></div>
						-->
	
	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
		?>
</div>
