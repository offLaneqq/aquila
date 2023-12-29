<?php 

// 
// Enqueue theme assets
// 

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct()
    {
        // load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // actions
        add_action('wp_enqueue_scripts', [$this, 'set_wp_styles']);
        add_action('wp_enqueue_scripts', [$this, 'set_wp_scripts']);
    }

    public function set_wp_styles()
    {
        // Register Styles
        wp_register_style('style', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'));
        wp_register_style('bootstrap', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false);

        // Enqueue Styles
        wp_enqueue_style('style');
        wp_enqueue_style('bootstrap');
    }

    public function set_wp_scripts()
    {
        // Register Scripts
        wp_register_script('main', AQUILA_DIR_URI . '/assets/main.js', [], filemtime(AQUILA_DIR_PATH . '/assets/main.js'), true);
        wp_register_script('bootstrap', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.bundle.min.js', ['jquery'], false, true);

        // Enqueue Scripts
        wp_enqueue_script('main');
        wp_enqueue_script('bootstrap');
    }
}