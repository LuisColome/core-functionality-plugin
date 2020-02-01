<?php
/**
 * Core Functionality Plugin
 * 
 * @package			CoreFunctionality
 * @author		 	Luis Colomé
 * @link				https://github.com/Luisoncm/Core-functionality-plugin
 * @since      	0.0.8
 * @license    	GPL-2.0+
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists('lcm_crear_cpt_portfolio') ) {

	// Registramos el CPT
	function lcm_crear_cpt_portfolio() {

			$labels = array(
					'name'                => _x( 'Portfolio', 'Nombre general', 'cpt_portfolio' ),
					'singular_name'       => _x( 'Portfolio', 'Singular del CPT', 'cpt_portfolio' ),
					'menu_name'           => __( 'Portfolio', 'cpt_portfolio' ),
					'name_admin_bar'      => __( 'Portfolios', 'cpt_portfolio' ),
					'parent_item_colon'   => __( 'Portfolio padre:', 'cpt_portfolio' ),
					'all_items'           => __( 'Todos los portfolios', 'cpt_portfolio' ),
					'add_new_item'        => __( 'Añadir portfolio', 'cpt_portfolio' ),
					'add_new'             => __( 'Añadir portfolio', 'cpt_portfolio' ),
					'new_item'            => __( 'Nuevo portfolio', 'cpt_portfolio' ),
					'edit_item'           => __( 'Editar portfolio', 'cpt_portfolio' ),
					'update_item'         => __( 'Actualizar portfolio', 'cpt_portfolio' ),
					'view_item'           => __( 'Ver portfolio', 'cpt_portfolio' ),
					'search_items'        => __( 'Buscar portfolios', 'cpt_portfolio' ),
					'not_found'           => __( 'Portfolio no encontrado', 'cpt_portfolio' ),
					'not_found_in_trash'  => __( 'No se han encontrado portfolios en la papelera', 'cpt_portfolio' ),
			);
			$args = array(
					'label'               => __( 'Portfolio', 'cpt_portfolio' ),
					'description'         => __( 'CPT Portfolio para añadir trabajos y proyectos a tu WordPress', 'cpt_portfolio' ),
					'labels'              => $labels,
					'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', 'genesis-cpt-archives-settings', 'genesis-seo', 'genesis-scripts', 'genesis-layouts', 'genesis-rel-author'),
					'taxonomies'          => array( 'portfolio_cat' ),
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_rest'        => true,
					'menu_position'       => 20,
					'show_in_admin_bar'   => true,
					'show_in_nav_menus'   => true,
					'can_export'          => true,
					'has_archive'         => true,
					'rewrite' 			  => array('slug' => '/portfolio'),
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'page',
					'menu_icon' 		  => 'dashicons-art',
			);
			register_post_type( 'portfolio', $args );

	}

}

// Colocamos la función del CPT en el hook "init"
add_action( 'init', 'lcm_crear_cpt_portfolio', 0 );


if ( ! function_exists('lcm_cpt_portfolio_cat_taxonomy') ) {

	// Creamos una taxonomía, Tipos de noticias, para el CPT "Noticias". Jerárquica como las categorias de los posts
	function lcm_cpt_portfolio_cat_taxonomy() {

			$labels = array(
					'name'              => _x( 'Portfolio categories', 'taxonomy general name' ),
					'singular_name'     => _x( 'Portfolio category', 'taxonomy singular name' ),
					'search_items'      => __( 'Search portfolio categories' ),
					'all_items'         => __( 'All portfolio categories' ),
					'parent_item'       => __( 'Parent portfolio category' ),
					'parent_item_colon' => __( 'Parent portfolio category:' ),
					'edit_item'         => __( 'Edit portfolio category' ),
					'update_item'       => __( 'Update portfolio category' ),
					'add_new_item'      => __( 'Add New portfolio category' ),
					'new_item_name'     => __( 'New portfolio category Name' ),
					'menu_name'         => __( 'Portfolio categories' ),
			);

			$args = array(
					'hierarchical'      => true,
					'labels'            => $labels,
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'portfolio-cat' ),
			);

			// Colocamos la función de la taxonomía del CPT en el hook "init"
			register_taxonomy( 'portfolio_cat', 'portfolio', $args );

	}

}

add_action( 'init', 'lcm_cpt_portfolio_cat_taxonomy', 0 );