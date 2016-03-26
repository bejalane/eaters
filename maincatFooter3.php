
						</div>
					</div>
				</div>
<!--
				<div class="page-menu-tags">
				   <?php dynamic_sidebar('contactform'); ?>
				</div>-->
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
					'walker' => new Custom_Walker_Category
				    );
				?>

				<ul>
					<?php wp_list_categories( $args ); ?>
				</ul>

				<div class="col-md-12 page-shadow-wrapper"><div class="page-shadow"></div></div>
			</div>
		</div>


</div>
	
<div class="fake-img" style="display:none;"><img class="cat-fake-img" src="<?php bloginfo('template_directory'); ?>/img/cat-fake-img1.png" alt=""></div>