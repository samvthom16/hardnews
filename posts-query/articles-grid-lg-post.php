	<div class="container-fluid">
		<div class="row">
			<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('#'.$atts['id'].' .row');?>" data-url="<?php _e( $atts['url'] );?>" class="top-buffer small">	
			<?php 
			$i = 0;
			while ( $this->query->have_posts() ) : $this->query->the_post(); 
				$postid = $this->query->post->ID;
				$image = '';
				if( has_post_thumbnail( $postid ) ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
					$image = $image[0];
				} 				
		?>
		
		<?php if(  $this->query->current_post == 0 && !is_paged() ) : ?>
		<div class="col-md-8 white-text bottom-buffer">
			<a href="<?php the_permalink(); ?>" class="overlay single-post-img card-img" style="background-image: url(<?php echo $image?>);"></a>
			<div class="card col-md-10 carousel-caption">
				<h3 class="card-title "><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="card-text"><?php the_excerpt(); ?></div>
				<div class="media bottom-buffer">
					<div class="media-left">
						<a href="<?php bloginfo('url');?>">
							<img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
						</a>
					</div>
					<div class="media-body small text-left">
						<strong class="media-heading"><?php the_author_posts_link(); ?></strong>
						<div><?php echo get_the_date( 'M d' ); ?></div>
					</div>
				</div>
			</div>
		</div>	
		<?php endif;
			endwhile; ?>
		<div class="col-md-4 top-border">
			<?php echo do_shortcode("[posts-query cat=".get_queried_object_id()." style=grid1 posts_per_page=6 offset=1]"); ?>		
		</div>
		</div>
		<?php the_pq_pagination( $atts );?>
	</div>
</div>