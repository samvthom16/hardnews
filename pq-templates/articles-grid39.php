<div class="container-fluid">
	<section class="clearfix white-text cardo">
	<?php 
		$i = 0; $row_i = 0;
		while($this->query->have_posts()): $this->query->the_post();
			
			
			
			$postid = $this->query->post->ID;
			
			$col_class = "col-md-5 card-img";
		
			if( ( ($row_i % 2 == 0) && ($i % 2 == 1) ) || ( ($row_i % 2 == 1) && ($i % 2 == 0) ) ){
				$col_class = "col-md-7 card-img";
			}
		
		
			if (has_post_thumbnail($postid) ){
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
				$image = $image[0];
			}	
			else{
				$image = '';
			}			
			
			if( $i % 2 == 0 ){ echo "<!-- start of row --><div class='row row-eq-height'>"; } 
			
			
	?>
		<div class="<?php _e($col_class);?> overlay" style="background-image:url(<?php echo $image?>);">
			<div class="card col-md-12">
				<h4 class="card-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>
				<div class="media bottom-buffer">
					<div class="media-left">
						<a href="#">
							<img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
						</a>
					</div>
					<div class="media-body small text-left">
						<a href=""><strong class="media-heading"><?php the_author();?></strong></a>
						<div><?php echo get_the_date( 'M d' ); ?></div>
					</div>
				</div>
			</div>
		</div>
	
		<?php 
				if( $i % 2 == 1 || $i == $this->query->post_count - 1  ){ echo "</div><!-- end of row -->"; $row_i++; } 
				$i++;
			endwhile;
		?>		
	</section>
</div>