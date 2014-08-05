<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package micorazon
 */
?>
<div class="legal-mob">
			<p>Información usada bajo licencia de Mayo Foundation For Medical Education and Research.<br/>
				Copyright © Edición en Español por Intersistemas, S.A. de C.V.</p>
			<div class="clear"></div>
			<a href="http://micorazonsaludable.com/legal.html" target="_blank">Legales</a>
		</div>
<div class="footer">
	<div class="wrapper">
		<h3 class="tmapa">Mapa de navegación</h3>
		<div class="map">
			<h2><?php echo get_cat_name( 2 ); ?></h2>
			<ul>
				<?php
				/* QUERY CATEGORY BY ID */
				$categories = get_categories( 'orderby=name&depth=1&title_li=&use_desc_for_title=1&child_of=2' );
				foreach ( $categories as $cat ) {
					?>
					<?php $cat_id = $cat->cat_ID; ?>
					<?php $sd = query_posts( "cat=$cat_id&posts_per_page=1" ); ?>
					<li><a href="<?php echo get_permalink( $sd[0]->ID ); ?>" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="map">
			<h2><?php echo get_cat_name( 3 ); ?></h2>
			<ul>
				<?php
				/* QUERY CATEGORY BY ID */
				$categories = get_categories( 'orderby=name&depth=1&title_li=&use_desc_for_title=1&child_of=3' );
				foreach ( $categories as $cat ) {
					?>
					<?php $cat_id = $cat->cat_ID; ?>
					<?php $sd = query_posts( "cat=$cat_id&posts_per_page=1" ); ?>
					<li><a href="<?php echo get_permalink( $sd[0]->ID ); ?>" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="map last">
			<h2><?php echo get_cat_name( 4 ); ?></h2>
			<ul>
				<?php
				/* QUERY CATEGORY BY ID */
				$categories = get_categories( 'orderby=name&depth=1&title_li=&use_desc_for_title=1&child_of=4' );

				foreach ( $categories as $cat ) {
					?>
					<?php $cat_id = $cat->cat_ID; ?>
					<?php
					$sd = query_posts( "cat=$cat_id&posts_per_page=1" );
					if ( strcmp( $cat->slug, "recetas" ) == 0 ) {
						?>
						<li><a href="<?php echo site_url(); ?>/recetas-saludables/" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li>	
					<?php } elseif ( strcmp( $cat->slug, "actividades" ) == 0 ) { ?>
						<li><a href="<?php echo site_url(); ?>/actividad/registro-de-actividad-fisica/" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li>
					<?php } else {
						?>
						<li><a href="<?php echo get_permalink( $sd[0]->ID ); ?>" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li><?php
					}
				}
				?>
			</ul>
		</div>
		<div class="legals">
			<p>Información usada bajo licencia de Mayo Foundation For Medical Education and Research.<br/>
				Copyright © Edición en Español por Intersistemas, S.A. de C.V.</p>
			<div class="clear"></div>
			<a href="http://micorazonsaludable.com/legal.html" target="_blank">Legales</a>
		</div>
	</div>
</div>
</div><!--content-all-->
<?php

?>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/micorazon.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.lightbox_me.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.bxslider.min.js"></script>
<script>
		    $(document).ready(function() {
		    	$("#tabso").tabs({ active: <?php $category = get_the_category( get_the_ID() ); if($category[0]->parent==3) echo "1"; elseif(empty($category)) echo "0"; else echo $category[0]->cat_ID-2;  ?> });
		    	$("#tabso1").click(function() {
					$("#nav-papa1").children().eq(0).children().eq(1).addClass('abierto');
				});

			});
		</script>
</body>
</html>
