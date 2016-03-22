
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mycats = array(11);
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category__and' => $mycats,
        'orderby' => 'meta_value_num',
        'meta_key' => '_liked',
        'paged' => $paged
        );

$loop = new WP_Query($args);

while ($loop->have_posts()) : $loop->the_post();
?>

