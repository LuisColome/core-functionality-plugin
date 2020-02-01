<?php
/**
 * Core Functionality Plugin
 * 
 * @package    CoreFunctionality
 * @since      0.0.7
 * @license    GPL-2.0+
 */

 /*--------------------------------------------*
 * Custom Admin Menu changes
 *--------------------------------------------*/

// Rename Posts to Articles in Menu
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Blog Articles';
	$submenu['edit.php'][5][0] = 'Blog Articles';
	$submenu['edit.php'][10][0] = 'Add New ';
}
add_action( 'admin_menu', 'change_post_menu_label' );