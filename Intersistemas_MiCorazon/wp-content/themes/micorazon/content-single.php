<?php
/**
 * @package micorazon
 */
?>
<div class="aside-nav">
	<div id="cssmenu" <?php post_class(); ?>>
		<?php
		$category = get_the_category( get_the_ID() );

		$catid = $category[0]->category_parent;
		if ( $catid == 0 ) {
			$catid = $category[0]->cat_ID;
		}
		$categories = get_categories( 'child_of=' . intval( $catid ) );
		echo '<ul>';
		foreach ( $categories as $category ) {
			//# check if it is a real parent category with subcategories
			if ( $category->parent == $catid ):
				echo '<li><a><span>' . $category->cat_name . '</span></a>';
				?>
				<?php
				$args = array( 'cat' => $category->cat_ID, 'posts_per_page'=> -1,  'post_type' => array( 'post', 'recetas','actividad','comunidad' ));
				$lastposts = get_posts( $args );
				$vacua = '';
				foreach ( $lastposts as $post ) : setup_postdata( $post );
					?>
						<?php if ( $post->ID == $wp_query->post->ID ) {
							$vacua = 'abierto';
						} else {
							
						} ?>
					<?php endforeach; ?>
				<ul class="<?php echo $vacua; ?>">
				<?php
				$args = array( 'cat' => $category->cat_ID, 'posts_per_page'=> -1, 'post_type' => array( 'post',  'recetas','actividad','comunidad' ));
				$lastposts = get_posts( $args );
				foreach ( $lastposts as $post ) : setup_postdata( $post );
					?>
						<li ><a href="<?php echo get_permalink(); ?>" <?php if ( $post->ID == $wp_query->post->ID ) {
				echo 'class="active"';
			} else {
				
			} ?>><span><?php the_title(); ?></span></a></li>
		<?php endforeach; ?>
		<?php wp_reset_query(); ?>
				</ul>
				<?php echo '</li>'; ?>
			<?php endif; ?>
	<?php
}
echo '</ul>';
?>
	</div>
</div>
<div class="information-int" >
	<div  <?php post_class( 'post' ); ?>>
		<h1><?php the_title(); ?></h1>
		<?php if ( have_comments() ) : ?>
		<div class="options"><?php comments_number('', '1 Comentario', '% Comentarios' ); ?></div>
		<?php endif ?>
		<?php the_post_thumbnail( 'post' ); ?>
		<?php the_content(); ?>
	</div>
	
	<div class="comments-num"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?><?php comments_number('', '1 Comentario', '% Comentarios' ); ?></div>
	
	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
		?>
</div>
