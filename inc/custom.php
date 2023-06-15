<?php 
/**
 * Custom file
 *
 * @package      CoreFunctionality
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Add support for tags and categories to pages.
function add_categories_to_pages() {
    register_taxonomy_for_object_type('category', 'page');
    register_taxonomy_for_object_type('post_tag', 'page');
}
add_action( 'init', 'add_categories_to_pages' );