<div class="container-fluid">
	<section class="clearfix white-text">
	<?php 
		$i = 0; $row_i = 0;
		while($this->query->have_posts()): $this->query->the_post();
			
			
			
			$postid = $this->query->post->ID;
			
			$col_class = "col-md-5 card-img";
		
			if( ( ($row_i % 2 == 0) && ($i % 2 == 1) ) || ( ($row_i % 2 == 1) && ($i % 2 == 0) ) ){
				$col_class = "col-md-7 card-img";
			}
		
		
			if (has_post_thumbnail($postid) ){
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'medium_large' ); 				
				$image = $image[0];
			}	
			else{
				$image = '';
			}			
			
			if( $i % 2 == 0 ){ echo "<!-- start of row --><div class='row'>"; } 
			
			
	?>
			<div class="card no-gutter <?php _e($col_class);?>">
				<a href="<?php the_permalink(); ?>" class="card-img overlay " style="background-image:url(<?php echo $image?>);" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>
		
				<div class="carousel-caption">
				<h4 class="card-title col-md-12">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>
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
		<?php 
				if( $i % 2 == 1 || $i == $this->query->post_count - 1  ){ echo "</div><!-- end of row -->"; $row_i++; } 
				$i++;
			endwhile;
		?>		
		<?php the_pq_pagination( $atts );?>
	</section>
</div>