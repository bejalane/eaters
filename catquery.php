<?php 
$catid = $_POST['id'];
$postsnumber = $_POST['postsnumber'];
echo $catid;


$myfile = fopen("page-1325.php", "w") or die("Unable to open file!");
$txt = "<?php get_header(); ?>
<?php get_template_part( 'maincatHeader' );?>

<div id='ajax-posts' class='row'>
    <?php
    \$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    \$mycats = array($catid);
    \$args = array(
        'post_type' => 'post',
        'posts_per_page' => $postsnumber,
        'category__and' => \$mycats,
        'orderby' => 'meta_value_num',
        'meta_key' => '_liked',
        'paged' => \$paged
        );

\$loop = new WP_Query(\$args);

while (\$loop->have_posts()) : \$loop->the_post();
?>

<?php get_template_part( 'maincattemplate' );?>

<?php 
endwhile;
wp_reset_postdata();
?>
</div>
</div>
</section>
<div id='more_posts' style='width=100%; height=1px;' data-category='<?php echo '$catid'; ?>'></div>

<?php get_template_part( 'maincatFooter1' );?>

<?php 
    // FIRST CATEGORY NAME
\$category = get_the_category(); 
\$catID = 6;
\$args = array(
    'category' => \$catID,
    'posts_per_page' => -1,
    'orderby'=> 'title',
    'order' => 'ASC'  
    );
\$catPosts = get_posts( \$args );
?>
<input type='text' class='main-search-by-name-input' placeholder='חפש...'>

<?php global \$post;  \$args = array( 'posts_per_page' => -1);?> 
<div class='main-search-by-name-titles-wrapper'>
    <?php \$posts = get_posts(\$args); foreach( \$catPosts as \$post ) : setup_postdata(\$post); ?>


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
\$category = get_the_category(); 
\$catID = 6;
\$args = array(
    'category' => \$catID,
    'posts_per_page' => -1,
    'orderby'=> 'title',
    'order' => 'ASC'  
    );
\$catPosts = get_posts( \$args );
?>
<input type='text' class='main-search-by-name-input' placeholder='חפש...'>

<?php global \$post;  \$args = array( 'posts_per_page' => -1);?> 
<div class='main-search-by-name-titles-wrapper'>
    <?php \$posts = get_posts(\$args); foreach( \$catPosts as \$post ) : setup_postdata(\$post); ?>

    <a class='main-search-by-name-titles' id='<?php the_ID(); ?>' href='<?php echo get_post_permalink(); ?>'><?php the_title(); ?></a> <?php endforeach; ?> 
</div>


<?php wp_reset_postdata(); ?>

<?php get_template_part( 'maincatFooter3' );?>

<?php get_footer(); ?>

";
fwrite($myfile, $txt);

fclose($myfile);

$myfile = fopen("catsid.php", "w") or die("Unable to open file!");
$txt = "<?php \$catid = '$catid' ?>";
fwrite($myfile, $txt);

fclose($myfile);

$myfile = fopen("includes/loadmore.php", "w") or die("Unable to open file!");
$txt = "
<?php function more_post_ajax(){

    \$ppp = (isset(\$_POST['ppp'])) ? \$_POST['ppp'] : 8;
    \$page = (isset(\$_POST['pageNumber'])) ? \$_POST['pageNumber'] : 1;

    header('Content-Type: text/html');

    \$mycats = array($catid);
    \$args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $postsnumber,
        'category__and' => \$mycats,
        'orderby' => 'meta_value_num',
        'meta_key' => '_liked',
        'paged' => \$page
    );

    \$loop = new WP_Query(\$args);

    \$out = '';

    if (\$loop -> have_posts()) :  while (\$loop -> have_posts()) : \$loop -> the_post();
        \$out .= get_template_part( 'maincattemplate' );

    endwhile;
    endif;
    wp_reset_postdata();
    die(\$out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
?>

";
fwrite($myfile, $txt);

fclose($myfile);


?>