<div class="container">
	<section class="col-md-12 clearfix white-text">
		<div class="posts"><span class="white-bg text-uppercase red-text"><strong><?php _e($atts['title']);?></strong></span></div>	
		<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('#'.$atts['id'].' .row');?>" data-url="<?php _e( $atts['url'] );?>">	
		<div class='row cardo'>
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
		<?php if($i % 2 == 0):?> 
		<div class="col-sm-4 bottom-buffer">
                <div class="card col-md-12 card-img row-eq-height overlay" style="background-image:url(<?php echo $image?>);">
                    <div class="card-block col-md-12 no-border bottom-buffer">
                        <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        
                    </div>
                </div>
            </div>
			<?php else :?>
		    <div class="col-sm-8 bottom-buffer">
                <div class="card col-md-12 card-img row-eq-height overlay" style="background-image:url(<?php echo $image?>);">
                    <div class="card-block no-border col-md-12 bottom-buffer">
                         <div class="card-text">
                            <?php the_excerpt(); ?>
                        </div>                        
                    </div>
                </div>
            </div>
			<?php endif; ?>
		<?php
			$i++;
			endwhile; 
		?>
		</div>
		</div>
		<?php the_pq_pagination( $atts );?>
    </section>
</div>