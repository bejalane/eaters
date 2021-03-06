<?php 


/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_script( 'responsive-slider', get_template_directory_uri() . '/js/responsiveslides.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'owl-slider', get_template_directory_uri() . '/js/owl.carousel.js', array(), '1.0.0', true );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
	 wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );

    wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );




add_theme_support('post-thumbnails');
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

function custom_comment_form_defaults($defaults){
	$defaults['comment_notes_before'] = '<p class="comment-notes">' . sprintf( __(''), '<span class="required">*</span>' ) . '</p>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'custom_comment_form_defaults' );

function alter_attr_wpse_102158($attr) {
  remove_filter('wp_get_attachment_image_attributes','alter_attr_wpse_102158');
  $attr['class'] .= ' page-item-slides-img ';
  return $attr;
}
add_filter('wp_get_attachment_image_attributes','alter_attr_wpse_102158'); 

add_action( 'pre_get_posts', 'limit_cpt_tax_term_posts' );

function limit_cpt_tax_term_posts( $query ) {

if( $query->is_main_query() && !is_admin() && is_tax( 'cs_album_categories_tax', 'bollywood-songs' ) ) {

$query->set( 'posts_per_page', '8' );

    }

}


function contact_widgets_init() {

	register_sidebar( array(
		'name'          => 'Contact Form',
		'id'            => 'contactform',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'contact_widgets_init' );

function share_widgets_init() {

	register_sidebar( array(
		'name'          => 'Share',
		'id'            => 'share',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'share_widgets_init' );

function keywords_widgets_init() {

	register_sidebar( array(
		'name'          => 'Keywords',
		'id'            => 'keywords'
	) );

}
add_action( 'widgets_init', 'keywords_widgets_init' );



add_filter('wp_ulike_format_number','wp_ulike_new_format_number',10,3);
function wp_ulike_new_format_number($value, $num, $plus){
    if ($num >= 1000 && get_option('wp_ulike_format_number') == '1'):
    $value = round($num/1000, 2) . 'K';
    else:
    $value = $num;
    endif;
    return $value;
}

add_filter('posts_join', 'wp_ulike_new_join' );
function wp_ulike_new_join($join){
	if(is_home()){
		global $wpdb;
		$join .= "	LEFT JOIN (
					SELECT *
					FROM ".$wpdb->prefix."postmeta
					WHERE meta_key =  '_liked' ) AS metasort
					ON ".$wpdb->prefix."posts.ID = metasort.post_id";
	}
	return ($join);
}

add_filter('posts_orderby', 'wp_ulike_new_order' );
function wp_ulike_new_order( $orderby ){
	if(is_home()){
		global $wpdb;
		$orderby = "metasort.meta_value DESC";
	}
 	return $orderby;
}


class WPSE67791_Walker_Category extends Walker_Category {

    public function start_el(&$output, $category, $depth, $args) {
        parent::start_el( $output, $category, $depth, $args );
                $find = 'cat-item-' . $category->term_id . '"';
                $replace = '' . $category->slug . '"';
                $output = str_replace( $find, $replace, $output );

    }
}






function current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}



wp_localize_script( 'twentyfifteen-script', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found', 'twentyfifteen'),
));


require_once('includes/loadmore.php');






?>