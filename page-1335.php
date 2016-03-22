<?php get_header();

require_once('includes/catsid.php');
 
?>
<body>
<div class="page-load-overlay">
    <div class="loader-wrapper"><img class="cat-fake-img1" src="<?php bloginfo('template_directory'); ?>/img/hex-loader2.gif" alt=""></div>
</div>
    <div class="container-fluid main-container cat-container">




                                        


            <section class="page-items">
                <div id='ajax-posts' class="row category-row">
                        

    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mycats = array($catid);
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

<?php get_template_part( 'maincattemplate' );?>

<?php 
endwhile;
wp_reset_postdata();
?>

<div id='more_posts' style='padding-top:40px;' data-category='<?php echo $catid; ?>'>Load More</div>
                

                </div>
            </section>

<footer>

    <a href="<?php echo get_page_link(375); ?>"><div class="join-us-big-button">הצטרפו אלינו</div></a>
    
    <div class="website-about">
        <?php dynamic_sidebar('keywords'); ?>
    </div>
    

</footer>

        <div class="category-main-top-menu">
            <div class=" category-main-col">
            <div id="demo" style="display:none;"></div>
            <div id="demo2" style="display:none;"></div>

                
                <div class="page-header">
                    <div class="mobile-header-search">
                        <div class="mobile-header-search-by-name">
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
                            <input type="text" class="main-search-by-name-input" placeholder="חפש...">

                            <?php global $post;  $args = array( 'posts_per_page' => -1);?> 
                            <div class="main-search-by-name-titles-wrapper">
                            <?php $posts = get_posts($args); foreach( $catPosts as $post ) : setup_postdata($post); ?>
                            
                                <a class="main-search-by-name-titles" id="<?php the_ID(); ?> " href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a> <?php endforeach; ?> 
                            </div>
                            
                            <a href=""  class="posts-button-links">
                                <div id="posts-name-submit" class="main-start-btn-posts">
                                    <img class="single-search-small-start-btn" src="<?php bloginfo('template_directory'); ?>/img/search_icon_reg2.png" fakesrc="<?php bloginfo('template_directory'); ?>/img/search_icon_pink2.png" width="25px">
                                </div>
                            </a>
                            <?php wp_reset_postdata(); ?>
                        </div>
                        <div class="mobile-menu-sandwich"><img src="<?php bloginfo('template_directory'); ?>/img/menu-mobile-on.png" alt="" width="100%"></div>
                    </div>
                    <div class="page-logo-cat-wrapper">
                        <div class="page-logo-cat">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></a>
                        </div>
                    </div>

                    <div class="main-search-by-name cat-page-search cat-regular-search-by-name">
                        <div class="search-by-name">
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
                            <input type="text" class="main-search-by-name-input" placeholder="חפש...">

                            <?php global $post;  $args = array( 'posts_per_page' => -1);?> 
                            <div class="main-search-by-name-titles-wrapper">
                                <?php $posts = get_posts($args); foreach( $catPosts as $post ) : setup_postdata($post); ?>
                                
                                <a class="main-search-by-name-titles" id="<?php the_ID(); ?> " href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a> <?php endforeach; ?> 
                            </div>
                            
                        
                            <?php wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>

                <div class="page-menu-tags">
                   <?php dynamic_sidebar('contactform'); ?>
                </div>
                <div class="col-md-12 page-shadow-wrapper"><div class="page-shadow"></div></div>
            </div>
        </div>


</div>
    
<div class="fake-img" style="display:none;"><img class="cat-fake-img" src="<?php bloginfo('template_directory'); ?>/img/cat-fake-img1.png" alt=""></div>
<?php get_footer(); ?>