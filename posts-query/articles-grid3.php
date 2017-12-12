<div class="container">
	<section class="col-md-12 clearfix">
		<?php if( $atts['title'] ):?>
		<div class="posts"><span class="white-bg text-uppercase red-text"><strong><?php _e($atts['title']);?></strong></span></div>	
		<?php endif;?>
		<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('#'.$atts['id'].' .row');?>" data-url="<?php _e( $atts['url'] );?>">	
		<?php 
			$i = 1; 
			while ( $this->query->have_posts() ) : $this->query->the_post(); 
				
				if( $i % 3 == 1){ echo "<div class='row cardo'>";}
				
				get_template_part('partials/grid', '3');
				
				if( $i % 3 == 0 || $i == $this->query->post_count ){ echo "</div>";}
				
				$i++;
			endwhile;
		?>
		
		</div>
		<?php the_pq_pagination( $atts );?>
    </section>
</div>