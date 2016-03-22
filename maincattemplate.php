<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 page-item" data-position="<?php
												if (function_exists('wp_ulike_get_post_likes')):
												    echo wp_ulike_get_post_likes(get_the_ID());
												endif;
											?>">
							<div class="page-item-wrapper">
										<div class="item-distance"></div>
										<div class="item-lat"><?php $key="latitude"; echo get_post_meta($post->ID, $key, true); ?></div>
										<div class="item-lon"><?php $key="longitude"; echo get_post_meta($post->ID, $key, true); ?></div>

									<div class="page-item-slider-wrapper">
					              		<div class="page-item-slider">
											<a href="<?php echo get_post_permalink(); ?>" id="post<?php the_ID(); ?>">
								                <ul class="page-item-slides page-item-slide-<?php the_ID(); ?>">
								                    <?php $key="thumbnail_pics"; echo get_post_meta($post->ID, $key, true); ?>
								                </ul>
											</a>
						           		</div>
						           		<div class="slides-container" style="display:none;">
						           			
						           		</div>
						           	</div>
								
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
											<div class="page-item-waze cat-icon"><a target="_blank" class="mobile-waze-cat" data-lat="<?php the_field('latitude'); ?>" data-long="<?php the_field('longitude'); ?>" href="waze://?ll="><img src="<?php bloginfo('template_directory'); ?>/img/waze_icon.png" width="60px"></a></div>
											<div class="page-item-waze cat-icon"><a href=""><img src="<?php bloginfo('template_directory'); ?>/img/get_taxi_icon.png" width="60px"></a></div>
											<div class="page-item-seat-wrapper"><a href="<?php echo get_post_permalink(); ?>/#saveaseat" class="page-item-seat-btn">שמור מקום</a></div>
										</div>
									</div>
									
																		
								</div>
							</div>
						</div>