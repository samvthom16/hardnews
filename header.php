<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></title>
<?php wp_head();?>
</head>
<body <?php body_class(); ?> >
<div id="fb-root"></div>
<nav class="navbar navbar-default no-border" data-spy="affix" data-offset-top="90">
  <div class="container-fluid line"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand-big" href="<?php bloginfo('url');?>"> <img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
      </a>
      <a class="navbar-brand hidden" href="<?php bloginfo('url');?>"> <img src="<?php bloginfo('template_directory'); ?>/images/logo_sticky.png" alt=""> </a> 
	  </div>
    <div class="navbar-right">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i> </button>
        <form class="navbar-form clearfix" role="search">       
				<div class="pull-right social red-text">
					<span class="social-icons">
						<a href="https://www.facebook.com/HNFP.IN/"><i class="fa fa-facebook fa-outline"></i></a>
						<a href="https://twitter.com/hnfp_in"><i class="fa fa-twitter fa-outline"></i></a>
						<a href="whatsapp://send?text=<?php bloginfo('url');?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a> 
						<a href=""><i class="fa fa-bell-o"></i></a> 
					</span>
					<a href=""><i class="fa fa-search"></i></a>
					<input type="text" name="s" class="search-query" placeholder="Search" />
					<span class="hidden">
						<span class="separator text-muted">Next Story</span> 
						<?php $next = get_the_title(get_adjacent_post(false,'',true));
						$next_link = get_permalink(get_adjacent_post(false,'',true));?>
						<a href="<?php echo $next_link ?>" class="next-post text-muted"><strong><?php echo $next ?></strong></a>
					</span>
				</div>
        </form>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse text-uppercase col-md-12 pull-left',
				'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
	</div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<?php get_template_part( 'header', 'banner' ); ?>