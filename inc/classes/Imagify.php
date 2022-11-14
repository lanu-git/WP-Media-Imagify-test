<?php

/**
 * Bootstrap the theme
 * 
 * @package Imagify
 */

namespace Imagify\Classes;

use WP_Customize_Control;
use WP_Customize_Image_Control;

class Imagify
{
    use \Imagify\traits\Singleton;

    protected function __construct()
    {
        // Load Class
        Assets::get_instance();
        Menus::get_instance();
        Custblock::get_instance();

        $this->set_hooks();
    }

    protected function set_hooks()
    {
        /**
         * Actions
         */
        /** HTML5 support **/
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

        /**
         * Theme setup action
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);

        /**
         * ADmin customizer settings
         */
        add_action('customize_register', [$this, 'register_customizer_section']);
    }

    public function setup_theme()
    {
        // Title
        add_theme_support('title-tag');

        // Custom Logo suport
        add_theme_support('custom-logo', [
            'header-text'          => ['site-title', 'site-description'],
            'height'               => 22,
            'width'                => 186,
            'flex-height'          => true,
            'flex-width'           => true,
        ]);

        /**
         * Background
         */
        add_theme_support('custom-background', [
            'default-image'          => '#ffffff',
            'default-color'          => '',
            'default-repeat'         => 'no-repeat',
        ]);

        /**
         * Image Size
         */

        add_image_size('perk-icon', 64, 48, true);

        /**
         * Post thumbnail
         */

        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('customize-selective-refresh-widgets');

        add_editor_style();
        add_theme_support('wp-block-styles');

        add_theme_support('align_wide');

        // Remove care patterns
        remove_theme_support('core-block-patterns');

        global $content_width;

        if (!isset($content_width)) {
            $content_width = 1440;
        }
    }


    public function register_customizer_section($wp_customize)
    {

        // Initialisation
        $this->nav_actions_section($wp_customize);
        $this->hero_section($wp_customize);
    }



    /**
     * Editable part of the theme
     */

    /**
     * Navbar CTA
     */
    private function nav_actions_section($wp_customize)
    {
        $wp_customize->add_section('nav_actions_section', [
            'title' => 'Navbar CTA',
            'priority' => 2,
            'description' => esc_html__('My Account label', 'imagifytheme')
        ]);

        $this->navbar_account_cta($wp_customize);
        $this->navbar_btn_cta($wp_customize);
        $this->benefits_section($wp_customize);
    }

    private function navbar_account_cta($wp_customize)
    {

        // My Account text
        $wp_customize->add_setting('nav_actions_account_label', [
            'default' => 'My Account',
            'sanitize_callback' => 'esc_html',
            'capability' => 'edit_theme_options'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'nav_actions_account_label_control', [
            'label' => 'Account link Label',
            'section' => 'nav_actions_section',
            'settings' => 'nav_actions_account_label',
            'type' => 'text'
        ]));

        // URL
        $wp_customize->add_setting('nav_actions_account_url', [
            'default' => '',
            'sanitize_callback' => 'esc_url',
            'capability' => 'edit_theme_options'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'nav_actions_account_url_control', [
            'label' => 'URL',
            'section' => 'nav_actions_section',
            'settings' => 'nav_actions_account_url',
            'type' => 'url'
        ]));
    }

    /**
     * Navbar Button
     */
    private function navbar_btn_cta($wp_customize)
    {
        // Btn text
        $wp_customize->add_setting('nav_actions_btn_label', [
            'default' => 'Get Started',
            'sanitize_callback' => 'esc_html',
            'capability' => 'edit_theme_options'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'nav_actions_btn_label_control', [
            'label' => 'Button Text',
            'section' => 'nav_actions_section',
            'settings' => 'nav_actions_btn_label',
            'type' => 'text'
        ]));

        // URL
        $wp_customize->add_setting('nav_actions_btn_url', [
            'default' => '#',
            'sanitize_callback' => 'esc_url',
            'capability' => 'edit_theme_options'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'nav_actions_btn_url_control', [
            'label' => 'Btn URL',
            'section' => 'nav_actions_section',
            'settings' => 'nav_actions_btn_url',
            'type' => 'url'
        ]));
    }

    /**
     * Hero section 
     */
    private function hero_section($wp_customize)
    {
        $wp_customize->add_section('hero_section', [
            'title' => 'Hero Section',
            'priority' => 3,
            'description' => esc_html__('Hero Section management', 'imagifytheme')
        ]);

        $wp_customize->add_setting('hero_section_title', [
            'default' => 'Speed Up Your Website With Lighter Images',
            'sanitize_callback' => 'esc_html',
            'capability' => 'edit_theme_options'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'hero_section_title_control', [
            'label' => 'Section title',
            'section' => 'hero_section',
            'settings' => 'hero_section_title',
            'type' => 'text'
        ]));

        $wp_customize->add_setting('hero_section_text', [
            'default' => 'Imagify is the easiest tool to optimize your images and make your site faster. It takes 1 second to compress, resize and convert your images to WebP.',
            'sanitize_callback' => 'esc_html',
            'capability' => 'edit_theme_options'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'hero_section_text_control', [
            'label' => 'Hero section text',
            'section' => 'hero_section',
            'settings' => 'hero_section_text',
            'type' => 'textarea'
        ]));
    }


    /**
     * Benefits cards
     */

    private function benefits_section($wp_customize)
    {
        $wp_customize->add_section('ben_section', [
            'title' => 'Benefits Card',
            'priority' => 4,
            'description' => __('Beneficts card', 'imagifytheme')
        ]);

        for ($i = 0; $i < 4; $i++) {
            $card_num = $i + 1;

            $wp_customize->add_setting('ben_icon_' . $i, array(
                'default' => get_theme_file_uri('assets/images/icon_' . $i . '.png'), // Add Default Image URL 
                'sanitize_callback' => 'esc_url_raw',
                'capability' => 'edit_theme_options'
            ));
            
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ben_icon_control_' . $i, array(
                'label' => 'Choose Icon',
                'section' => 'ben_section',
                'settings' => 'ben_icon_' . $i,
                'button_labels' => array( // All These labels are optional
                    'select' => __('Select Icon', 'imagifytheme'),
                    'remove' => __('Remove Icon', 'imagifytheme'),
                    'change' => __('Change Icon', 'imagifytheme'),
                )
            )));

            $wp_customize->add_setting('ben_section_title_' . $i, [
                'default' => 'Card Title',
                'sanitize_callback' => 'esc_html',
                'capability' => 'edit_theme_options'
            ]);

            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ben_section_title_control_' . $i, [
                'label' => $card_num . ' - Card Title',
                'section' => 'ben_section',
                'settings' => 'ben_section_title_' . $i,
                'type' => 'text'
            ]));

            $wp_customize->add_setting('ben_section_first_line_' . $i, [
                'default' => 'Lorem Ipsum dollor. This is the colored line of the card',
                'sanitize_callback' => 'esc_html',
                'capability' => 'edit_theme_options'
            ]);

            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ben_section_first_line_' . $i, [
                'label' => 'Card First Line',
                'section' => 'ben_section',
                'settings' => 'ben_section_first_line_' . $i,
                'type' => 'textarea'
            ]));

            $wp_customize->add_setting('ben_section_second_line_' . $i, [
                'default' => '',
                'sanitize_callback' => 'esc_html',
                'capability' => 'edit_theme_options'
            ]);

            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ben_section_second_line_' . $i, [
                'label' => 'Card Second Line',
                'section' => 'ben_section',
                'settings' => 'ben_section_second_line_' . $i,
                'type' => 'textarea'
            ]));
        }
    }
}
