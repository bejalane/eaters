<?php get_header(); ?>
<body>
<div class="page-load-overlay">
    <div class="loader-wrapper"><img class="cat-fake-img1" src="<?php bloginfo('template_directory'); ?>/img/hex-loader2.gif" alt=""></div>
</div>
    <div class="container-fluid main-container cat-container">




                                        


            <section class="page-items">
                <div class="row category-row">

                        <?php

                            $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 18,
                                    'cat' => 2,
                                    'meta_key' => '_liked',
                                    'orderby' => 'meta_value_num'
                            );

                            $loop = new WP_Query($args);

                            while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 page-item" data-position="<?php
                                                if (function_exists('wp_ulike_get_post_likes')):
                                                    echo wp_ulike_get_post_likes(get_the_ID());
                                                endif;
                                            ?>">
                            <div class="page-item-wrapper">
                                        <div class="item-distance"></div>
                                        <div class="item-lat"><?php $key="latitude"; echo get_post_meta($post->ID, $key, true); ?></div>
                                        <div class="item-lon"><?php $key="longitude"; echo get_post_meta($post->ID, $key, true); ?></div>

                                    <div class="page-item-slider-wrapper">
                                        <div class="page-item-slider">
                                            <a href="<?php echo get_post_permalink(); ?>" id="post<?php the_ID(); ?>">
                                                <ul class="page-item-slides page-item-slide-<?php the_ID(); ?>">
                                                    <?php $key="thumbnail_pics"; echo get_post_meta($post->ID, $key, true); ?>
                                                </ul>
                                            </a>
                                        </div>
                                        <div class="slides-container" style="display:none;">
                                            
                                        </div>
                                    </div>
                                
                                <div class="page-mobile-prevent"></div>

                                <div class="page-item-footer">
                                
                                    <div class="page-item-footer-computer">
                                        <div class="page-item-title"><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="page-item-seat-wrapper"><a href="<?php echo get_post_permalink(); ?>/#saveaseat" class="page-item-seat-btn">שמור מקום</a></div>
                                        <div class="page-hearts-computer"><img src="<?php bloginfo('template_directory'); ?>/img/heart_pink.png"><span class="page-hearts-zero"></span><?php
                                                if (function_exists('wp_ulike_get_post_likes')):
                                                    echo wp_ulike_get_post_likes(get_the_ID());
                                                endif;
                                            ?></div>
                                    </div>
                                        
                                    <div class="page-item-footer-mobile-first">
                                        <div class="page-item-title"><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="page-hearts"><img src="<?php bloginfo('template_directory'); ?>/img/heart_pink.png"><span class="page-hearts-zero"></span><?php
                                                if (function_exists('wp_ulike_get_post_likes')):
                                                    echo wp_ulike_get_post_likes(get_the_ID());
                                                endif;
                                            ?></div>
                                    </div>

                                    <div class="page-item-footer-mobile-second">
                                        <div class="page-mobile-icons">

                                            <div class="page-item-telephone cat-icon"><a href="tel:<?php $key="phone numbers"; echo get_post_meta($post->ID, $key, true); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/whatsapp_icon.png" width="60px"></a></div>
                                            <div class="page-item-waze cat-icon"><a target="_blank" class="mobile-waze-cat" data-lat="<?php the_field('latitude'); ?>" data-long="<?php the_field('longitude'); ?>" href="waze://?ll="><img src="<?php bloginfo('template_directory'); ?>/img/waze_icon.png" width="60px"></a></div>
                                            <div class="page-item-waze cat-icon"><a href=""><img src="<?php bloginfo('template_directory'); ?>/img/get_taxi_icon.png" width="60px"></a></div>
                                            <div class="page-item-seat-wrapper"><a href="<?php echo get_post_permalink(); ?>/#saveaseat" class="page-item-seat-btn">שמור מקום</a></div>
                                        </div>
                                    </div>
                                    
                                                                        
                                </div>
                            </div>
                        </div>
                        
                    <?php endwhile; ?>
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