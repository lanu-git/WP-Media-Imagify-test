<?php

/**
 * Head template
 * 
 * @package Imagify
 */

\Imagify\Classes\Imagify::get_instance();

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>

    <header class="container-fluid">
        <section class="navbar" id="myNavbar">
            <?php get_template_part('template-parts/header/nav'); ?>
        </section>

        <section class="landing">

            <?php get_template_part('template-parts/header/hero'); ?>

        </section>
    </header>

    


    