<?php get_header();?>
	<div class="container">
		<h2 class="red-text top-buffer bottom-buffer"><strong><?php _e(single_cat_title( '', false ));?></strong></h2>
	</div>
	<?php echo do_shortcode("[posts-query cat=".get_queried_object_id()." style=grid-lg-post posts_per_page=7]"); ?>
	<?php echo do_shortcode("[posts-query cat=".get_queried_object_id()." style=grid93 posts_per_page=2 offset=7]"); ?>
	<?php echo do_shortcode("[posts-query cat=".get_queried_object_id()." style=grid3 posts_per_page=3 offset=9]"); ?>
	<?php echo do_shortcode("[posts-query cat=".get_queried_object_id()." style=grid66 posts_per_page=2 offset=12]"); ?>
<?php get_footer();?>