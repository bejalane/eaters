<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eaters</title>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/chosen.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/main.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
	<div class="container-fluid main-container">
		<div class="row">
			<div class="col-lg-12">

				 <div id="demo">

			          <div class="row">
			            <div class="col-lg-12">

			              <div id="owl-demo" class="owl-carousel">
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig1.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig2.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig3.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig4.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig1.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig2.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig3.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig4.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig1.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig2.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig3.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig4.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig1.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig2.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig3.jpg" alt="Owl Image"></div>
			                <div class="item"><img src="<?php bloginfo('template_directory'); ?>/img/mainbig4.jpg" alt="Owl Image"></div>
			              </div>
			            
			            </div>
			          </div>


			    </div>

			    <div class="main-overlay"></div>

			    <div class="main-hero">
			    	<div class="main-logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="eaters" width="100%"></div>
			    	<div class="main-description">WELCOME TO THE RESTAURANT PICER</div>
			    	<div class="main-func-buttons">
			    	 
			    		<form>
								 <?php
									$args = array(
										'show_option_none' => __( 'Select city' ),
										'show_count'       => 0,
										'orderby'          => 'name',
										'id'                 => '',

										'class'            => 'chosen-select',
										'tab_index'          => 2,
										
									);
								

					           wp_dropdown_categories( $args ); ?>

					          <!--<select data-placeholder="Choose a city" class="chosen-select" style="width:180px;" tabindex="2">

					            <option value=""></option>
					            <option value="United States" selected="selected">Tel Aviv</option>
					            <option value="United Kingdom">Jerusalem</option>
					            <option value="Afghanistan">Haifa</option>
					            <option value="Aland Islands">Ramat Gan</option>
					            <option value="Albania">Givataym</option>
					            <option value="Algeria">Holon</option>
					            <option value="American Samoa">Bat Yam</option>
					            <option value="Andorra">Hertsliya</option>
					            <option value="Angola">Raanana</option>
					            
					          </select>-->

					         
								  <script type="text/javascript">
								    var config = {
								      '.chosen-select'           : {},
								      '.chosen-select-deselect'  : {allow_single_deselect:false},
								      '.chosen-select-no-single' : {disable_search_threshold:10},
								      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
								      '.chosen-select-width'     : {width:"80%"}
								    }
								    for (var selector in config) {
								      $(selector).chosen(config[selector]);
								    }
								</script>

								<a href="page.html"><div id="main-submit" class="start-btn">LET'S START!</div></a>
					  	</form>
			    	</div>
			    </div>

			    <div class="gradient"><img src="<?php bloginfo('template_directory'); ?>/img/gradient.png" alt="" width="100%;"></div>

			</div>
		</div>
	</div>





</body>
</html>