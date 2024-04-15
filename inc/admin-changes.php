<?php
/**
 * Custom Admin Menu changes
 * 
 * @package    CoreFunctionality
 * @since      0.0.7
 * @license    GPL-2.0+
 */

// Not a WordPress context? Stop.
! defined( 'ABSPATH' ) and exit;


/**
 * Change Posts name to Blog articles in WP dashboard
 * 
 * @author Scott
 * @link https://wordpress.stackexchange.com/questions/49414/change-existing-label-in-the-admin-bar-with-something-else
 */
class chg_Posts_to_Articles
{
    public static function init()
    {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Blog articles';
        $labels->singular_name = 'Blog article';
        $labels->add_new = 'Add Blog article';
        $labels->add_new_item = 'Add new Blog article';
        $labels->edit_item = 'Edit Blog article';
        $labels->new_item = 'Blog articles';
        $labels->view_item = 'View Article';
        $labels->search_items = 'Search Blog articles';
        $labels->not_found = 'No Blog articles found';
        $labels->not_found_in_trash = 'No Blog articles found in trash';
        $labels->name_admin_bar = 'Blog article';
    }

    public static function admin_menu()
    {
        global $menu;
        global $submenu;
        $menu[5][0] = 'Blog articles';
        $submenu['edit.php'][5][0] = 'Blog articles';
        $submenu['edit.php'][10][0] = 'Add Blog article';
    }
}
add_action( 'init', array ( 'chg_Posts_to_Articles', 'init' ) );
add_action( 'admin_menu', array ( 'chg_Posts_to_Articles', 'admin_menu' ) );


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
 * Removes "Howdy" greeting text next to username in admin bar.
 * 
 */
function lcm_remove_howdy($wp_admin_bar) {
	$my_account = $wp_admin_bar->get_node('my-account');
	$wp_admin_bar->add_node(array(
		'id' => 'my-account',
		'title' => str_replace('Howdy, ', '', $my_account->title),
	));
}
add_action('admin_bar_menu', 'lcm_remove_howdy', 10, 1);

/**
 * Add a link to plugins page under the (Home icon) site name in the admin bar on the frontend.
 * 
 */
// function lcm_add_plugin_link_to_admin_bar() {
// 	global $wp_admin_bar;

//     if ( !is_admin() ) {
//         $wp_admin_bar->add_menu( array(
//             'parent' => 'site-name', // site-name is the ID for home menu so we use it as the parent ID.
//             'id' => 'custom_plugins_link', // You can add any value here as you are adding something very new here.
//             'title' => __( 'Plugins' ), // The anchor text.
//             'href' => home_url() . '/wp-admin/plugins.php', // URL to plugins page.
//             'meta'  => array(
//                 'target' => '_self', // Open in another tab.
//             ),
//         ));
//     }
// }
// add_action( 'wp_before_admin_bar_render', 'lcm_add_plugin_link_to_admin_bar' );

/**
 * Add a link to Reusable blocks nn Apperance menu.
 * 
 * @since 1.0.1.2
 */
// function add_custom_link_into_appearnace_menu() {
//     global $submenu;
//     $permalink = home_url() . '/wp-admin/edit.php?post_type=wp_block';
//     $submenu['themes.php'][] = array( 'Reusable Blocks', 'manage_categories', $permalink );
// }
// add_action('admin_menu', 'add_custom_link_into_appearnace_menu');