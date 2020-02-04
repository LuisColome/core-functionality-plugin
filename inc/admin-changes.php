<?php
/**
 * Core Functionality Plugin
 * 
 * Custom Admin Menu changes
 * 
 * @package    CoreFunctionality
 * @since      0.0.7
 * @license    GPL-2.0+
 */

/**
 * Rename Posts to Articles in Menu
 * 
 */
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Blog Articles';
	$submenu['edit.php'][5][0] = 'Blog Articles';
	$submenu['edit.php'][10][0] = 'Add New ';
}
add_action( 'admin_menu', 'change_post_menu_label' );


/**
 * Remove items from admin bar
 * 
 */ 
add_action( 'admin_bar_menu', 'lcm_remove_nodes', 999 );
function lcm_remove_nodes(){
	
	global $wp_admin_bar;

	// WordPress Core Items (uncomment to remove)
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('updates');
	//$wp_admin_bar->remove_node('site-name');
	//$wp_admin_bar->remove_node('my-account');
	//$wp_admin_bar->remove_node('search');
	//$wp_admin_bar->remove_node('customize');

}

/**
 * Login Logo URL
 *
 */
function ea_login_header_url( $url ) {
	return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'ea_login_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );