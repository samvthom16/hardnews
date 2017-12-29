<div class="container">
	<section class="col-md-12 clearfix white-text">
		<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('#'.$atts['id'].' .row');?>" data-url="<?php _e( $atts['url'] );?>">	
		<div class='row'>
		<?php 
			$i = 0;
			while ( $this->query->have_posts() ) : $this->query->the_post(); 
				$postid = $this->query->post->ID;
				$image = '';
				if( has_post_thumbnail( $postid ) ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'medium_large' ); 				
					$image = $image[0];
				} 				
		?>
		<?php if($i % 2 == 0):?> 
		<div class="col-md-9 bottom-buffer white-text">
			<a href="<?php the_permalink(); ?>" class="card-img overlay " style="background-image:url(<?php echo $image?>);" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>
                <div class="carousel-caption col-md-11">
                        <h3 class="card-title col-md-12"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="card-text col-md-12"><?php the_excerpt(); ?></div>
						<div class="media col-md-12">
						  <div class="media-left">
							<a href="<?php bloginfo('url');?>">
							   <?php echo get_avatar(32); ?>
							</a>
						  </div>
						  <div class="media-body text-left">
							<span class="media-heading"><?php the_author_posts_link(); ?></span>
							<div class="post-date"><?php echo get_the_date( 'M d' ); ?></div>
						  </div>
					</div>
                </div>
			</div>
			<?php else :?>
			<div class="col-md-3 bottom-buffer white-text">
			<a href="<?php the_permalink(); ?>" class="card-img overlay " style="background-image:url(<?php echo $image?>);" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>
                <div class="carousel-caption col-md-11">
                        <h4 class="card-title col-md-12"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						<div class="card-text col-md-12"><?php the_excerpt(); ?></div>
						<div class="media col-md-12">
						  <div class="media-left">
							<a href="<?php bloginfo('url');?>">
							   <?php echo get_avatar(32); ?>
							</a>
						  </div>
						  <div class="media-body text-left">
							<span class="media-heading"><?php the_author_posts_link(); ?></span>
							<div class="post-date"><?php echo get_the_date( 'M d' ); ?></div>
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