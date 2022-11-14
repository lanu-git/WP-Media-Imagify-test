<?php

/**
 * Custom Block
 * 
 * @package Imagify
 */

namespace Imagify\Classes;


class Custblock
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
        add_action('init', [$this, 'register_blocks']);
        add_action('init', [$this, 'register_categories']);
    }

    public function register_blocks()
    {
        if (function_exists('register_block_pattern')) {

            


            register_block_pattern(
                'imagify/perks',
                array(
                    'title'       => __('Imagify Perks', 'imagifytheme'),
                    'categories'  => ['columns'],
                    'description' => __('Perks cards', 'imagifytheme'),
                    'content'     => $this->get_pattern_content('template-parts/patterns/perks'),
                )
            );
        }
    }

    public function register_categories()
    {

        if (function_exists('register_block_category')) {
            $cats = [
                'columns' => __('columns', 'imagifytheme'),
                'card' => __('card', 'imagifytheme'),
                'gallery' => __('gallery', 'imagifytheme')
            ];

            if (!empty($cats) && is_array($cats)) {
                foreach ($cats as $pattern_category => $pattern_category_label) {
                    register_block_pattern_category($pattern_category, ['label' => $pattern_category_label]);
                }
            }
        }
    }

    public function get_pattern_content ($path)
    {
        ob_start();
            get_template_part($path);

            $template = ob_get_contents();
            ob_end_clean();

            return $template;
    }


}
