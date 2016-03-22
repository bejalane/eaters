<div class="ulike-wrapper">
	<div class="ulike-title">תאהבו אותנו! <span> &#10095;</span></div>
  <div class="back-arrow" onclick="history.go(-1);" title="חזור לראות עוד מסעדות"></div>
  <?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
</div>

<div class="show_cf" style="display:none;"><?php the_field('show_contact_forms'); ?></div>