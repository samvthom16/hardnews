<?php get_header();?>
<?php global $post;?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(have_posts()):while ( have_posts() ) : the_post();?> 
			<h2 class="post-title top-buffer"><strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong></h2>	
			<h2 class="cardo"><small><strong><?php the_excerpt(); ?></strong></small></h2>
			<small  class="text-muted"><?php echo get_the_date( 'M d' ); ?></small>
			 <span class="disc"></span>
			<small  class="text-muted"><?php echo do_shortcode('[rt_reading_time]'); ?> min read</small>
		</div>
	</div>
</div>
<?php if (has_post_thumbnail( $post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="space-above space-below card-img single-post-img" style="background-image:url(<?php echo $image[0]?>);"></div>
<?php endif; ?>
<div class="container  main-content top-buffer cardo">
	<div class="row">
		<div class="col-md-12">
		<p><?php the_content(); ?>	</p>
		<p class="top-buffer space-below">
			<?php
			$posttags = get_the_tags();
			$sep='';
			if ($posttags) {
				foreach($posttags as $tag) {					
					echo  '<a href="'.get_tag_link($tag->term_id).'" class="grey-bg">'.$tag->name.'</a>';
				}
			}
			?>		
		</p>
		<div class="dashed-border clearfix top-buffer space-below">
			<h4 class="red-text text-uppercase top-buffer">Tweet this</h4>
			<div class="col-md-5 bottom-buffer no-gutter tweet">
				<?php the_excerpt(); ?>
				<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_permalink($post->ID)); the_excerpt(); ?>"><i class="fa fa-twitter fa-outline blue-text"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
			<div class="col-md-offset-1 col-md-5 bottom-buffer no-gutter tweet">
				<?php the_title_attribute(); ?>		
				<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_permalink($post->ID));  the_title_attribute(); ?>"><i class="fa fa-twitter fa-outline blue-text"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		</div>	
    <?php endwhile;endif;?>
</div>
</div>

<aside class="fixed-socials">
		<ul>
			<li>			
				<div data-href="<?php echo get_permalink($post->ID); ?>" data-layout="button" data-size="small" data-mobile-iframe="true">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>"><i class="fa fa-facebook fa-outline red-text-outline"></i></a>
				</div>
			</li>
			<li>
				<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" data-show-count="false"><i class="fa fa-twitter fa-outline red-text-outline"></i></a>
				<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</li>
			<li><a href="whatsapp://send?text=<?php echo urlencode(get_permalink($post->ID)); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a></li>
		</ul>
	</aside>
<?php get_footer();?>