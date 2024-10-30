<?php
/*
Plugin Name: BuddyPress JM Resume
Plugin URI: http://opentuteplus.com/buddypress-jm-resume/
Description: This BuddyPress component is for adding resume links in user profile ( for BuddyPress ). This plugin needs BuddyPress,WP Job Manager,WP Job Manager - Applications,WP Job Manager - Resume Manager.
Author: Kishore
Author URI: http://blog.kishorechandra.co.in/
Version: 1.0.3
Requires at least: WP 3.8, BuddyPress 2.1.1
Tested up to: 4.3
Network: true
Text Domain: buddypress_jm_resume
Domain Path: /languages/

Copyright: 2014 Kishore Sahoo
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! defined( 'BUDDYPRESS_JM_RESUME ' ) ) {
	define( 'BUDDYPRESS_JM_RESUME', plugin_dir_path( __FILE__ ) . 'buddypress-components/jm-resume-componet/' );
}

/**
 * Localisation
 */
load_plugin_textdomain( 'buddypress_jm_resume', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

function init_jm_bp_component(){
    include( BUDDYPRESS_JM_RESUME .'class-jm-resume-bp-resume.php' );
}

add_action( 'bp_loaded', 'init_jm_bp_component', 40 );
