<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div role="main" class="profile single single-resume">		
	<div class="bp-widget base buddypress_jm_resume">
		<div class="hr-title hr-full hr-double"><abbr><?php // _e( 'My Resume', 'buddypress_jm_resume' ); ?></abbr></div>
		<div class="gap-10"></div>
      <?php global $jm_resume_bp_resume_links;
			$jm_resume_bp_resume_links->display_user_resume_ref();
	  ?>
	  <div class="hr-title hr-full hr-double"><abbr><?php // _e( 'Resume Listing', 'buddypress_jm_resume' ); ?></abbr></div>
	  <?php
			// include  file or echo do_shortcode
    		// echo do_shortcode( '[resumes]' );
	  ?>
	</div><!-- end bp-widget -->
</div>