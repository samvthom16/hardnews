<div class="container">
	<section class="col-md-12 clearfix top-buffer">
		<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('#'.$atts['id'].' .row');?>" data-url="<?php _e( $atts['url'] );?>">	
		<?php 
			$i = 0;
			while ( $this->query->have_posts() ) : $this->query->the_post(); 
				$postid = $this->query->post->ID;
				$image = '';
				if( has_post_thumbnail( $postid ) ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
					$image = $image[0];
				} 
				
				if( $i % 2 == 0){
					echo "<div class='row cardo'>";
				}
				
		?>
		
			<div class="col-sm-6 posts-query-article bottom-buffer">
				<div class="card">
					<a href="<?php the_permalink(); ?>" class="card-img" style="background-image:url(<?php echo $image?>);" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>
					<div class="card-block">
						<h4 class="card-title red-text"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						<div class="card-text"><?php the_excerpt(); ?></div>
						<div class="media">
							<div class="media-left">
								<a href="<?php bloginfo('url');?>">
								   <img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
								</a>
							</div>
							<div class="media-body small text-left">
								<strong class="media-heading red-text"><?php the_author_posts_link(); ?></strong>
								<div><?php echo get_the_date( 'M d' ); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		<?php 
				if( $i % 2 != 0 || $i == $this->query->post_count ){
					echo "</div>";
				}
				$i++;
			endwhile; 
		?>
		</div>
		<?php the_pq_pagination( $atts );?>
    </section>
</div>