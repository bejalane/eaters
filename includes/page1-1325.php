<?php 
$catid = $_POST['id']; 
echo $catid;

$myfile = fopen("page-1325.php", "w") or die("Unable to open file!");
$txt = "
<?php get_header(); ?>

 <div id='ajax-posts' class='row'>
        <?php

            \$args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'cat' => $catid
            );

            \$loop = new WP_Query(\$args);

            while (\$loop->have_posts()) : \$loop->the_post();
        ?>

         <div class='col-lg-12'>
                <h1><?php the_title(); ?></h1>
                <div>id = <?php echo $catid ?></div>
         </div>

         <?php
                endwhile;
        wp_reset_postdata();
         ?>
    </div>
    <div id='more_posts'>Load More</div>

<?php get_footer(); ?>

";
fwrite($myfile, $txt);

fclose($myfile);

?>