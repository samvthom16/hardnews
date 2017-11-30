<div id="myCarousel" class="carousel slide " data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li> 
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>
	
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	<?php $index = 0;while( $this->query->have_posts() ) : $this->query->the_post();?>
	<?php if (has_post_thumbnail( $this->query->post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $this->query->post->ID ), 'single-post-thumbnail' );?>	
    <div class="item <?php if ($index == 1) { echo ' active'; } ?>" >
	<a href="<?php the_permalink(); ?>" class="overlay card-img" style="background-image:url('<?php echo $image[0]; ?>')"></a>
		<div class="carousel-caption col-md-5">
			<h2 class="post-title top-buffer cardo "><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php the_excerpt(); ?></p>					
			<div class="media">
				<div class="media-left">
					<a href="#">
						<img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
					</a>
				</div>
				<div class="media-body small text-left cardo">
					<a href=""><strong class="media-heading"><?php the_author();?></strong></a>
					<div><?php echo get_the_date( 'M d' ); ?></div>
				</div>
			</div>
		</div>
	</div>

	<?php $index++; endif; endwhile; ?>
	</div>
</div>