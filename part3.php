
		<div class="row">
			<div class="col-lg-12 mobile-col-wrapper">

				<div class="mobile-header-search">
						<div class="mobile-header-search-by-name mobile-single-header-search-by-name">
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
							<input type="text" class="main-search-by-name-input mobile-single-search-by-name-input" placeholder="חפש...">

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
					</div>


				<div class="page-header-single">
					<!--<?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>-->
				   <div class="page-logo-single">
				   
				   		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></a>
				   		
				   </div>
				</div>

				<!-- MOBILE TITLE -->
				<div class="row single-mobile-title-block">
					<div class="col-md-12 hidden-for-portrait hidden-post-title"  id="hidden-main-title">
						<div class="post-title"><?php the_title(  ); ?></div>
						<div class="hidden-single-buttons">

							<div class="hidden-post-map post-map-btn">
								<a target="_blank" class="mobile-waze" data-lat="<?php the_field('latitude'); ?>" data-long="<?php the_field('longitude'); ?>" href="waze://?ll=">
									<img src="<?php bloginfo('template_directory'); ?>/img/colors/" width="100%">
								</a>
							</div>
							<div class="hidden-post-call-us">
								<a href="tel:<?php $key="phone_numbers"; echo get_post_meta($post->ID, $key, true); ?>">
									<img src="<?php bloginfo('template_directory'); ?>/img/colors/" width="100%">
								</a>
							</div>
							<div class="hidden-share-icon share-icon-btn">
								<img src="<?php bloginfo('template_directory'); ?>/img/colors/" width="100%">
							</div>
						</div>
						
						<div class="post-reg-info-kosher post-reg-info-kosher-first"><img src="<?php bloginfo('template_directory'); ?>/img/colors/" width="30px"><?php the_field('kosher'); ?></div>
					</div>
				</div>
				<!--END OF MOBILE TITLE -->




<!-- SLIDER COLUMN-->
				<div class="col-lg-7 col-md-7 col-sm-12 post-col-picture">

						<div class="post-reg-forms-logo-mobile">
							<div class="post-reg-forms-logo-mobile-wrapper">			
								<?php 
									$image = get_field('restraunt_logo');
									if( !empty($image) ): ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									<?php endif; ?>
							</div>
							<div class="post-reg-forms-logo-ribbon"></div>

						</div>

						<div class="post-restraunt-menu-btn post-reg-menu"><a target="_blank" href="<?php the_field('cafe-menu'); ?>" data-link="<?php the_field('cafe-menu-link'); ?>" class="post-reg-menu-link">תפריט</a></div>

						<!--SLIDER-->
						<div id="demo">
					            <div id="owl-demo" class="owl-carousel">

					        	</div>
					    </div>

					    <div class="slider-box-hidden-for-content">
					    	<?php the_content( ); ?>
					    </div>



					    <!--MAP-->
					    <div class="post-map-display">
					    	<div class="post-close-map-block">
					    		<img class="post-close-map-arrow" src="<?php bloginfo('template_directory'); ?>/img/map_arrow_pink.png">
					    	</div>
					    	<?php $key="map"; echo get_post_meta($post->ID, $key, true); ?>
					    </div>

					    <!--REVIEWS-->
					    <div class="post-reviews-display">
					   		<div class="post-close-review-block">
					    		<img class="post-close-review-arrow" src="<?php bloginfo('template_directory'); ?>/img/review_arrow_pink.png">
					    	</div>
					    	<div class="post-review-wrapper">
						    	<div>
							    	
						    	</div>
						    	<div>
						    			<?php echo do_shortcode('[wpdevart_facebook_comment curent_url="http://developers.facebook.com/docs/plugins/comments/" order_type="social" title_text="Facebook Comment" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#CCCCCC" animation_effect="random" count_of_comments="2" ]'); ?>
						    	</div>

					    	</div>
					    </div>

					    <!--SHARE-->
					    <div class="hidden-share">
					    	<div class="share-text">SHARE:</div>
					    	<div class="post-facebook">
								<a target="_blank" class="share-fb-btn" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo current_page_url(); ?>&amp;p[images][0]=<?php bloginfo('template_directory'); ?>/img/logo3.png&amp;p[title]=EATERS.CO.IL - <?php the_title(  ); ?>&amp;p[summary]="><img src="<?php bloginfo('template_directory'); ?>/img/share-to-facebook-twitter-button.png" width="43px"></a>
							<?php dynamic_sidebar('share'); ?>
							</div>
							<div class="post-whats-app">
								<a href="whatsapp://send" data-text="Take a look at this awesome place you must visit in tel aviv:" data-href="<?php echo post_permalink( $ID ); ?>" class="wa_btn wa_btn_s" style="display:block"><img src="<?php bloginfo('template_directory');?>/img/whatsapp.png" width="40px"></a>
							</div>
					    </div>

					</div>
