<?php get_header();?>
<?php global $post;?>
<div class="container space-below ">
	<div class="row">
		<div class="col-md-12">
			<?php if(have_posts()):while ( have_posts() ) : the_post();?> 
			<h2 class="post-title top-buffer"><strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong></h2>	
			<h2 class="cardo"><small><?php the_excerpt(); ?></small></h2>
			<small  class="text-muted"><?php echo get_the_date( 'M d' ); ?></small>
			 <span class="disc"></span>
			<small  class="text-muted">17 min read</small>
		</div>
	</div>
</div>
		<a href="<?php the_permalink(); ?>">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <div class="top-buffer space-below card-img single-post-img" style="background-image:url(<?php echo $image[0]?>);"></div>
		<?php endif; ?>
		</a>
<div class="container  main-content top-buffer">
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
			<h4 class="red-text text-uppercase top-buffer"><strong>Tweet this</strong></h4>
			<div class="col-md-5 bottom-buffer no-gutter">
				<?php the_excerpt(); ?>
				<a href=""><i class="fa fa-twitter fa-outline blue-text"></i></a>
			</div>
			<div class="col-md-offset-1 col-md-5 bottom-buffer no-gutter">
				<?php the_excerpt(); ?>
				<a href=""><i class="fa fa-twitter fa-outline blue-text"></i></a>
			</div>
		</div>
		</div>	
    <?php endwhile;endif;?>
</div>
</div>

<aside class="fixed-socials">
		<ul>
			<li><a href="#"><i class="fa fa-facebook fa-outline red-text-outline"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter fa-outline red-text-outline"></i></a></li>
			<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
			<li><a href="#"><i class="fa fa-bell-o"></i></a></li>
		</ul>
	</aside>
<?php get_footer();?>