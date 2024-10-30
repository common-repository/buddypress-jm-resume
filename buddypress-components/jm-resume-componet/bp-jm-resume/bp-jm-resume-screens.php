<?php

/********************************************************************************
 * Screen Functions
 *
 * Screen functions are the controllers of BuddyPress. They will execute when their
 * specific URL is caught. They will first save or manipulate data using business
 * functions, then pass on the user to a template file.
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * If your component uses a top-level directory, this function will catch the requests and load
 * the index page.
 *
 * @package BuddyPress_Template_Pack
 * @since 1.6
 */
function bp_jm_screen() {
	if ( bp_is_current_component( 'resume' ) ){
    	bp_core_load_template( 'members/single/plugins'  );
	}	
}
add_action( 'bp_screens', 'bp_jm_screen' );

function bp_jm_resumes() { 
	add_action('bp_template_content','load_projects_template');
}

function load_projects_template() {
    include  BUDDYPRESS_JM_RESUME.'/templates/jm-resume.php';
}

function bp_jm_resume_listings() { 
	add_action('bp_template_content','load_resume_listings_template');
}

function load_resume_listings_template() {
    include  BUDDYPRESS_JM_RESUME.'/templates/jm-resume-listings.php';
}

?>