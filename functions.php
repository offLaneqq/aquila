<?php 
// 
// Theme Functions
// 
// @package Aquila
// 

function aquila_enqueue_scripts() {
    wp_enqueue_style('aquila_stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory().'/style.css'));
}

add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts')

?>