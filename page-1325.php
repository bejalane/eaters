<?php get_header(); ?>
<?php get_template_part( 'maincatHeader' );?>

<div id='ajax-posts' class='row'>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 18,
        'cat' => '2',
        'orderby' => 'meta_value_num',
        'meta_key' => '_liked',
        'paged' => $paged
        );

$loop = new WP_Query($args);

while ($loop->have_posts()) : $loop->the_post();
?>

<?php get_template_part( 'maincattemplate' );?>

<?php 
endwhile;
wp_reset_postdata();
?>
</div>
<div id='more_posts' style='padding-top:40px;' data-category='<?php echo 2; ?>'>Load More</div>

<?php get_template_part( 'maincatFooter1' );?>

<?php 
    // FIRST CATEGORY NAME
$category = get_the_category(); 
$catID = 6;
$args = array(
    'category' => $catID,
    'posts_per_page' => -1,
    'orderby'=> 'title',
    'order' => 'ASC'  
    );
$catPosts = get_posts( $args );
?>
<input type='text' class='main-search-by-name-input' placeholder='חפש...'>

<?php global $post;  $args = array( 'posts_per_page' => -1);?> 
<div class='main-search-by-name-titles-wrapper'>
    <?php $posts = get_posts($args); foreach( $catPosts as $post ) : setup_postdata($post); ?>


    <a class='main-search-by-name-titles' id='<?php the_ID(); ?>' href='<?php echo get_post_permalink(); ?>'><?php the_title(); ?></a> <?php endforeach; ?> 
</div>

<a href=''  class='posts-button-links'>
    <div id='posts-name-submit' class='main-start-btn-posts'>
        <img class='single-search-small-start-btn' src='<?php bloginfo('template_directory'); ?>/img/search_icon_reg2.png' fakesrc='<?php bloginfo('template_directory'); ?>/img/search_icon_pink2.png' width='25px'>
    </div>
</a>
<?php wp_reset_postdata(); ?>


<?php get_template_part( 'maincatFooter2' );?>

<?php 
                       // FIRST CATEGORY NAME
$category = get_the_category(); 
$catID = 6;
$args = array(
    'category' => $catID,
    'posts_per_page' => -1,
    'orderby'=> 'title',
    'order' => 'ASC'  
    );
$catPosts = get_posts( $args );
?>
<input type='text' class='main-search-by-name-input' placeholder='חפש...'>

<?php global $post;  $args = array( 'posts_per_page' => -1);?> 
<div class='main-search-by-name-titles-wrapper'>
    <?php $posts = get_posts($args); foreach( $catPosts as $post ) : setup_postdata($post); ?>

    <a class='main-search-by-name-titles' id='<?php the_ID(); ?>' href='<?php echo get_post_permalink(); ?>'><?php the_title(); ?></a> <?php endforeach; ?> 
</div>


<?php wp_reset_postdata(); ?>

<?php get_template_part( 'maincatFooter3' );?>

<?php get_footer(); ?>

