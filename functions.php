<?php
require_once('wp_bootstrap_navwalker.php');
require_once('customize-theme.php');

add_theme_support( 'post-thumbnails' );
 
function register_my_menus() {
  register_nav_menus(
    array(
		'primary' => __( 'Header Navigation', 'hardnews' ),  
		'secondary1' => __('Footer Navigation 1', 'hardnews'),  
		'secondary2' => __('Footer Navigation 2', 'hardnews'),  
		'secondary3' => __('Footer Navigation 3', 'hardnews')
    )
  );
}
add_action( 'init', 'register_my_menus' );
add_image_size( 'custom-size', 120, 140 );

/*remove extra <p> and <br> tags*/
remove_filter( 'the_excerpt', 'wpautop' );

/* load javascript */
function load_js() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery3.2.1.min.js', array(), null, true);
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true );
	wp_enqueue_script( 'boostrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );
	//enqueue style
	wp_enqueue_style('hn-bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', false, get_stylesheet_directory() . '/css/bootstrap.min.css' );
	wp_enqueue_style('hn-font-awesome', get_template_directory_uri().'/css/font-awesome-4.7.0/css/font-awesome.min.css', false, get_stylesheet_directory() . '/css/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style('hn-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat|Cardo', false );
	wp_enqueue_style( 'main-style', get_template_directory_uri() .'/style.css', false, filemtime(get_stylesheet_directory() . '/style.css') );
}
add_action('wp_enqueue_scripts', 'load_js');


function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('posts_query_atts', function( $atts ){
	$atts['title'] = '';
	return $atts;
});

add_filter('show_admin_bar', '__return_false');


function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');
function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/img/opengraph_image.jpg';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src[0]; ?>"/>
 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

