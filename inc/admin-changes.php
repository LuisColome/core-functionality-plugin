<?php
/**
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
add_action( 'admin_bar_menu', 'lcm_remove_nodes', 999 );


/**
 * Add a link to plugins page under the (Home icon) site name in the admin bar on the frontend.
 * 
 */
function lcm_add_plugin_link_to_admin_bar() {
	global $wp_admin_bar;

    if ( !is_admin() ) {
        $wp_admin_bar->add_menu( array(
            'parent' => 'site-name', // site-name is the ID for home menu so we use it as the parent ID.
            'id' => 'custom_plugins_link', // You can add any value here as you are adding something very new here.
            'title' => __( 'Plugins' ), // The anchor text.
            'href' => home_url() . '/wp-admin/plugins.php', // URL to plugins page.
            'meta'  => array(
                'target' => '_self', // Open in another tab.
            ),
        ));
    }
}
add_action( 'wp_before_admin_bar_render', 'lcm_add_plugin_link_to_admin_bar' );

/**
 * Add a link to Reusable blocks nn Apperance menu.
 * 
 */
function add_custom_link_into_appearnace_menu() {
    global $submenu;
    $permalink = home_url() . '/wp-admin/edit.php?post_type=wp_block';
    $submenu['themes.php'][] = array( 'Reusable Blocks', 'manage_categories', $permalink );
}
add_action('admin_menu', 'add_custom_link_into_appearnace_menu');