<!-- END OF SLIDER COLUMN-->

					


<!-- COLOUR COLUMN WITH INFO REGULAR DISPLAY-->
					<div class="col-lg-5 col-md-5 col-sm-12 post-col-text visible-for-landscape">
					<!--FACEBOOK-->
							<div class="post-facebook">
								<!--<div class="post-facebook-button"><i class="fa fa-facebook"></i></div>-->
								<div class="fb-share-button" data-href="<?php echo post_permalink( $ID ); ?>" data-layout="button"></div>
							</div>
						<div class="post-col-text-wrapper-first">
							

							<!--MAIN INFO-->
							<div class="post-title"><?php the_title(  ); ?></div>
							<div class="post-address"><?php $key="address"; echo get_post_meta($post->ID, $key, true); ?></div>
							<div class="post-phone"><?php $key="phone_numbers"; echo get_post_meta($post->ID, $key, true); ?></div>

						</div>

						<div class="post-col-text-wrapper-second">
							<div class="post-description-wrapper">
								<div class="post-description">
									<?php $key="description"; echo get_post_meta($post->ID, $key, true); ?>
								</div>
							</div>
						</div>

						<div class="post-col-text-wrapper-third">

							<div class="opening-hours-block">
								<div class="post-opening-hours-title">שעות פתיחה</div>
								<div class="post-opening-hours">ראשון-חמישי: <?php $key="opening_hours_sun-thu"; echo get_post_meta($post->ID, $key, true); ?><br>
									שישי: <?php $key="opening_hours_fri"; echo get_post_meta($post->ID, $key, true); ?><br>
									שבת: <?php $key="opening_hours_sat"; echo get_post_meta($post->ID, $key, true); ?>
								</div>
							</div>

							<!--FEATURES-->
							<ul class="post-features">
								<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png" width="13px"><?php $key="feature1"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png" width="13px"><?php $key="feature2"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png" width="13px"><?php $key="feature3"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png" width="13px"><?php $key="feature4"; echo get_post_meta($post->ID, $key, true); ?></li>
							</ul>

							<!--BUTTONS-->
							<a href="tel:<?php $key="phone_number"; echo get_post_meta($post->ID, $key, true); ?>" class="post-call-us-btn"><div class="post-call-us"><img src="<?php bloginfo('template_directory'); ?>/img/callus.png" width="27px"> Call Us</div></a>
							<div class="post-map-btn post-buttons"><img class="post-button-icon post-button-icon-map" src="<?php bloginfo('template_directory'); ?>/img/map_icon_pink.png" width="">מפה</div>
							<a href="#makeanevent"><div class="post-make-event-btn post-buttons"><img class="post-button-icon post-button-icon-event" src="<?php bloginfo('template_directory'); ?>/img/event_icon_pink.png">אירועים</div></a>
							<div class="post-review-btn post-buttons"><img class="post-button-icon post-button-icon-review" src="<?php bloginfo('template_directory'); ?>/img/review_icon_pink.png">ביקורות</div>
							

						</div>
					</div>
<!-- END OF COLOUR COLUMN WITH INFO-->

					

