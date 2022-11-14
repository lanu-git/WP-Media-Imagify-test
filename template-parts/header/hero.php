<?php

/**
 * Hero  section template
 * 
 * @package Imagify
 */
?>
<div class="hero-text">
    <h1>
        <?php echo get_theme_mod('hero_section_title'); ?>
    </h1>
    <p>
        <?php echo nl2br(get_theme_mod('hero_section_text')); ?>
    </p>
    <a href="<?php echo get_theme_mod('nav_actions_btn_url', '#'); ?>" class="btn btn-blue"> <?php echo get_theme_mod('nav_actions_btn_label', __('Get Started', 'imagifytheme')); ?> <i class="fa fa-arrow-right"></i></a>
</div>

<div class="hero-image">
    <img src="<?php echo IMAGIFY_BASE . '/assets/images/Hero-Image.png'; ?>" alt="">
</div>