<?php
/**
 * Core Functionality Plugin
 * 
 * @package    CoreFunctionality
 * @since      0.0.1
 * @license    GPL-2.0+
 */

 
 /**
 * Dont Update the Plugin
 * If there is a plugin in the repo with the same name, this prevents WP from prompting an update.
 *
 * @since  1.0.0
 * @author Jon Brown
 * @param  array $r Existing request arguments
 * @param  string $url Request URL
 * @return array Amended request arguments
 */
function be_dont_update_core_func_plugin( $r, $url ) {
  if ( 0 !== strpos( $url, 'https://api.wordpress.org/plugins/update-check/1.1/' ) )
    return $r; // Not a plugin update request. Bail immediately.
    $plugins = json_decode( $r['body']['plugins'], true );
    unset( $plugins['plugins'][plugin_basename( __FILE__ )] );
    $r['body']['plugins'] = json_encode( $plugins );
    return $r;
 }
add_filter( 'http_request_args', 'be_dont_update_core_func_plugin', 5, 2 );

// Use shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );


// Don't let WPSEO metabox be high priority
add_filter( 'wpseo_metabox_prio', function(){ return 'low'; } );

/**
 * Remove WPSEO Notifications
 * Just in case we work with Yoast SEO plugin
 *
 */
function ea_remove_wpseo_notifications() {

	if( ! class_exists( 'Yoast_Notification_Center' ) )
		return;
		
	remove_action( 'admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
	remove_action( 'all_admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
}
add_action( 'init', 'ea_remove_wpseo_notifications' );


/**
 * Remove Contact Form 7 scripts and styles
 * Load Contact Form 7 sripts and styles only where it's nedeed.
 *
 */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

function custom_contact_script_conditional_loading(){
	
	//  Edit page IDs here
	if( is_page( array () ) ) {
	
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
				wpcf7_enqueue_scripts();
		}

		if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
				wpcf7_enqueue_styles();
		}
			
	}
}
//add_action( 'wp_enqueue_scripts', 'custom_contact_script_conditional_loading' );