<!-- MOBILE COLOUR COLUMN WITH INFO-->
						<div class="hidden-info-col-wrapper">

							<div class="col-md-12 col-sm-12 col-xs-12 hidden-for-portrait hidden-post-features">
								<ul class="post-features">
									<li><?php $key="feature1"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png"><?php $key="feature2"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png"><?php $key="feature3"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png"><?php $key="feature4"; echo get_post_meta($post->ID, $key, true); ?></li>
								</ul>
							</div>
							
							<div class="mobile-info-block">
								<div class="post-reg-info-fb-like"><div class="fb-like" data-href="https://www.facebook.com/Peppermagazin/?fref=ts" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>

								<div class="hidden-post-description">
									<?php $key="description"; echo get_post_meta($post->ID, $key, true); ?>
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12 hidden-for-portrait hidden-post-address">
									
									<div class="post-opening-hours-title">מתי אנחנו פתוחים?</div>
									<div class="post-opening-hours">ראשון-חמישי: <?php $key="opening_hours_sun-thu"; echo get_post_meta($post->ID, $key, true); ?><br>
											שישי: <?php $key="opening_hours_fri"; echo get_post_meta($post->ID, $key, true); ?><br>
											שבת: <?php $key="opening_hours_sat"; echo get_post_meta($post->ID, $key, true); ?></div>
									
									<div class="hidden-post-adress-phone"><img class="hidden-post-adress-phone-loc" src="<?php bloginfo('template_directory'); ?>/img/colors/"><?php $key="address"; echo get_post_meta($post->ID, $key, true); ?>
													<br><img class="hidden-post-adress-phone-phone" src="<?php bloginfo('template_directory'); ?>/img/colors/"><?php $key="phone_numbers"; echo get_post_meta($post->ID, $key, true); ?>
									</div>

								</div>
							</div>
							<div class="clear-both"></div>
							
						</div>



					</div>

				</div><!--main lg-12-->
<!-- END OF MOBILE COLOUR COLUMN WITH INFO-->			

				<div class="row">
					<div class="col-lg-12 post-save-seat-col" id="saveaseat">
						<div class="post-save-seat-title"><img src="<?php bloginfo('template_directory'); ?>/img/mobile_form_seat_icon.png" fakeurl="<?php bloginfo('template_directory'); ?>/img/mobile-form-arrow.png" class="post-form-icons-mobile post-form-icons-mobile-seat"><span class="mobile-form-save-title">שמור מקום</span></div>
						<div class="post-save-seat-form post-save-seat-landscape"><?php echo do_shortcode( '[contact-form-7 id="14" title="save a seat post mobile"]' ); ?></div>
					</div>
				</div>

				<div class="row makeanevent">
					<div class="col-lg-12 post-event-col" id="makeanevent">
						<div class="post-event-title post-event-title-pink"><img src="<?php bloginfo('template_directory'); ?>/img/mobile_form_event_icon.png" fakeurl="<?php bloginfo('template_directory'); ?>/img/mobile-form-arrow.png" class="post-form-icons-mobile post-form-icons-mobile-event"><span class="mobile-form-event-title">אירועים</span></div>
						<div class="post-event-form post-event-form-pink"><?php echo do_shortcode( '[contact-form-7 id="235" title="event post mobile"]' ); ?></div>
					</div>
				</div>

<!--
				<div class="row">
					<div class="col-lg-12 post-mobile-review-col">
						<a href="#hidden-main-title"><div class="post-mobile-review-col-title"><img src="<?php bloginfo('template_directory'); ?>/img/mobile_form_review_icon.png" class="post-form-icons-mobile post-form-icons-mobile-review">ביקורות</div></a>
					</div>
				</div>

-->

				<div class="row">
					<div class="col-lg-12 post-go-back">
						<div class="post-go-back-text"  onclick="history.go(-1);">
							<div class="post-back-arrow"><img src="<?php bloginfo('template_directory'); ?>/img/back_arrow.png" width="100%"></div>
							חזור לראות עוד מסעדות
						</div>
					</div>
				</div>

