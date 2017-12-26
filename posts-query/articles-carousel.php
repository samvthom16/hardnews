<div id="myCarousel" class="carousel slide " data-ride="carousel">
	<ol class="carousel-indicators">
		<?php for($i = 0; $i< $this->query->post_count; $i++): ?>
		<li data-target="#myCarousel" data-slide-to="<?php _e( $i );?>" <?php if( $i == 0):?>class="active"<?php endif;?>></li>
		<?php endfor;?>
	</ol>
	
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	<?php $index = 0;while( $this->query->have_posts() ) : $this->query->the_post();?>
		
		<?php 
			$image = '';
			if( has_post_thumbnail( $this->query->post->ID ) ){ 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $this->query->post->ID ), 'single-post-thumbnail' );
				$image = $image[0];
			}
		?>	
		
		<div class="item <?php if ($index == 0) { echo ' active'; } ?>" >
			<a href="<?php the_permalink(); ?>" class="overlay card-img" style="background-image:url('<?php echo $image; ?>')"></a>
			<div class="carousel-caption col-md-7">
				<h2 class="card-title top-buffer">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
				<p class="card-text"><?php the_excerpt(); ?></p>					
				<div class="media">
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

	<?php $index++; endwhile; ?>
	</div>
</div>