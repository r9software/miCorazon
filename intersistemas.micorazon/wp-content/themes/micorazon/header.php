<?php
/**
 * The Header for our theme.
 *
 * @package micorazon
 */
?>
<?php require 'heads-site.php'; ?>
<div class="content-all">
	<?php 
	if(in_category(2)){ 
		echo'<div class="bg_preparate"></div>';
	}
	elseif (in_category(3) ) {
		echo'<div class="bg_marcha"></div>';
	}
	elseif (in_category(4) ) {
		echo'<div class="bg_conoce"></div>';
	}
	else{
		echo'<div class="bg_perfil"></div>';
	}
	?>
	<div class="header">
		<div class="wrap">
			<div class="logo3">
				<div class="logo-home">
					<a href="/home-page/"></a>
				</div>
			</div>
			<div class="logo4"></div>
		</div>
	</div>
	<div class="page">
		<?php
		if ( in_category( 2 ) ) {
			echo '<div class="slogan"><h2 class="tpreparate"><span>Haz pequeños cambios </span> que impacten tu bienestar.</h2>';
		} 
		elseif (  in_category(3) ) {
			echo '<div class="slogan"><h2 class="tponte"><span>Pon a latir</span>a tu corazón.</h2>';
		}
		else {
			echo '<div class="slogan"><h2 class="tconoce"><span>Comienza hoy</span> a vivir mejor.</h2>';
		}
		?>
		<form role="search" method="get" id="searchform" action="/">
    <div class="search">
        <input type="text" name="s" placeholder="Buscar" value="" id="s" autocomplete="off" class="search-field">
        <input type="submit" value="" name="Search" class="mag-glass" id="searchsubmit">
    </div>
</form>
	</div>
	<div class="main">
		<div class="main-navigation">
			<div class="preparate <?php if(  in_category(2) && !is_search()){ echo'on';}?>">
				<a href="<?php echo get_permalink( 216 ) ?>"><?php echo get_cat_name( 2 ); ?></a>
			</div>
			<div class="ponte <?php if(  in_category(3) && !is_search()){ echo'on';}?>">
				<a href="<?php  echo get_permalink( 113 ) ?>"><?php echo get_cat_name( 3 ); ?></a>
			</div>
			<div class="conoce <?php if(  in_category(4) && !is_search()){ echo'on';}?> last">
				<a href="<?php  echo get_permalink( 262 ) ?>"><?php echo get_cat_name( 4 ); ?></a>
			</div>
		</div>
		<div class="content-mobile">
				<div class="nav-mob">
					<div id="tabso">
  <ul>
    <li><a href="#tabso-1" id="tabso1"><?php echo get_cat_name( 2 ); ?></a></li>
    <li><a href="#tabso-2" id="tabso2"><?php echo get_cat_name( 3 ); ?></a></li>
    <li><a href="#tabso-3" id="tabso3"><?php echo get_cat_name( 4 ); ?></a></li>
  </ul>

				<div class="nav-azul" id="tabso-1" >
<div id="cssmenu2">
					<?php
		$catid = 2;
		$category = get_the_category( 2 );

		$categories = get_categories( 'child_of=' . intval( $catid ) );
		echo '<ul class="nav-papa" id="nav-papa1">';
		foreach ( $categories as $category ) {
			//# check if it is a real parent category with subcategories
			if ( $category->parent == $catid ):

				echo '<li><a class="'.'navi-'.$category->slug.'"><span>' . $category->cat_name . '</span></a>';
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
						<li class="<?php $uno = str_replace(home_url(), '', get_permalink()); $uno = str_replace('/','',$uno); echo "navi-".$uno; ?>" ><a href="<?php echo get_permalink(); ?>" <?php if ( $post->ID == $wp_query->post->ID ) {
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
				<div class="nav-verde" id="tabso-2">
					<div id="cssmenu3">
						<?php
		$catid = 3;
		$category = get_the_category( 3 );

		$categories = get_categories( 'child_of=' . intval( $catid ) );
		echo '<ul class="nav-papa">';
		foreach ( $categories as $category ) {
			//# check if it is a real parent category with subcategories
			if ( $category->parent == $catid ):
				echo '<li><a  class="'.'navi-'.$category->slug.'"><span>' . $category->cat_name . '</span></a>';
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
						<li class="<?php $uno = str_replace(home_url(), '', get_permalink()); $uno = str_replace('/','',$uno); echo "navi-".$uno; ?>" ><a href="<?php echo get_permalink(); ?>" <?php if ( $post->ID == $wp_query->post->ID ) {
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
				<div class="nav-naranja" id="tabso-3">
					<div id="cssmenu4">
					<?php
		$catid = 4;
		$category = get_the_category( 4 );

		$categories = get_categories( 'child_of=' . intval( $catid ) );
		echo '<ul class="nav-papa">';
		foreach ( $categories as $category ) {
			//# check if it is a real parent category with subcategories
			if ( $category->parent == $catid ):
				echo '<li><a  class="'.'navi-'.$category->slug.'"><span>' . $category->cat_name . '</span></a>';
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
						<li class="<?php $uno = str_replace(home_url(), '', get_permalink()); $uno = str_replace('/','',$uno); echo "navi-".$uno; ?>" ><a href="<?php echo get_permalink(); ?>" <?php if ( $post->ID == $wp_query->post->ID ) {
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
		</div>
		</div>
		</div>