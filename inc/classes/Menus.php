<?php

/**
 * Register Menus
 * 
 * @package Imagify
 */

namespace Imagify\Classes;

use Imagify\traits\Singleton;

class Menus
{

    use \Imagify\traits\Singleton;

    protected function __construct()
    {
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        /**
         * Actions
         */

        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus([
            'imagify-header-menu' => esc_html__('Header Menu', 'imagifytheme'),
        ]);
    }

    public function get_menu_id($location)
    {

        // Get all menu Locations
        $locations = get_nav_menu_locations();

        // Get object ID by location

        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id : '';
    }

    public function get_child_menu_items($menu_array, $parent_id)
    {
        $child_menu = [];

        if (!empty($menu_array) && is_array($menu_array)) {
            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    array_push($child_menu, $menu);
                }
            }
        }

        return $child_menu;
    }

    
}
