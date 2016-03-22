<?php get_header(); ?>
<body>
	<div class="container-fluid main-container">
		<div class="row">
			<div class="col-lg-12">

				
				<div class="page-header">
				   <div class="page-logo">
				   		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></a>
				   </div>
				   <div class="search-by-name category-page-search-by-name">
			    	<form action="<? bloginfo('url'); ?>" method="get" class="restaurant-search-form"> 

				    	<?php 
						    // FIRST CATEGORY NAME
						    $category = get_the_category(); 
						    $catID = 6;
						    $args = array(
						        'category' => $catID,
						        'posts_per_page' => -1         
						    );
						    $catPosts = get_posts( $args );
						    ?>
				    	<select name="page_id" id="post_id" class="chosen-select post-select"> <?php global $post;  $args = array( 'posts_per_page' => -1);?> 
							<option value="-1">חפש...</option>
				    		<?php $posts = get_posts($args); foreach( $catPosts as $post ) : setup_postdata($post); ?>                
				    		
				    		<option value="<?php the_ID(); ?>"><?php the_title();?></option> <?php endforeach; ?> 
				    	</select> 
				    	<script type="text/javascript">
								    var config = {
								      '.chosen-select'           : {},
								      '.chosen-select-deselect'  : {allow_single_deselect:false},
								      '.chosen-select-no-single' : {disable_search_threshold:10},
								      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
								      '.chosen-select-width'     : {width:"90%"}
								    }
								    for (var selector in config) {
								      $(selector).chosen(config[selector]);
								    }
						</script>
				    	<a href="" class="posts-button-link"><div id="posts-name-submit" class="start-btn-posts"><i class="fa fa-search"></i></div></a>
			    	</form>
			    </div>
				</div>

				
			</div>
		</div>

		<section class="join-us-big">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 join-us-big-col">

						<div class="join-us-big-form">
							<div class="join-us-big-form-title">יש לכם מסעדה או בר שאתם רוצים לפרסם?<br>בואו ופרסמו אצלנו!</div>
							<div class="join-us-big-form-cf7"><?php echo do_shortcode('[contact-form-7 id="85" title="Join us bigger"]'); ?></div>		
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer>
		<?php wp_list_categories( $args ); ?> 
			
		</footer>


</div>
	

<?php get_footer(); ?>