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
					<a href="home-page/"></a>
				</div>
			</div>
			<div class="logo4"></div>
		</div>
	</div>
	<div class="page">
		<?php
		if ( in_category( 2 ) ) {
			echo '<div class="slogan"><h2 class="tpreparate"><span>Haz pequeños cambios </span> que impacten tu bienestar.</h2></div>';
		} 
		elseif (  in_category(3) ) {
			echo '<div class="slogan"><h2 class="tponte"><span>Pon a latir</span>a tu corazón.</h2></div>';
		}
		else {
			echo '<div class="slogan"><h2 class="tconoce"><span>Comienza hoy</span> a vivir mejor.</h2></div>';
		}
		?>
	<div class="main">
		<div class="main-navigation">
			<div class="preparate <?php if(  in_category(2)){ echo'on';}?>">
				<a href="<?php echo get_permalink( 216 ) ?>"><?php echo get_cat_name( 2 ); ?></a>
			</div>
			<div class="ponte <?php if(  in_category(3)){ echo'on';}?>">
				<a href="<?php  echo get_permalink( 113 ) ?>"><?php echo get_cat_name( 3 ); ?></a>
			</div>
			<div class="conoce <?php if(  in_category(4)){ echo'on';}?> last">
				<a href="<?php  echo get_permalink( 262 ) ?>"><?php echo get_cat_name( 4 ); ?></a>
			</div>
		</div>