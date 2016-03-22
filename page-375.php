<?php get_header(); ?>
<body>
	<div class="container-fluid main-container">
		<div class="row">
			<div class="col-lg-12">

				
				<div class="page-header">
				   <div class="page-logo">
				   		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></a>
				   </div>

				   
				</div>

				
			</div>
		</div>

		

		<section class="join-us-big">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="join-us-banner">
								<img src="<?php bloginfo('template_directory'); ?>/img/join-us-banner.png" width="100%">
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
				
					<div class="col-md-2 col-lg-2"></div>

					<div class="col-md-8 col-lg-8 join-us-big-col">
						<div class="join-us-big-form">
							<div class="join-us-big-form-cf7"><?php echo do_shortcode('[contact-form-7 id="439" title="Join us bigger"]'); ?></div>	
						</div>
					</div>

					<div class="col-md-2 col-lg-2"></div>

				</div>
			</div>
		</section>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="paypalform">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="MR35ABEQARHL4">
<input type="image" src="https://www.paypalobjects.com/he_IL/IL/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" class="paypalbutton" alt="PayPal - הדרך הקלה והבטוחה לשלם באינטרנט!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<!--
<div class="search-by-name category-page-search-by-name">
			    	<form action="<? bloginfo('url'); ?>" method="get" class="restaurant-search-form"> 

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
				    	<select name="page_id" id="post_id" class="chosen-select post-select"> <?php global $post;  $args = array( 'posts_per_page' => -1);?> 
							<option value="-1">חפש מסעדה...</option>
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
				    	<a href="" class="posts-button-link">
				    		<div id="posts-name-submit" class="start-btn-posts">
				    			<img class="single-search-small-start-btn" src="<?php bloginfo('template_directory'); ?>/img/search_icon_reg.png" fakesrc="<?php bloginfo('template_directory'); ?>/img/search_icon_pink.png">
				    		</div>
				    	</a>
			    	</form>
			    </div>



</div>
	-->

<?php get_footer(); ?>