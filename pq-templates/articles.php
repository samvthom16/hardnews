<div>
	<h2>Articles</h2>
	<ul>
	<?php while( $this->query->have_posts() ) : $this->query->the_post();?>
		<li><?php the_pq_article( $style );?></li>
	<?php endwhile;?>
	</ul>
</div>
