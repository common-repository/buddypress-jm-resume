<?php
/**
 * Don't load this file directly!
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Implementation of JM_Resume_Bp_Resume_Loader
 *
 * @package BuddyPress_JM_Resume_Component
 * @author kishore
 */
if ( !class_exists( 'JM_Resume_Bp_Resume_Loader' ) ) {
	class JM_Resume_Bp_Resume_Loader extends BP_Component {
            
                /**
                 * Start the messages component creation process
                 *
                 * @since BuddyPress (1.5)
                 */
                private $sub_nav_items;
                static $resumes_slug = 'resumes';
                private $menu_order = 85;
                public function __construct() {
                    
                        parent::start(
                                'resume',
                                __( 'My Resume', 'buddypress_jm_resume' ),
                               BUDDYPRESS_JM_RESUME_PATH,
                                array(
                                    'adminbar_myaccount_order' => 999999
                                )
                        );
                        $this->includes();
                }
        
	
                /**
                 * Include files
                 *
                 * @global BuddyPress $bp The one true BuddyPress instance
                 */
                public function includes( $includes = array() ) {
                    
                       $includes = array(
							'screens',
							'functions',
						);

                       
                        parent::includes( $includes );
                }
                
                /**
                 * Setup globals
                 *
                 * The BP_MESSAGES_SLUG constant is deprecated, and only used here for
                 * backwards compatibility.
                 *
                 * @since BuddyPress (1.5)
                 */
                public function setup_globals( $args = array() ) {
                        $bp = buddypress();

                        // Define a slug, if necessary
                        if ( !defined( 'BP_RESUME_SLUG' ) )
                                define( 'BP_RESUME_SLUG', $this->id );

                       

                        // All globals for messaging component.
                        // Note that global_tables is included in this array.
                        $globals = array(
                                'slug'                  => BP_RESUME_SLUG,
                                'has_directory'         => false,
                                'notification_callback' => 'messages_format_notifications',
                                'search_string'         => __( 'Search Messages...', 'buddypress_jm_resume' ),
                                
                        );

                        $this->autocomplete_all = defined( 'BP_MESSAGES_AUTOCOMPLETE_ALL' );

                        parent::setup_globals( $globals );
                }
        
		/**
		 * Set up your component's navigation.
		 *
		 * The navigation elements created here are responsible for the main site navigation (eg
		 * Profile > Activity > Mentions), as well as the navigation in the BuddyBar. WP Admin Bar
		 * navigation is broken out into a separate method; see
		 * BP_Example_Component::setup_admin_bar().
		 *
		 * @global obj $bp
		 */
		function setup_nav( $nav = array(), $sub_nav = array() ) {
            if ( ! class_exists( 'WP_Job_Manager' ) )
                return;
            if ( ! class_exists( 'WP_Resume_Manager' ) )
                return;


			
            $nav_name = __( 'My Resume', 'buddypress_jm_resume' );

			// Add 'hrm' to the main navigation
			$main_nav = array(
				'name' 		      => __( 'My Resume', 'buddypress_jm_resume' ),
				'slug' 		      => $this->id,
				'position' 	      => $this->menu_order,
				'screen_function'     => 'bp_jm_resumes',
				'default_subnav_slug' => 'resume',
			);

            // Determine user to use
            if ( bp_displayed_user_domain() ) {
                    $user_domain = bp_displayed_user_domain();
            } elseif ( bp_loggedin_user_domain() ) {
                    $user_domain = bp_loggedin_user_domain();
            } else {
                    return;
            }

            $resume_manager_link = trailingslashit( $user_domain . $this->slug );
        
            // Add Candidate Dashboard nav item
            if ( class_exists( 'WP_Resume_Manager' ) ) {
                $sub_nav[] = array(
                    'name'            => __( 'My Resumes', 'buddypress-job-manager' ),
                    'slug'            => 'resume',
                    'parent_url'      => $resume_manager_link,
                    'parent_slug'     => $this->slug,
                    'screen_function' => 'bp_jm_resumes',
                    'position'        => 30,
                    // 'user_has_access' => bp_core_can_edit_settings()
                );
            }

            
            // Add Resumes nav item
            if ( class_exists( 'WP_Resume_Manager' ) ) {
                $sub_nav[] = array(
                    'name'            => __( 'Resumes Listings', 'buddypress' ),
                    'slug'            => 'resume-listings',
                    'parent_url'      => $resume_manager_link,
                    'parent_slug'     => $this->slug,
                    'screen_function' => 'bp_jm_resume_listings',
                    'position'        => 40,
                    'user_has_access' => bp_core_can_edit_settings()
                );
                
            }
            
                  
			
			parent::setup_nav( $main_nav, $sub_nav );

		}
		

	
	}
}
$GLOBALS['jm_resume_bp_resume_loader'] = new JM_Resume_Bp_Resume_Loader();