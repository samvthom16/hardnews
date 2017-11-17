<?php get_header();?>
<?php global $post;?>

<?php
$args = array( 'numberposts' => 4 );
$lastposts = get_posts( $args );
$index = 0;?>
		<div id="myCarousel" class="carousel slide " data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li> 
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		  <?php foreach ($lastposts as $post) : setup_postdata ($post); ++$index; ?>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>	
    <div class="item <?php if ($index == 1) { echo ' active'; } ?>" style="background-image:linear-gradient(rgba(100, 100, 100, 0.5), rgba(0, 0, 0, 0.5)),url('<?php echo $image[0]; ?>')">
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
							<a href=""><strong class="media-heading">Hardnews Magazine</strong></a>
							<div><?php echo get_the_date( 'M d' ); ?></div>
						  </div>
						</div>
				  </div>
					</div>

			<?php endif; ?>
<?php endforeach; ?>
		  </div>
		  </div>
<?php if (have_posts()) : ?>
        <div class="container-fluid">
		<section class="clearfix white-text cardo">
			
<?php 
	$i = 0;
	$row_i = 0;
while ($wp_query->have_posts()):
	$wp_query->the_post();
		
		$col_class = "col-md-5 card-img";
		
		if( ( ($row_i % 2 == 0) && ($i % 2 == 1) ) || ( ($row_i % 2 == 1) && ($i % 2 == 0) ) ){
			$col_class = "col-md-7 card-img";
		}
		
		
       if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	}  ?>

<?php if( $i % 2 == 0 ){ echo "<!-- start of row --><div class='row row-eq-height'>"; } ?>
      
<div class="<?php _e($col_class);?>" style="background-image:linear-gradient(rgba(150, 150, 150, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo $image?>);">
	<div class="card col-md-12">
   		<h4 class="card-title "><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
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
	
<?php if( $i % 2 == 1 || $i == $wp_query->post_count - 1  ){ echo "</div><!-- end of row -->"; $row_i++; } ?>		
	<?php $i++;	 ?>

    <?php endwhile; ?>
<?php endif; ?>
			</section>
			</div>			
        <div class="container">
			<section class="col-md-12 clearfix">
			<div class="posts"><span class="white-bg text-uppercase red-text"><strong>History</strong></span></div>				
			<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
            <div class="col-sm-4">
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
			</section>	
			<section class="col-md-12 clearfix white-text cardo">
			<div class="posts"><span class="white-bg text-uppercase red-text"><strong>Neighbourhood</strong></span></div>				
	<div class="row">
			<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 2,
   )); 
 if ( $the_query->have_posts() ) : 
   while ( $the_query->have_posts() ) : $the_query->the_post(); 
	 if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
            <div class="col-sm-4 bottom-buffer">
                <div class="card col-md-12 card-img row-eq-height" style="background-image:linear-gradient(rgba(150, 150, 150, 0.5), rgba(0, 0, 0, 0.7)),url(<?php echo $image?>);">
                    <div class="card-block col-md-12 no-border bottom-buffer">
                        <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-8 bottom-buffer">
                <div class="card col-md-12 card-img row-eq-height" style="background-image:linear-gradient(rgba(150, 150, 150, 0.5), rgba(0, 0, 0, 0.7)),url(<?php echo $image?>);">
                    <div class="card-block no-border col-md-12 bottom-buffer">
                         <div class="card-text">
                            <?php the_excerpt(); ?>
                        </div>                        
                    </div>
                </div>
            </div>
			
    <?php endwhile; ?>
    <?php endif; ?>
			</section>
			<section class="col-md-12 clearfix">
			<div class="posts"><span class="white-bg text-uppercase red-text"><strong>Defence</strong></span></div>				
			<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
            <div class="col-sm-6 col-md-4">
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
			</section>	
			<section class="col-md-12 clearfix">
			<div class="posts"><span class="white-bg text-uppercase red-text"><strong>Energy</strong></span></div>				
			<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-img" style="background-image:url(<?php echo $image?>);">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"></a>
					</div>
                    <div class="card-block ">
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
			</section>	
			<section class="col-md-12 clearfix">
			<div class="posts"><span class="white-bg text-uppercase red-text"><strong>World</strong></span></div>				
			<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>
			<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php if (has_post_thumbnail($postid) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); 				
		$image = $image[0];
	} ?>
            <div class="col-sm-4">
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
			</section>	
	</div>
		</div>
		</div>
<?php get_footer();?>