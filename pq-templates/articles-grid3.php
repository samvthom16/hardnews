<div class="container">
	<section class="col-md-12 clearfix">
		<div class="posts"><span class="white-bg text-uppercase red-text"><strong><?php _e($atts['title']);?></strong></span></div>				
		<?php 
			while ( $this->query->have_posts() ) : $this->query->the_post(); 
				$postid = $this->query->post->ID;
				$image = '';
				if( has_post_thumbnail( $postid ) ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
					$image = $image[0];
				} 
		?>
		<div class="col-sm-4">
			<div class="card">
				<div class="card-img" style="background-image:url(<?php echo $image?>);">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"></a>
				</div>
				<div class="card-block">
					<h4 class="card-title red-text"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
					<div class="card-text"><?php the_excerpt(); ?></div>
					<div class="media">
						<div class="media-left">
							<a href="">
							   <img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
							</a>
						</div>
						<div class="media-body small text-left">
							<a href=""><strong class="media-heading red-text"><?php the_author();?></strong></a>
							<div><?php echo get_the_date( 'M d' ); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
    </section>
</div>