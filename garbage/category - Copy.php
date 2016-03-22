<?php get_header(); ?>
<body>
	<div class="container-fluid main-container">
		<div class="category-main-top-menu">
			<div class=" category-main-col">

				
				<div class="page-header">

					<div class="main-search-by-name">
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
						    	
						    	<a href=""  class="posts-button-links">
						    		<div id="posts-name-submit" class="main-start-btn-posts">
						    			<img class="single-search-small-start-btn" src="<?php bloginfo('template_directory'); ?>/img/search_icon_reg2.png" fakesrc="<?php bloginfo('template_directory'); ?>/img/search_icon_pink2.png" width="25px">
						    		</div>
						    	</a>

					    </div>
			    	</div>

					<div class="page-logo-cat">
				   		<div class="mobile-menu-sandwich"><img src="<?php bloginfo('template_directory'); ?>/img/menu-mobile-on.png" alt="" width="100%"></div>
				   		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></a>
					</div>
				</div>

				<div class="page-menu-tags">
				   <?php dynamic_sidebar('contactform'); ?>
				</div>
				<div class="col-md-12 page-shadow-wrapper"><div class="page-shadow"></div></div>
			</div>
		</div>



										


			<section class="page-items">
				<div class="row">
						

						<?php
						// Start the loop.
						$args = array(
							'order' => 'ASC',
							'orderby' => 'meta_value_num',
						    'meta_key' => '_liked',
						    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
						);
						while ( have_posts() ) : the_post( $args ); ?>

						<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 page-item" data-position="<?php
												if (function_exists('wp_ulike_get_post_likes')):
												    echo wp_ulike_get_post_likes(get_the_ID());
												endif;
											?>">
							<div class="page-item-wrapper">
								<a href="<?php echo get_post_permalink(); ?>" id="post<?php the_ID(); ?>">
									<div class="page-item-slider-wrapper">
					              		<div class="page-item-slider">
							                <ul class="page-item-slides">
							                    <li id="page-item-slides-<?php the_ID(); ?>" class="page-item-slide slide1"><?php the_post_thumbnail(); ?></li>
							                    <li id="page-item-slides-<?php the_ID(); ?>" class="page-item-slide slide1"><?php the_post_thumbnail(); ?></li>
							                    
							                </ul>
						           		</div>
						           		<div class="slides-container" style="display:none;">
						           			<?php $key="thumbnail_pics"; echo get_post_meta($post->ID, $key, true); ?>
						           		</div>
						           	</div>
								</a>
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
											<div class="page-item-waze cat-icon"><a target="_blank" href="<?php $key="waze"; echo get_post_meta($post->ID, $key, true); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/waze_icon.png" width="60px"></a></div>
											<div class="page-item-waze cat-icon"><a href=""><img src="<?php bloginfo('template_directory'); ?>/img/get_taxi_icon.png" width="60px"></a></div>
											<div class="page-item-seat-wrapper"><a href="<?php echo get_post_permalink(); ?>/#saveaseat" class="page-item-seat-btn">שמור מקום</a></div>
										</div>
									</div>
									
																		
								</div>
							</div>
						</div>
						
					<?php endwhile;	?>



						

						

				</div>
			</section>

<footer>

	<a href="<?php echo get_page_link(375); ?>"><div class="join-us-big-button">הצטרפו אלינו</div></a>

</footer>
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
				    	<a href="" class="posts-button-link">
				    		<div id="posts-name-submit" class="start-btn-posts">
				    			<img class="single-search-small-start-btn" src="<?php bloginfo('template_directory'); ?>/img/search_icon_reg.png" fakesrc="<?php bloginfo('template_directory'); ?>/img/search_icon_pink.png">
				    		</div>
				    	</a>
			    	</form>
			    </div>
-->
</div>
	

<?php get_footer(); ?>