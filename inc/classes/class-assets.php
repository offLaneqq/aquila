<?php

// 
// Enqueue theme assets
// 

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets
{
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
        wp_register_style('bootstrap-css', AQUILA_BUILD_LIB_URI . '/css/bootstrap.min.css', [], false, 'all');
        wp_register_style('slick-css', AQUILA_BUILD_LIB_URI . '/css/slick.css', [], false, 'all');
        wp_register_style('slick-theme-css', AQUILA_BUILD_LIB_URI . '/css/slick-theme.css', ['slick-css'], false, 'all');
        wp_register_style('main-css', AQUILA_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime(AQUILA_BUILD_CSS_DIR_PATH . '/main.css'), 'all');
        wp_register_style('search-css', AQUILA_BUILD_CSS_URI . '/search.css', [], filemtime(AQUILA_BUILD_CSS_DIR_PATH . '/search.css'), 'all');

        // Enqueue Styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('slick-css');
        wp_enqueue_style('slick-theme-css');
        wp_enqueue_style('main-css');

        if(is_page('search')) {
            wp_enqueue_style('search-css');
        }
    }

    public function set_wp_scripts()
    {
        // Register Scripts
        wp_register_script('slick-js', AQUILA_BUILD_LIB_URI . '/js/slick.min.js', ['jquery'], false, true);
        wp_register_script('main-js', AQUILA_BUILD_JS_URI . '/main.js', ['jquery', 'slick-js'], filemtime(AQUILA_BUILD_JS_DIR_PATH . '/main.js'), true);
        wp_register_script('bootstrap-js', AQUILA_BUILD_LIB_URI . '/js/bootstrap.bundle.min.js', ['jquery'], false, true);
        wp_register_script('author-js', AQUILA_BUILD_JS_URI . '/author.js', ['jquery'], filemtime(AQUILA_BUILD_JS_DIR_PATH . '/author.js'), true);
        wp_register_script('search-js', AQUILA_BUILD_JS_URI . '/search.js', ['main-js'], filemtime(AQUILA_BUILD_JS_DIR_PATH . '/search.js'), true);

        // Enqueue Scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('slick-js');

        if (is_author()) {
            wp_enqueue_script('author-js');
        }

        // If search page.
        if (is_page('search')) {
            $filters_data = get_filters_data();
            wp_enqueue_script('search-js');
            wp_localize_script(
                'search-js',
                'search_settings',
                [
                    'rest_api_url' => home_url('/wp-json/af/v1/search'),
                    'root_url' => home_url('search'),
                    'filter_ids' => get_filter_ids($filters_data),
                ]
            );
        }
    }
}