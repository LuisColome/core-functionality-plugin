<?php
/**
 * Core Functionality Plugin
 * 
 * @package		CoreFunctionality
 * @author		Luis Colomé
 * @link		https://github.com/Luisoncm/Core-functionality-plugin
 * @since      	0.0.8
 * @license    	GPL-2.0+
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists('lcm_create_cpt_team') ) {

	// Registramos el CPT
	function lcm_create_cpt_team() {

			$labels = array(
					'name'                => _x( 'Team', 'Nombre general', 'cpt_team' ),
					'singular_name'       => _x( 'Team member', 'Singular del CPT', 'cpt_team' ),
					'menu_name'           => __( 'Team', 'cpt_team' ),
					'name_admin_bar'      => __( 'Team member', 'cpt_team' ),
					'parent_item_colon'   => __( 'Team parent:', 'cpt_team' ),
					'all_items'           => __( 'All team members', 'cpt_team' ),
					'add_new_item'        => __( 'Add team member', 'cpt_team' ),
					'add_new'             => __( 'Add team member', 'cpt_team' ),
					'new_item'            => __( 'New team member', 'cpt_team' ),
					'edit_item'           => __( 'Edit team member', 'cpt_team' ),
					'update_item'         => __( 'Update team member', 'cpt_team' ),
					'view_item'           => __( 'See team member', 'cpt_team' ),
					'search_items'        => __( 'Search team members', 'cpt_team' ),
					'not_found'           => __( 'Team member not found', 'cpt_team' ),
					'not_found_in_trash'  => __( 'Team members not found in trash', 'cpt_team' ),
			);
			$args = array(
					'label'               => __( 'Team', 'cpt_team' ),
					'description'         => __( 'Team CPT for White River Manor website', 'cpt_team' ),
					'labels'              => $labels,
					'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'genesis-seo', 'genesis-scripts', 'genesis-layouts', 'genesis-rel-author'),
					'taxonomies'          => array( 'team_cat' ),
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_rest'        => true,
					'menu_position'       => 20,
					'show_in_admin_bar'   => true,
					'show_in_nav_menus'   => true,
					'can_export'          => true,
					'has_archive'         => false,
					'rewrite' 			  => array('slug' => '/team'),
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'page',
					'menu_icon' 		  => 'dashicons-groups',
			);
			register_post_type( 'team', $args );

	}

}

// Colocamos la función del CPT en el hook "init"
add_action( 'init', 'lcm_create_cpt_team', 0 );


if ( ! function_exists('lcm_cpt_team_cat_taxonomy') ) {

	// Creamos una taxonomía, Tipos de noticias, para el CPT "Noticias". Jerárquica como las categorias de los posts
	function lcm_cpt_team_cat_taxonomy() {

			$labels = array(
					'name'              => _x( 'Team categories', 'taxonomy general name' ),
					'singular_name'     => _x( 'Team category', 'taxonomy singular name' ),
					'search_items'      => __( 'Search team categories' ),
					'all_items'         => __( 'All team categories' ),
					'parent_item'       => __( 'Parent team category' ),
					'parent_item_colon' => __( 'Parent team category:' ),
					'edit_item'         => __( 'Edit team category' ),
					'update_item'       => __( 'Update team category' ),
					'add_new_item'      => __( 'Add New team category' ),
					'new_item_name'     => __( 'New team category Name' ),
					'menu_name'         => __( 'Team categories' ),
			);

			$args = array(
					'hierarchical'      => true,
					'labels'            => $labels,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_rest'      => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'team-cat' ),
			);

			// Colocamos la función de la taxonomía del CPT en el hook "init"
			register_taxonomy( 'team_cat', 'team', $args );

	}

}

add_action( 'init', 'lcm_cpt_team_cat_taxonomy', 0 );