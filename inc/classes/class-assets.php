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
        wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'));
        wp_register_style('bootstrap-css', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false);
        wp_register_style('main-css', AQUILA_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime(AQUILA_BUILD_CSS_DIR_PATH . '/main.css'), 'all');
        wp_enqueue_style('fonts-css', get_template_directory_uri() . '/assets/src/library/fonts/fonts.css', [], false, 'all');

        // Enqueue Styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('style-css');
        wp_enqueue_style('main-css');
    }

    public function set_wp_scripts()
    {
        // Register Scripts
        wp_register_script('main', AQUILA_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(AQUILA_BUILD_JS_DIR_PATH . '/main.js'), true);
        wp_register_script('bootstrap', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.bundle.min.js', ['jquery'], false, true);

        // Enqueue Scripts
        wp_enqueue_script('main');
        wp_enqueue_script('bootstrap');
    }
}