<?php

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
{
    use Singleton;

    protected function __construct()
    {
        // load class
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        Block_Patterns::get_instance();
        Register_Post_Types::get_instance();

        $this->setup_hooks();

    }

    protected function setup_hooks()
    {
        // actions
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        add_theme_support('title-tag');
        add_theme_support('custom-logo', [
            'header-text'          => ['site-title', 'site-description'],
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ]);
        add_theme_support('custom-background', [
            'default-color'          => '#fff',
            'default-image'          => ''
        ]);
        add_theme_support('post-thumbnails');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script'
        ]);
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_theme_support('post-thumbnails');
        add_editor_style('assets/build/css/editor.css');

        // Remove the core block patterns
        remove_theme_support('core-block-patterns');

        // Register image size
        add_image_size('featured-thumbnail', 350, 233, true);


        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }
    }
}
