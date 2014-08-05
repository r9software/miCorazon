<?php
/**
 * @package micorazon
 */
?>

<article>
	<header class="entry-header">
		<div class="item-search">
			<h1><a href="<?php echo get_permalink()?>"><?php the_title(); ?></h1>
                        <?php if (has_post_thumbnail()) { ?>
                            <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumb2'); ?></a>
                        <?php } else { ?>  <a href="<?php echo get_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/default_image.png" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a><?php } ?>
                        <p><?php echo wp_trim_words(get_the_content(), $num_words = 60, $more = null); ?></p>
                    </div>
	</header><!-- .entry-header -->

</article><!-- #post-## -->
