<?php get_header(); ?>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="container-fluid main-container single-container">
		<div class="row">
			<div class="col-lg-12">

				
				<div class="page-header-single">
				   <div class="page-logo-single">
				   		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo3.png" alt="eaters" width="100%"></a>
				   </div>
				</div>
<!-- MOBILE TITLE -->
				<div class="row">
					<div class="col-md-12 hidden-for-portrait hidden-post-title"  id="hidden-main-title">
						<div class="post-title"><?php the_title(  ); ?>
							<a href="<?php $key="phone numbers"; echo get_post_meta($post->ID, $key, true); ?>"><div class="hidden-post-call-us"><img src="<?php bloginfo('template_directory'); ?>/img/mobile-call-icon.png" width="40px"></div></a>
						</div>
					</div>
				</div>
<!--END OF MOBILE TITLE -->




<!-- SLIDER COLUMN-->
					<div class="col-lg-7 col-md-7 col-sm-12 post-col-picture">

						<!--SLIDER-->
						<div id="demo">
					            <div id="owl-demo" class="owl-carousel">
					                <div class="item"><img src="<?php $key="img1"; echo get_post_meta($post->ID, $key, true); ?>"></div>
					                <div class="item"><img src="<?php $key="img2"; echo get_post_meta($post->ID, $key, true); ?>"></div>
					                <div class="item"><img src="<?php $key="img3"; echo get_post_meta($post->ID, $key, true); ?>"></div>
					                <div class="item"><img src="<?php $key="img4"; echo get_post_meta($post->ID, $key, true); ?>"></div>
					        	</div>
					    </div>



					    <!--MAP-->
					    <div class="post-map-display">
					    	<div class="post-close-map-block">
					    		<img class="post-close-map-arrow" src="<?php bloginfo('template_directory'); ?>/img/map_arrow_pink.png">
					    	</div>
					    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8040.028455745208!2d34.78016534913113!3d32.08505285369076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d4ca6193b7c1f%3A0xc1fb72a2c0963f90!2sTel+Aviv-Yafo!5e0!3m2!1sen!2sil!4v1445943823260" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
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
						    			<?php comments_template(); ?>
						    	</div>

					    	</div>
					    </div>

					</div>
<!-- END OF SLIDER COLUMN-->

					


<!-- COLOUR COLUMN WITH INFO-->
					<div class="col-lg-5 col-md-5 col-sm-12 post-col-text visible-for-landscape">
					<!--FACEBOOK-->
							<div class="post-facebook">
								<!--<div class="post-facebook-button"><i class="fa fa-facebook"></i></div>-->
								<div class="fb-share-button" data-href="<?php echo post_permalink( $ID ); ?>" data-layout="button"></div>
							</div>
						<div class="post-col-text-wrapper">
							

							<!--MAIN INFO-->
							<div class="post-title"><?php the_title(  ); ?></div>
							<div class="post-address"><?php $key="address"; echo get_post_meta($post->ID, $key, true); ?></div>
							<div class="post-phone"><?php $key="phone numbers"; echo get_post_meta($post->ID, $key, true); ?></div>
							<hr>

							<div class="post-description">
								<?php $key="description"; echo get_post_meta($post->ID, $key, true); ?>
							</div>

							<div class="opening-hours-block">
								<div class="post-opening-hours-title">שעות פתיחה</div>
								<div class="post-opening-hours">ראשון-חמישי: <?php $key="opening hours sun-thu"; echo get_post_meta($post->ID, $key, true); ?><br>
									שישי: <?php $key="opening hours fri"; echo get_post_meta($post->ID, $key, true); ?><br>
									שבת: <?php $key="opening hours sat"; echo get_post_meta($post->ID, $key, true); ?>
								</div>
							</div>

							
							
							<!--FEATURES-->
							<!--
							<ul class="post-features">
								<li><?php $key="feature1"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><?php $key="feature2"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><?php $key="feature3"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><?php $key="feature4"; echo get_post_meta($post->ID, $key, true); ?></li>
							</ul>
							-->

							<ul class="post-features-hidden">
								<li><?php $key="feature1"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><?php $key="feature2"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><?php $key="feature3"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><?php $key="feature4"; echo get_post_meta($post->ID, $key, true); ?></li>
							</ul>


							<!--BUTTONS-->
							<a href="tel:<?php $key="phone number"; echo get_post_meta($post->ID, $key, true); ?>" class="post-call-us-btn"><div class="post-call-us"><img src="<?php bloginfo('template_directory'); ?>/img/callus.png" width="27px"> Call Us</div></a>
							<div class="post-map-btn post-buttons"><img class="post-button-icon post-button-icon-map" src="<?php bloginfo('template_directory'); ?>/img/map_icon_pink.png" width="">מפה</div>
							<a href="#makeanevent"><div class="post-make-event-btn post-buttons"><img class="post-button-icon post-button-icon-event" src="<?php bloginfo('template_directory'); ?>/img/event_icon_pink.png">אירועים</div></a>
							<div class="post-review-btn post-buttons"><img class="post-button-icon post-button-icon-review" src="<?php bloginfo('template_directory'); ?>/img/review_icon_pink.png">ביקורות</div>
							

						</div>
					</div>
