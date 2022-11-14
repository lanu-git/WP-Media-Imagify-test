<?php

/**
 * Navigation template
 * 
 * @package Imagify
 */

$menu_class = \Imagify\Classes\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('imagify-header-menu');
$header_menus = wp_get_nav_menu_items($header_menu_id);

?>


    <nav class="nav-mobile">

        <!-- Logo/Brand -->
        <div class="nav-center" id="nav-mobile">

            <a href="<?php bloginfo('url'); ?>" class="logo">
                <img src="<?php echo IMAGIFY_BASE . '/assets/images/Logo.png'; ?>" alt="<?php bloginfo('name'); ?>" >
            </a>
            
            <!-- Dynamic Nav -->
            <div class="center">
                <?php 
                    if ( !empty($header_menus) && 
                        is_array($header_menus) ) {
                            foreach ($header_menus as $menu_item) {

                                if (!$menu_item->menu_item_parent) {

                                    // Retrieve all the child of this menu if exist
                                    $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
                                    $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                                    if (!$has_children) { ?>
                                        <a href="<?php echo esc_url($menu_item->url); ?>"> <?php echo esc_html($menu_item->title); ?> </a>
                                    <?php

                                    } else { ?>
                                        <div class="dropdown">
                                            <a href="<?php echo esc_url($menu_item->url); ?>" class="dropbtn"> 
                                                <?php echo esc_url($menu_item->title); ?> <i class="fa fa-caret-down"></i>
                                            </a>

                                                <div class="dropdown-content">
                                                    <?php
                                                        foreach ($child_menu_items as $child_item) {
                                                            ?>
                                                            <a href="<?php echo esc_url($child_item->url); ?>">
                                                                <?php echo esc_html($child_item->title); ?>
                                                            </a>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>

                                        </div>

                                    <?php }
                                } 
                            }
                        }
                    ?>
                </div>

            <div class="nav-right">
                <a href="<?php echo get_theme_mod('nav_actions_account_url', '#'); ?>">
                    <?php echo get_theme_mod('nav_actions_account_label', __('My Account', 'imagifytheme')); ?>
                </a>

                <a href="<?php echo get_theme_mod('nav_actions_btn_url', '#'); ?>" class="btn btn-blue">
                    <?php echo get_theme_mod('nav_actions_btn_label', __('Get Started', 'imagifytheme')); ?>
                </a>
            </div>
            <a href="javascript:void(0);" style="font-size:35px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        
    </nav>