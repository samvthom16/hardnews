<div class="container">
	<section class="col-md-12 clearfix">
		<?php if( $atts['title'] ):?>
		<div class="posts"><span class="white-bg text-uppercase red-text"><strong><?php _e($atts['title']);?></strong></span></div>	
		<?php endif;?>
		<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('#'.$atts['id'].' .row');?>" data-url="<?php _e( $atts['url'] );?>">	
		<?php 
			$i = 1;
			while ( $this->query->have_posts() ) : $this->query->the_post(); 
				$postid = $this->query->post->ID;
				$image = '';
				if( has_post_thumbnail( $postid ) ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
					$image = $image[0];
				} 
				
				if( $i % 3 == 1){
					echo "<div class='row cardo'>";
				}
				
		?>
		
			<div class="col-sm-4 posts-query-article bottom-buffer">
				<div class="card">
						<a href="<?php the_permalink(); ?>" class="card-img" style="background-image:url(<?php echo $image?>);" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>
					<div class="card-block">
						<h4 class="card-title red-text"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
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
		
		<?php 
				if( $i % 3 == 0 || $i == $this->query->post_count ){
					echo "</div>";
				}
				$i++;
			endwhile; 
		?>
		</div>
		<?php the_pq_pagination( $atts );?>
    </section>
</div>