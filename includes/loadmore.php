
<?php function more_post_ajax(){

    $ppp = (isset($_POST['ppp'])) ? $_POST['ppp'] : 6;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;

    header('Content-Type: text/html');

    $mycats = array(11);
    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category__and' => $mycats,
        'orderby' => 'meta_value_num',
        'meta_key' => '_liked',
        'paged' => $page
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= get_template_part( 'maincattemplate' );

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
?>

