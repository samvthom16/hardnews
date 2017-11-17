<?php get_header();?>
<div class="container">
			<h2 class="red-text top-buffer bottom-buffer"><strong>Neighbourhood</strong></h2>
		</div>
		<div class="container-fluid">
			<div class="row">
		<?php $i = 0;?>
		<?php $the_query = new WP_Query( array(
		  'posts_per_page' => 7,
	   )); 
	?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
				<?php if(  $the_query->current_post == 0 && !is_paged() ) : ?>
			<div class="col-md-8 card-img white-text single-post-img row-eq-height bottom-buffer" style="background-image:linear-gradient(rgba(150, 150, 150, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo $image?>);">
                <div class="card col-md-10">
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
        <?php elseif ( $i <=6 ) : ?>
				<div class="col-md-4 bottom-buffer">	
							<div class="col-md-12">
							<h4 class="center"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
							<div class="red-text"><?php the_author_posts_link(); ?></div>
						  </div>
				</div>				

			<?php endif; ?>
			
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
			</div>
<div class="container top-buffer">
	<div class="row  bottom-buffer">						
	<?php $y = 0;
	$the_query = new WP_Query( array(
	  'posts_per_page' => 2,
	  'offset' => 7
	)); 
	?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
	 if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	}
  if($y % 2 == 0):?>
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
			
	<?php $y++; endwhile; 
			endif; ?>
			
	</div>
	<div class="row">						
	<?php $the_query = new WP_Query( array(
	  'posts_per_page' => 3,
	  'offset' => 9
	)); 
	?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
            <div class="col-sm-4 bottom-buffer">
                <div class="card">
                    <div class="card-img" style="background-image:url(<?php echo $image?>);">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"></a>
					</div>
                    <div class="card-block">
                        <h4 class="card-title red-text"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        <div class="card-text">
                            <?php the_excerpt(); ?>
                        </div>
						<div class="media">
						  <div class="media-left">
							<a href="#">
							   <img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
							</a>
						  </div>
						  <div class="media-body small text-left">
							<a href=""><strong class="media-heading red-text">Hardnews Magazine</strong></a>
							<div><?php echo get_the_date( 'M d' ); ?></div>
						  </div>
						</div>
                        
                    </div>
                </div>
            </div>

	<?php  endwhile; 
			endif; ?>
			
	</div>
	<div class="row">						
	<?php $the_query = new WP_Query( array(
	  'posts_per_page' => 2,
	  'offset' => 12
	)); 
	?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
            <div class="col-sm-6 bottom-buffer">
                <div class="card">
                    <div class="card-img" style="background-image:url(<?php echo $image?>);">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"></a>
					</div>
                    <div class="card-block">
                        <h4 class="card-title red-text"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        <div class="card-text">
                            <?php the_excerpt(); ?>
                        </div>
						<div class="media">
						  <div class="media-left">
							<a href="#">
							   <img class="media-object" src="<?php bloginfo('template_directory'); ?>/images/logo_small.png" alt="">
							</a>
						  </div>
						  <div class="media-body small text-left">
							<a href=""><strong class="media-heading red-text">Hardnews Magazine</strong></a>
							<div><?php echo get_the_date( 'M d' ); ?></div>
						  </div>
						</div>
                        
                    </div>
                </div>
            </div>
				<?php endwhile; ?>
			<?php endif; ?>
          </div>
</div>
<?php get_footer();?>