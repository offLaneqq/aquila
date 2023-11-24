<?php
// 
// Theme Functions
// 
// @package Aquila
// 

if (!defined('AQUILA_DIR_PATH')) {
    define('AQUILA_DIR_PATH', untrailingslashit(get_template_directory()));
}


require_once AQUILA_DIR_PATH.'/inc/helpers/autoloader.php';
// use AQUILA_THEME\Inc\Traits\Singleton as Singleton;

function aquila_enqueue_scripts()
{
    // Register Styles
    wp_register_style('style', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false);

    // Register Scripts
    wp_register_script('main', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true);
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/src/library/js/bootstrap.bundle.min.js', ['jquery'], false, true);

    // Enqueue Styles
    wp_enqueue_style('style');
    wp_enqueue_style('bootstrap');

    // Enqueue Scripts
    wp_enqueue_script('main');
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');
