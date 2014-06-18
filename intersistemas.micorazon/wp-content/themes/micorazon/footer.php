<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package micorazon
 */
?>
<div class="footer">
	<div class="wrapper">
		<h3 class="tmapa">Mapa de navegación</h3>
		<div class="map">
			<h2><?php echo get_cat_name( 2 ); ?></h2>
			<ul>
				<?php
				/* QUERY CATEGORY BY ID*/
				$categories = get_categories( 'orderby=name&depth=1&title_li=&use_desc_for_title=1&child_of=2' );
				foreach ( $categories as $cat ) {
					?>
				<?php $cat_id = $cat->cat_ID;?>
				<?php $sd = query_posts("cat=$cat_id&posts_per_page=1");?>
				<li><a href="<?php echo get_permalink($sd[0]->ID); ?>" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="map">
			<h2><?php echo get_cat_name( 3 ); ?></h2>
			<ul>
				<?php
				/* QUERY CATEGORY BY ID*/
				$categories = get_categories( 'orderby=name&depth=1&title_li=&use_desc_for_title=1&child_of=3' );
				foreach ( $categories as $cat ) {
					?>
				<?php $cat_id = $cat->cat_ID;?>
				<?php $sd = query_posts("cat=$cat_id&posts_per_page=1");?>
				<li><a href="<?php echo get_permalink($sd[0]->ID); ?>" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="map last">
			<h2><?php echo get_cat_name( 4 ); ?></h2>
			<ul>
				<?php
				/* QUERY CATEGORY BY ID*/
				$categories = get_categories( 'orderby=name&depth=1&title_li=&use_desc_for_title=1&child_of=4' );
				foreach ( $categories as $cat ) {
					?>
				<?php $cat_id = $cat->cat_ID;?>
				<?php $sd = query_posts("cat=$cat_id&posts_per_page=1");?>
				<li><a href="<?php echo get_permalink($sd[0]->ID); ?>" id="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="legals">
			<p>Información usada bajo licencia de Mayo Foundation For Medical Education and Research.<br/>
				Copyright © Edición en Español por Intersistemas, S.A. de C.V.</p>
			<div class="clear"></div>
			<a href="#">Términos y condiciones de uso</a><a href="#">Aviso de Privacidad</a>
		</div>
	</div>
</div>
</div><!--content-all-->
<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/micorazon.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.min.js"></script>
</body>
</html>
