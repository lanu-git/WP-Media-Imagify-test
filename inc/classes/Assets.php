<?php

/**
 * All assets management
 * 
 * @package Imagify
 */

namespace Imagify\Classes;

use Imagify\traits\Singleton;

class Assets
{

    use Singleton;

    protected function __construct()
    {
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        /**
         * Actions
         */
        // Register and Enqueue Styles
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        // Register and Enqueue Scripts
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        // Register Styles
        wp_register_style('mystylesheet', IMAGIFY_BASE . '/assets/css/style.css', [], filemtime(IMAGIFY_DIR . '/assets/css/style.css'), 'all');
        // Enqueue styles
        wp_enqueue_style('mystylesheet');
    }

    public function register_scripts()
    {
        // Register scripts
        wp_register_script('myjs', IMAGIFY_BASE . '/assets/js/script.js', ['jquery'], false, 'all');
        wp_register_script('fontawesome', 'https://kit.fontawesome.com/2f309f947f.js', [], false, 'all');

        // Enqueue Scripts
        wp_enqueue_script('myjs');
        wp_enqueue_script('fontawesome');
    }
}
