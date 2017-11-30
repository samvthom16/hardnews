<?php get_header();?>
<div class="container">
			<h2 class="red-text top-buffer bottom-buffer"><strong>Neighbourhood</strong></h2>
		</div>
		<div class="container-fluid">
			<div class="row">
		<?php $i = 0;?>
		<?php $the_query = new WP_Query( array(
		  'posts_per_page' => 7,
	   )); 
	?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
				<?php if(  $the_query->current_post == 0 && !is_paged() ) : ?>
			<div class="col-md-8 white-text bottom-buffer">
			<a href="" class="overlay single-post-img card-img" style="background-image: url(<?php echo $image?>);"></a>
                <div class="card col-md-10 carousel-caption">
                        <h3 class="card-title "><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="card-text"><?php the_excerpt(); ?></div>
						<div class="media bottom-buffer">
						  <div class="media-left">
							<a href="#">
							   <img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
							</a>
						  </div>
						  <div class="media-body small text-left">
							<a href=""><strong class="media-heading"><?php the_author();?></strong></a>
							<div><?php echo get_the_date( 'M d' ); ?></div>
						  </div>
						</div>
                </div>
				</div>	

			<?php endif; ?>
			
				<?php endwhile; ?>
			<?php endif; ?>
			<div class="col-md-4 top-border">
		<?php echo do_shortcode("[posts-query category_name='Neighbourhood' style=grid1 posts_per_page=6 offset=1]"); ?>		
			</div>
			</div>
			</div>
<?php echo do_shortcode("[posts-query category_name='Neighbourhood' style=grid93 posts_per_page=2 offset=7]"); ?>
<?php echo do_shortcode("[posts-query category_name='Neighbourhood' style=grid3 posts_per_page=3 offset=9]"); ?>
<?php echo do_shortcode("[posts-query category_name='Neighbourhood' style=grid66 categ posts_per_page=2 offset=12]"); ?>
<?php get_footer();?>