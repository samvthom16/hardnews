<?php /* Template Name: CustomPage */ ?>
<?php get_header();?>
<?php while( have_posts() ) : the_post();?>
	<div class="container space-above">
		<?php the_content();?>
	</div>
<?php endwhile;?>
<?php get_footer();?>