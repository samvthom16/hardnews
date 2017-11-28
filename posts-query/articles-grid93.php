<div class="container">
	<section class="col-md-12 clearfix white-text">
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
		<div class="col-md-9 bottom-buffer">
			<div class="col-md-12 card-img white-text row-eq-height" style="background-image:linear-gradient(rgba(150, 150, 150, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo $image?>);">
                <div class="card col-md-12">
                        <h3 class="card-title "><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="card-text"><?php the_excerpt(); ?></div>
						<div class="media bottom-buffer">
						  <div class="media-left">
							<a href="#">
							   <img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
							</a>
						  </div>
						  <div class="media-body small text-left">
							<a href=""><strong class="media-heading">Hardnews Magazine</strong></a>
							<div><?php echo get_the_date( 'M d' ); ?></div>
						  </div>
						</div>
					</div>
                </div>
			</div>
			<?php else :?>
			<div class="col-md-3 bottom-buffer">
			<div class="col-md-12  card-img row-eq-height white-text"  style="background-image:linear-gradient(rgba(150, 150, 150, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo $image?>);">
                <div class="card col-md-12">
                        <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						<div class="card-text"><?php the_excerpt(); ?></div>
						<div class="media bottom-buffer">
						  <div class="media-left">
							<a href="#">
							   <img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
							</a>
						  </div>
						  <div class="media-body small text-left">
							<a href=""><strong class="media-heading">Hardnews Magazine</strong></a>
							<div><?php echo get_the_date( 'M d' ); ?></div>
						  </div>
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