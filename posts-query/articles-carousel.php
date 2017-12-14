<div id="myCarousel" class="carousel slide " data-ride="carousel">
	<ol class="carousel-indicators">
		<?php for($i = 0; $i< $this->query->post_count; $i++): ?>
		<li data-target="#myCarousel" data-slide-to="<?php _e( $i );?>" <?php if( $i == 0):?>class="active"<?php endif;?>></li>
		<?php endfor;?>
	</ol>
	
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	<?php $index = 0;while( $this->query->have_posts() ) : $this->query->the_post();?>
	<?php if( has_post_thumbnail( $this->query->post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $this->query->post->ID ), 'single-post-thumbnail' );?>	
		<div class="item <?php if ($index == 0) { echo ' active'; } ?>" >
			<a href="<?php the_permalink(); ?>" class="overlay card-img" style="background-image:url('<?php echo $image[0]; ?>')"></a>
			<div class="carousel-caption col-md-5">
				<h2 class="post-title top-buffer cardo">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
				<p><?php the_excerpt(); ?></p>					
				<div class="media">
					<div class="media-left">
						<a href="<?php bloginfo('url');?>">
							<img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="" />
						</a>
					</div>
					<div class="media-body small text-left cardo">
						<strong class="media-heading"><?php the_author_posts_link(); ?></strong>
						<div><?php echo get_the_date( 'M d' ); ?></div>
					</div>
				</div>
			</div>
		</div>

	<?php $index++; endif; endwhile; ?>
	</div>
</div>