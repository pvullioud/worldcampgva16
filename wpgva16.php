<?php
/*
* Plugin Name: wpgva16
* Plugin URI: https://watchful.li
* Description: ho API day
* Version: 0.1
* Author: watchful
* Author URI: https://watchful.li
* License: GPL
* */

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

include_once 'autoloader.php';
add_action('init', 'wpgva_rest_init');

/**
 * Init JSON REST API routes.
 */
function wpgva_rest_init()
{
    $class = new Wpgva\Routes();
    add_filter( 'rest_api_init', array( $class, 'register_routes' ) );
}
