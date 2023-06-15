<?php
/**
 * Plugin Name: WordPress Core Functionality
 * GitHub Plugin URI: https://github.com/Luisoncm/Core-functionality-plugin
 * Description: <strong>DO NOT DISABLE!</strong> This contains all your site's core functionality so that it is theme independent.
 * Version: 1.0.2
 * Author: Luis Colomé
 * Author URI: http://www.luiscolome.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 */

// Don't load directly
if (!defined('ABSPATH')) { exit; }

// Plugin Directory 
define( 'LCM_DIR', dirname( __FILE__ ) );

require_once( LCM_DIR . '/inc/general.php'); // General
// require_once( LCM_DIR . '/inc/cpt-portfolio.php'); // Portfolio CPT
// require_once( LCM_DIR . '/inc/cpt-team.php'); // Team CPT
require_once( LCM_DIR . '/inc/admin-changes.php'); // Admin changes
require_once( LCM_DIR . '/inc/custom.php'); // Tags and categories support.
require_once( LCM_DIR . '/inc/kill-pingbacks.php'); // Removing and killing pingbacks.
require_once( LCM_DIR . '/inc/category-fix.php'); // Category pagination fix.
