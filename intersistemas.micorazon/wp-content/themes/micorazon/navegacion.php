<?php
/**
 * @package micorazon
 */
?>
<div class="aside-nav">
	<div id="cssmenu" <?php post_class(); ?>>
		<?php
		$catid = 2;
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
