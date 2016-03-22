<?php 

/*
Template Name Posts:Hamburger Template
*/

?>

<?php get_header(); ?>


  <?php get_template_part( 'part1' );?>

    <?php
      // Start the loop.
      while ( have_posts() ) : the_post();
    ?>

  
    <?php get_template_part( 'part2' );?>
	
	<div id="hamburger" class="template-name" style="display:none;"></div>
	<div class="container-fluid main-container single-container mobile-container hamburger-container">
		<?php get_template_part( 'part3' );?>
	</div>


	<!--HERE BEGINS NEW REGULAR MONITOR PART-->
	<div class="container-fluid main-container single-container regular-container hamburger-container">
				<?php get_template_part( 'part4' );?>
	</div>
	
<?php
// End the loop.
		endwhile;
		?>

<?php get_template_part( 'part5' );?>

<?php get_footer(); ?>