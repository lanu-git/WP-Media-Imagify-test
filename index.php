<?php

/**
 * Imagify Theme
 * 
 * @package Imagify
 */

get_header();
?>


<main class="container-fluid">
    <section class="benefits">
        <h3>Your Visitors Will Be Fulfilled</h3>
        <section>
            <div class="benefit">
                <div>
                    <img src="<?php echo get_theme_mod('ben_icon_0'); ?>" alt=" Arrow icon">
                    <div>
                        <h4>
                            <?php echo get_theme_mod('ben_section_title_0', __('Optimize your website', 'imagifytheme')); ?>
                        </h4>
                        <p>
                            <span><?php echo get_theme_mod('ben_section_first_line_0', __('Images can account for 50% of your loading time.', 'imagifytheme')); ?></span>
                            <?php echo get_theme_mod('ben_section_second_line_0', __('By compressing them you will quickly gain precious seconds.', 'imagifytheme')); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="benefit">
                <div>
                    <img src="<?php echo get_theme_mod('ben_icon_1'); ?>" alt="User icon">   
                    <div>
                        <h4>
                            <?php echo get_theme_mod('ben_section_title_1', __('Increase user engagement', 'imagifytheme')); ?>
                        </h4>
                        <p>
                        <span><?php echo get_theme_mod('ben_section_first_line_1', __('A fast web page encourages your visitors to stay on your website and to keep on browsing.', 'imagifytheme')); ?></span>
                            <?php echo get_theme_mod('ben_section_second_line_1', __('Offer them an ultra fast experience!', 'imagifytheme')); ?>
                       
                        </p>
                    </div>
                </div>
            </div>
            <div class="benefit">
                <div>
                    <img src="<?php echo get_theme_mod('ben_icon_2'); ?>" alt="IncreaseEngagement icon">
                    <div>
                        <h4>
                            <?php echo get_theme_mod('ben_section_title_2', __('Increase your traffic', 'imagifytheme')); ?>
                        </h4>
                        <p>
                            <span><?php echo get_theme_mod('ben_section_first_line_2', __('Search engine robots will have less difficulty crawling your website.', 'imagifytheme')); ?></span>
                            <?php echo get_theme_mod('ben_section_second_line_2', __('Consequently you will improve your SEO and become more visible.', 'imagifytheme')); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="benefit">
                <div>
                    <img src="<?php echo get_theme_mod('ben_icon_3'); ?>" alt="graphs icon">
                    <div>
                        <h4>
                            <?php echo get_theme_mod('ben_section_title_3', __('Watch your conversions rise', 'imagifytheme')); ?>
                        </h4>
                        <p>
                            <span>
                                <?php echo get_theme_mod('ben_section_first_line_3', __('With more visitors and engagement you will naturally have more subscribers on more sales!', 'imagifytheme')); ?></span>
                            </span>
                                <?php echo get_theme_mod('ben_section_second_line_3'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>


<?php
get_footer();
?>