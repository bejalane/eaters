
<?php get_header(); ?>

<?php get_template_part( 'page1-1325' );?>

 <div id='ajax-posts' class='row'>
        <?php
            // = 3;
             = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'cat' => 2
            );

             = new WP_Query();

            while (()) : ();
        ?>

         <div class='col-lg-12'>
                <h1><?php the_title(); ?></h1>
                <div>id = <?php echo 2 ?></div>
         </div>

         <?php
                endwhile;
        wp_reset_postdata();
         ?>
    </div>
    <div id='more_posts'>Load More</div>

<?php get_footer(); ?>

Minnie Mouse