<!-- END OF COLOUR COLUMN WITH INFO-->

					

<!-- MOBILE COLOUR COLUMN WITH INFO-->
						<div class="hidden-info-col-wrapper">
							

							<div class="col-md-6 col-sm-6 col-xs-6 hidden-for-portrait hidden-post-features">
								<ul class="post-features">
									<li><?php $key="feature1"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><?php $key="feature2"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><?php $key="feature3"; echo get_post_meta($post->ID, $key, true); ?></li>
									<li><?php $key="feature4"; echo get_post_meta($post->ID, $key, true); ?></li>
								</ul>
							</div>
							
							<div class="col-md-6 col-sm-6 col-xs-6 hidden-for-portrait hidden-post-address">
								<div class="post-address"><?php $key="address"; echo get_post_meta($post->ID, $key, true); ?></div>
								<div class="post-opening-hours-title">שעות פתיחה</div>
								<div class="post-opening-hours">א׳ – ה׳ : <?php $key="opening hours sun-thu"; echo get_post_meta($post->ID, $key, true); ?><br>
										ו' : <?php $key="opening hours fri"; echo get_post_meta($post->ID, $key, true); ?><br>
										ש' : <?php $key="opening hours sat"; echo get_post_meta($post->ID, $key, true); ?></div>
							</div>
							
						</div>
					</div>

				</div><!--main lg-12-->
<!-- END OF MOBILE COLOUR COLUMN WITH INFO-->			

				<div class="row">
					<div class="col-lg-12 post-save-seat-col" id="saveaseat">
						<div class="post-save-seat-title">שמור מקום</div>
						<div class="post-save-seat-form post-save-seat-landscape"><?php echo do_shortcode( '[contact-form-7 id="14" title="annati bistro seat"]' ); ?></div>
					</div>
				</div>

				<div class="row makeanevent">
					<div class="col-lg-12 post-event-col" id="makeanevent">
						<div class="post-event-title post-event-title-pink">אירועים</div>
						<div class="post-event-form post-event-form-pink"><?php echo do_shortcode( '[contact-form-7 id="235" title="event"]' ); ?></div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 post-mobile-review-col">
						<a href="#hidden-main-title"><div class="post-mobile-review-col-title">ביקורות</div></a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12 post-go-back">
						<div class="post-go-back-text"  onclick="history.go(-1);">
							<div class="post-back-arrow"><img src="<?php bloginfo('template_directory'); ?>/img/back_arrow.png" width="100%"></div>
							חזור לראות עוד מסעדות
						</div>
					</div>
				</div>






				
			</div>
		</div>
	</div>
	

	<style>
    body{
      margin: 0;
    }
    #owl-demo .item img{
        display: block;
       
        height: 100%;
    }

    .submit-top-form {
      background-color: #E4007D;
    }


    </style>


    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({

      autoPlay: 5000,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
      pagination : true


      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
    });
    </script>

<?php get_footer(); ?>