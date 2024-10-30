<?php
/**
 * Don't load this file directly!
 */
if ( ! defined( 'ABSPATH' ) )
	exit;

/**
 * Description of JM_Resume_Bp_Resume
 *
 * @author kishore
 */
if ( ! class_exists( 'JM_Resume_Bp_Resume' ) ) {
    
    class JM_Resume_Bp_Resume {
        
        function __construct() {
        	global $bp;
           
            // Define constants
            $this->define_constants();

            // Include required files
            $this->includes();
        }
        
        function includes() {
        	// Includes
			include( BUDDYPRESS_JM_RESUME .'bp-jm-resume/class-jm-resume-bp-resume-loader.php' );
			include( BUDDYPRESS_JM_RESUME .'bp-jm-resume/bp-jm-resume-screens.php' );
			include( BUDDYPRESS_JM_RESUME .'bp-jm-resume/bp-jm-resume-functions.php' );
			include( BUDDYPRESS_JM_RESUME .'class-jm-resumes-links.php' );
            
        }
        
        function define_constants() {
        	if ( ! defined( 'BUDDYPRESS_JM_RESUME_PATH' ) ){
			        define( 'BUDDYPRESS_JM_RESUME_PATH', plugin_dir_path( __FILE__ ) );
			}
        }
    
    }
    
}

$GLOBALS['jm_resume_bp_resume'] = new JM_Resume_Bp_Resume();