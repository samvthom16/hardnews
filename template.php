<?php /* Template Name: StaticPage */ ?>
<?php get_header();?>
<?php while( have_posts() ) : the_post();?>
	<div class="container space-above">
		<div class="row">
			<div class="col-md-12">
				<?php the_content();?>
			</div>
		</div>
	</div>
<?php endwhile;?>
<?php get_footer();?>