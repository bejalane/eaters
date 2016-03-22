
				<div class="row">
					<div class="col-lg-12">

						<div class="page-header-single">
						   <div class="page-logo-single">
						   		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></a>
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
						
						<div class="post-reg-full-info-wrapper">

							<div class="post-reg-info-head">
								<div class="post-reg-info-wrapper">
									<div class="post-reg-info-fb-like"><div class="fb-like" data-href="https://www.facebook.com/Peppermagazin/?fref=ts" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
									<div class="post-reg-info-forms-col">
										<div class="post-reg-forms-logo">
											
											<?php 
												$image = get_field('restraunt_logo');
												if( !empty($image) ): ?>
													<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
												<?php endif; ?>

										</div>
										<div class="post-reg-forms-block">
											<div class="post-reg-form-wrapper">
												<div class="post-reg-forms-block-title">שמור מקום</div>
													<div class="post-reg-forms-seat"><?php echo do_shortcode('[contact-form-7 id="867" title="save a seat post"]'); ?></div>
													<div class="post-reg-forms-event"><?php echo do_shortcode('[contact-form-7 id="868" title="event post"]'); ?></div>
													<div class="post-reg-forms-block-event-btn">קבל הצעת מחיר לאירוע</div>
											</div>
											
										</div>
									</div>

									<div class="post-reg-info-text-col">
										<div class="post-reg-info-title-wrapper">
											
											<div class="post-reg-info-likes"></div>
										</div>

										<div class="post-reg-info-text-wrapper">

											<div class="post-reg-info-address">
												<div class="post-reg-info-title"><?php the_title(  ); ?></div>

												<img class="post-reg-info-address-loc" src="<?php bloginfo('template_directory'); ?>/img/colors/"><?php $key="address"; echo get_post_meta($post->ID, $key, true); ?>
												<br><img class="post-reg-info-address-phone" src="<?php bloginfo('template_directory'); ?>/img/colors/"><?php $key="phone_numbers"; echo get_post_meta($post->ID, $key, true); ?>
												<div class="post-reg-info-kosher post-reg-info-kosher-second"><img src="<?php bloginfo('template_directory'); ?>/img/colors/" alt=""><?php the_field('kosher'); ?></div>
											</div>
											<div class="post-reg-info-hours">
												<div class="post-opening-hours-title">אז מתי אנחנו פתוחים?</div>
												<div class="post-opening-hours">ראשון-חמישי: <?php $key="opening_hours_sun-thu"; echo get_post_meta($post->ID, $key, true); ?><br>
												שישי: <?php $key="opening_hours_fri"; echo get_post_meta($post->ID, $key, true); ?><br>
												שבת: <?php $key="opening_hours_sat"; echo get_post_meta($post->ID, $key, true); ?></div>
											</div>
											<div class="post-reg-info-text"><span class="quotes-symb">"</span><?php $key="quote"; echo get_post_meta($post->ID, $key, true); ?><span class="quotes-symb">"</span></br>
											 <?php $key="quote_author"; echo get_post_meta($post->ID, $key, true); ?> </div>
										</div>
									</div>

									

								</div>
							</div>

							<div class="post-reg-buttons">
								<div class="post-reg-buttons-wrapper">
									<div class="post-reg-btn post-reg-btn-map">מפה</div>
									<div class="post-reg-btn post-reg-menu"><a target="_blank" href="<?php the_field('cafe-menu'); ?>" data-link="<?php the_field('cafe-menu-link'); ?>" class="post-reg-menu-link">תפריט</a></div>
								</div>
							</div>
						</div>

						<div class="post-reg-rslider-wrapper">
							<div class="post-reg-rslider-wrapper-1300">
								<ul class="rslides" id="slider4">
							    	

							    </ul>

							    <div class="post-reg-map-block">
									<?php $key="map"; echo get_post_meta($post->ID, $key, true); ?>
								</div>
						    </div>

						    
						</div>

						<div class="post-reg-description-block">
								<div class="post-reg-description-wrapper">
									<div class="post-reg-description-quote-right"><img src="<?php bloginfo('template_directory'); ?>/img/colors/" width="100%"></div>
									<?php $key="description"; echo get_post_meta($post->ID, $key, true); ?>
									<div class="post-reg-description-quote-left"><img src="<?php bloginfo('template_directory'); ?>/img/colors/" width="100%"></div>
								</div>
							</div>

						

						

						<div class="post-reg-features-wrapper">
							<ul class="post-reg-features">
									<li><?php $key="feature1"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png"><?php $key="feature2"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png"><?php $key="feature3"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><img class="arrow-list" src="<?php bloginfo('template_directory'); ?>/img/arrow-list.png"><?php $key="feature4"; echo get_post_meta($post->ID, $key, true); ?></li>
							</ul>
						</div>

						<div class="receipe-popup-box">
								
							</div>

					</div>
				</div>
			</div>
	</div>
