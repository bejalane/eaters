<?php 
$catid = $_POST['id']; 
echo $catid;

$myfile = fopen("catsid.php", "w") or die("Unable to open file!");
$txt = "<?php \$catid = '$catid' ?>";
fwrite($myfile, $txt);

fclose($myfile);

$myfile = fopen("catsqueries.php", "w") or die("Unable to open file!");
$txt = "
    <?php
    \$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    \$mycats = array($catid);
    \$args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'category__and' => \$mycats,
        'orderby' => 'meta_value_num',
        'meta_key' => '_liked',
        'paged' => \$paged
        );

\$loop = new WP_Query(\$args);

while (\$loop->have_posts()) : \$loop->the_post();
?>

";
fwrite($myfile, $txt);

fclose($myfile);

?>