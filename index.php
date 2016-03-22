<?php get_header(); ?>

<body>
	<div class="container-fluid main-container">
		<div class="row">
			<div class="col-lg-12 homepage-col">

				 <div id="demo">

			          <div class="row">
			            <div class="col-lg-12">

			              <div class="slider-wrapper">
				              <div id="slider">
					                <ul class="slides">
					                    <li class="slide slide1"><img class="main-hero-img" src="" fakeurl="<?php bloginfo('template_directory'); ?>/img/mainbiggest.jpg" alt=""></li>
					                    <li class="slide slide2"><img class="main-hero-img" src="" fakeurl="<?php bloginfo('template_directory'); ?>/img/mainbiggest.jpg" alt=""></li>
					                    <li class="slide slide3"><img class="main-hero-img" src="" fakeurl="<?php bloginfo('template_directory'); ?>/img/mainbiggest.jpg" alt=""></li>
					                    <li class="slide slide4"><img class="main-hero-img" src="" fakeurl="<?php bloginfo('template_directory'); ?>/img/mainbiggest.jpg" alt=""></li>
					                    <li class="slide slide5"><img class="main-hero-img" src="" fakeurl="<?php bloginfo('template_directory'); ?>/img/mainbiggest.jpg" alt=""></li>
					                    <li class="slide slide1"><img class="main-hero-img" src="" fakeurl="<?php bloginfo('template_directory'); ?>/img/mainbiggest.jpg" alt=""></li>
					                </ul>
					            </div>
				        </div>
			            
			            </div>
			          </div>


			    </div>

			    <div class="main-overlay"></div>
				

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

			    <div class="main-hero">
			    	<div class="main-logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></div>
			    	
			    	<div class="main-logo-slogan">לאכול | לבלות | להתאהב</div>
			    	<!--<iframe width="70" height="45" frameBorder="0" src="http://localhost/eatersTest/like-button/iframeButton.php"></iframe>-->
			    	<div class="main-func-buttons">
			    	 
			    		<form class="main-search-form">
								 
								<div class="main-search-place-wrapper">
								<input type="text" class="main-search-place" placeholder="איפה אני?">
								<img src="<?php bloginfo('template_directory'); ?>/img/form-loc-main.png" alt="" class="main-search-place-img">

								<?php 
								    $args = array(
									'show_option_all'    => '',
									'orderby'            => 'name',
									'order'              => 'ASC',
									'style'              => 'list',
									'show_count'         => 0,
									'hide_empty'         => 1,
									'use_desc_for_title' => 1,
									'child_of'           => 6,
									'feed'               => '',
									'feed_type'          => '',
									'feed_image'         => '',
									'exclude'            => '',
									'exclude_tree'       => '',
									'include'            => '',
									'hierarchical'       => 1,
									'title_li'           => __( '' ),
									'show_option_none'   => __( '' ),
									'number'             => null,
									'echo'               => 1,
									'depth'              => 0,
									'current_category'   => 0,
									'pad_counts'         => 0,
									'taxonomy'           => 'category',
									'walker'             => null,
									'walker' => new WPSE67791_Walker_Category
								    );
								    
								?>


								<div class="search-place-list">
									<?php wp_list_categories( $args ); ?>
									
								</div>
								</div>


								<div class="main-search-food-wrapper">
								<input type="text" class="main-search-food" placeholder="מה בא לי?">

								<?php 
								    $args = array(
									'show_option_all'    => '',
									'orderby'            => 'name',
									'order'              => 'ASC',
									'style'              => 'list',
									'show_count'         => 0,
									'hide_empty'         => 1,
									'use_desc_for_title' => 1,
									'child_of'           => 7,
									'feed'               => '',
									'feed_type'          => '',
									'feed_image'         => '',
									'exclude'            => '',
									'exclude_tree'       => '',
									'include'            => '',
									'hierarchical'       => 1,
									'title_li'           => __( '' ),
									'show_option_none'   => __( '' ),
									'number'             => null,
									'echo'               => 1,
									'depth'              => 0,
									'current_category'   => 0,
									'pad_counts'         => 0,
									'taxonomy'           => 'category',
									'walker'             => null,
									'walker' => new WPSE67791_Walker_Category
								    );
								    
								?>


								<div class="search-food-list"><?php wp_list_categories( $args ); ?></div>
								</div>



					           

					           

								<a href="" class="main-button-link"><div id="main-submit" class="start-btn">חפש!</div></a>

								<div class="search-checkbox-wrapper"><input type="checkbox" name="vehicle" value="kosher" id="search-checkbox" class="search-checkbox"><label for="search-checkbox">מצא מסעדות כשרות בלבד!</label></div>
					 			
					 			
			    	</div>
			    	<div class="join-us-block">
			    		<div class="join-us-btn"></div>

			    	</div>
			    </div>
		
			    <div class="gradient"><img src="<?php bloginfo('template_directory'); ?>/img/gradient.png" alt="" width="100%;"></div>

			</div>
		</div>
	</div>

<div class="join-us-form">
<div class="join-us-form-close"></div>
<div class="join-us-form-logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo4.png" alt="eaters" width="100%"></div>
<div class="join-us-form-title">יש לכם מסעדה או בר</br>
 שאתם רוצים לפרסם?</div>
 <div class="join-us-form-posttitle">בואו ותצטרפו לפרוייקט</div>
<?php echo do_shortcode( '[contact-form-7 id="13" title="join us"]' ); ?>
</div>
<div class="popup-back-wrapper"></div>
<span id="homepage-flag" style="display: none" />
<?php get_footer(); ?>