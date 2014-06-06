<?php
/*
 * @package micorazon
  Template Name: Home Page
 */


if ( !is_user_logged_in() ) {
	header( "Location: " . site_url() . "/login" );
}
?>
<?php get_header(); ?>
<div class="content">
	<div class="aside-home">
		<div class="module1">
			<?php
			/* PREPARATE POSTS RANDOM */
			$prep = array(
				'post_type' => 'post',
				'category__in' => 2,
				'posts_per_page' => 4,
				'orderby' => 'rand',
				'post__not_in' => array( 50, 30, 14,216,225,60 ),
			);

			$my_query = null;
			$my_query = new WP_Query( $prep );
			if ( $my_query->have_posts() ) {
				while ( $my_query->have_posts() ) : $my_query->the_post();
					?>
					<div class="highlights-home">
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</div>
					<?php
				endwhile;
			}
			?>
			<?php wp_reset_query(); ?>
		</div>
		<div class="actividades">
			
			<?php
			/* HOME SLIDER */
			$actividad = array(
				'post_type' => 'actividad',
				'posts_per_page' => 1,
				'orderby' => 'rand'
			);
			$my_query = null;
			$my_query = new WP_Query( $actividad );
			if ( $my_query->have_posts() ) {
				while ( $my_query->have_posts() ) : $my_query->the_post();
					?>
			<div class="more"><a href="<?php the_permalink(); ?>"></a></div>
			<h3 class="tactividades"><?php
		$obj = get_post_type_object( 'actividad' );
		echo $obj->labels->singular_name;
		?></h3>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<?php echo wp_trim_words(get_the_content(), $num_words = 20, $more = null); ?>
					<?php
				endwhile;
			}
			?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
	<div class="information">
		<div class="module2">
			<ul class="slider-home">
				<?php
				/* HOME SLIDER */
				$slider = array(
					'post_type' => 'home_slider',
					'posts_per_page' => 6,
					'meta_key' => 'orden_slider',
					'orderby' => 'meta_value',
					'order' => 'ASC'
				);
				$my_query = null;
				$my_query = new WP_Query( $slider );
				if ( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post();
						?>
						<li>
							<a href="<?php echo get( 'liga_post' ); ?>"><?php echo get_image( 'imagen_slider' ); ?></a>
							<div class="info">
								<h2><a href="<?php echo get( 'liga_post' ); ?>"><?php the_title(); ?></a></h2>
								<?php the_content(); ?>
							</div>
							<div class="banner">
							</div>
						</li>
						<?php
					endwhile;
				}
				?>
				<?php wp_reset_query(); ?>
			</ul>
		</div>
		<div class="participa">
			<div class="more"><a href="#"></a></div>
			<h3 class="tparticipa"><?php $obj = get_post_type_object( 'comunidad' ); echo $obj->labels->singular_name; ?></h3>
			<div class="cont">
					<?php
				/* COMUNIDAD */
				$comuni = array(
					'post_type' => 'comunidad',
					'posts_per_page' => 1,
					'orderby' => 'rand'
				);
				$my_query = null;
				$my_query = new WP_Query( $comuni );
				if ( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post();
						?>
					<div class="result">
					
					<h2><div class="avatar-mini">
						<div class="looney-tunes"></div>
						<img src="<?php bloginfo('template_url'); ?>/images/fake/cora.jpg"/>
					</div><?php the_title(); ?></h2>
					<div class="interactions">
						<p> <?php comments_number('0 Comentarios', '1 Comentario', '% Comentarios' ); ?></p>
						<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
						<a href="<?php the_permalink(); ?>">Comentar</a>
						
					</div>
					</div>
					<?php $comments = get_comments(array(
					'post_id' => $post->ID,
					'number' => '3' ));
					foreach($comments as $comment) {?>
					<div class="result people">
					<div class="avatar-mini">
						<div class="looney-tunes"></div>
						<?php echo get_avatar( get_the_author_meta( )); ?>
					</div>
						<?php $comment_trim = substr( get_comment_text( $comment_ID ), 0, 92 );?>
						<p><?php if(strlen($comment_trim)>91) {echo $comment_trim.'...'; }else{ echo $comment_trim;} ?></p>
						<?php if (class_exists('ZakiLikeDislike')) ZakiLikeDislike::getLikeDislikeHtml(); ?>
				</div>
				<?php  }?>
						<?php endwhile;}?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>
</div><!--main-->
<?php get_sidebar(); ?>
<div class="module3">
	<div class="more"><a href="recetas-saludables/"></a></div>
	<h3 class="trecetas"><?php $obj = get_post_type_object( 'recetas' );
echo $obj->labels->singular_name;
?></h3>
	<ul class="recetario">
		<?php
		/* RECETAS */
		$receta = array(
			'post_type' => 'recetas',
			'posts_per_page' => 6,
			'order' => 'ASC'
		);
		$my_query = null;
		$my_query = new WP_Query( $receta );
		if ( $my_query->have_posts() ) {
			while ( $my_query->have_posts() ) : $my_query->the_post();
				?>
				<li>
					<div class="cont">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumb1' ); ?></a>
						<div class="inf">
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<h2><?php echo get( 'porciones' ); ?> porciones</h2>
		<?php echo wp_trim_words(get_the_content(), $num_words = 60, $more = null); ?>
							<a href="<?php the_permalink(); ?>" class="vermas" style="display:block; ">Ver receta completa</a>
						</div>
					</div> 
				</li>
				<?php
			endwhile;
		}
		?>
<?php wp_reset_query(); ?>
	</ul>
</div>
<div class="ejercicios">
	<div class="more"><a href="#"></a></div>
	<h3 class="tejercicios"><?php
		$obj = get_post_type_object( 'ejercicios' );
		echo $obj->labels->singular_name;
		?></h3>
	<div class="cont">
		<?php
		/* EJERCICIO */
		$ejercicio = array(
			'post_type' => 'ejercicios',
			'posts_per_page' => 1,
			'orderby' => 'rand'
		);
		$my_query = null;
		$my_query = new WP_Query( $ejercicio );
		if ( $my_query->have_posts() ) {
			while ( $my_query->have_posts() ) : $my_query->the_post();
				?>
					<?php the_post_thumbnail( 'thumb1' ); ?>
				<div class="inf">
					<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
					<a href="<?php the_permalink(); ?>" class="vermas">Ver ejercicio completo</a>
				</div>
				<?php
			endwhile;
		}
		?>
<?php wp_reset_query(); ?>
	</div>
</div>
</div><!--page-->
<?php get_footer(); ?>