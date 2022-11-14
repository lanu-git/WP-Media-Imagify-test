<?php

/**
 * Theme function
 * 
 * @package Imagify
 */

/**
 * Add stylesheets and scripts
 */
if (!defined('IMAGIFY_DIR')) {
    define('IMAGIFY_DIR', untrailingslashit(get_template_directory()));
}

if (!defined('IMAGIFY_BASE')) {
    define('IMAGIFY_BASE', untrailingslashit(get_template_directory_uri()));
}


require_once IMAGIFY_DIR . '/vendor/autoload.php';


function imagify_theme_instance() {
    \Imagify\Classes\Imagify::get_instance();
}
imagify_theme_instance();

/**
 * Enqueue styles and script of the theme
 */
function imagify_enqueies() {

}

add_action('wp_enqueue_scripts', 'imagify_enqueies');
