<?php get_header();?>

<?php 
	
	$title = '';
	
	if( is_author() ){
		$title = get_the_author();
	}
	
	if( is_search() ){
		$title = "Search for : ". get_query_var('s');
	}
	
	if( is_tag() ){
		$title = single_cat_title( '', false );
	}
	
	
?>

<div class="container" style="margin-top:40px">
	<section class="col-md-12 clearfix">
		<?php if( $title ):?>
		<div class="posts"><span class="white-bg text-uppercase red-text"><strong><?php _e( $title );?></strong></span></div>	
		<?php endif;?>
		<div id="index-container" data-target="#index-container .row.cardo" data-url="">	
		<?php 
			$i = 1; 
			while( have_posts() ) : the_post();
				
				global $wp_query;
				
				if( $i % 3 == 1){ echo "<div class='row cardo'>";}
				
				get_template_part('partials/grid', '3');
				
				if( $i % 3 == 0 || $i == $wp_query->post_count ){ echo "</div>";}
				$i++;
			endwhile;
		?>
		</div>
		<button data-behaviour="ajax-loading" data-list="#index-container" class="load-more" type="button">Load More</button>	
	</section>
</div>
<?php get_footer();?>