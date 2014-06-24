<?php
/*
  @package micorazon
 */
?>
<div class="copyright">
	<p>Información usada bajo licencia de Mayo Foundation For Medical Education and Research.Copyright © Edición en Español por Intersistemas, S.A. de C.V.</p>
	<ul>
		<li><a href="#">Aviso de Privacidad</a></li>
		<li><a href="#">Legales</a></li>
	</ul>
</div>
</div><!--page-->
</div><!--content all-->
<?php if ( is_page( array( 373, 388,449,446 ) ) ) { ?>
	</div><!--registro-box-->
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.11.1.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-ui-1.10.4.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/browser.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/selectivizr-min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.dropkick-min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.lightbox_me.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/micorazon_registro.js"></script>
<?php } ?>
<?php if ( is_page( 388 ) ) { ?>
	<script>
		    $(document).ready(function() {
				$("#tabs").tabs();
				$("#tabs-1").click(function() {
					$('#tabs').tabs( "option", "active", 1 );
				});
				$("#tabs-2").click(function() {
					$('#tabs').tabs( "option", "active", 2 );
				});
				$("#tabs-3").click(function() {
					$('#tabs').tabs( "option", "active", 3 );
				});

			});
		</script>
<?php } ?>
</body>
</html>