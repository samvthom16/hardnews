<?php
	global $post_id;
	$image = '';
	if( has_post_thumbnail( $post_id ) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} 
?>
<div class="col-sm-4 posts-query-article bottom-buffer">
	<div class="card">
		<a href="<?php the_permalink(); ?>" class="card-img" style="background-image:url(<?php echo $image?>);" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>
		<div class="card-block">
			<h4 class="card-title red-text">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h4>
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
