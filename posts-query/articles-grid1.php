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
		<div class="pad-bot">
				<h4 class="center"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<div class="red-text"><?php the_author_posts_link(); ?></div>
		</div>
		
		<?php 
				if( $i % 1 != 0 || $i == $this->query->post_count ){
					echo "</div>";
				}
				$i++;
			endwhile; 
		?>
		</div>
		<?php the_pq_pagination( $atts );?>