<?php
/*
 * @package micorazon
  Template Name: ayuda-help5
 */
get_header(); ?>
<div class="content">
	<?php   $my_postid = 1272;//This is page id or post id
                           $content_post = get_post($my_postid);
                           $content = $content_post->post_content;
                           $content = apply_filters('the_content', $content);
                           $content = str_replace(']]>', ']]&gt;', $content);
                           echo $content;
                   ?>
	
</div>
</div><!--main-->
<?php get_sidebar(); ?>
<div class="module3">
	
	
</div>



</div><!--page-->
<?php get_footer(); ?>