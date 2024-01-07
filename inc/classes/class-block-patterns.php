<?php

// 
// Block Patterns
// 

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Block_Patterns
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
        add_action('init', [$this, 'register_block_patterns']);
        add_action('init', [$this, 'register_block_pattern_categories']);
    }

    public function register_block_patterns()
    {
        if (function_exists('register_block_pattern')) {
            register_block_pattern(
                'aquila/cover',
                [
                    'title' => __('Aquila Cover', 'aquila'),
                    'description' => __('Aquila Cover block with image and text', 'aquila'),
                    'categories' => ['cover'],
                    'content' => '<!-- wp:cover {"url":"http://test-site.local/wp-content/uploads/2023/12/nothin-to-see-here-neon-sign.jpeg","id":648,"dimRatio":50,"align":"full","className":"aquila-cover","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover alignfull aquila-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-648" alt="Nothin\' to See Here Neon Sign" src="http://test-site.local/wp-content/uploads/2023/12/nothin-to-see-here-neon-sign.jpeg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
                    <h1 class="wp-block-heading has-text-align-center"><strong>Nothin\' to see here...</strong></h1>
                    <!-- /wp:heading -->
                    
                    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}}},"textColor":"cyan-bluish-gray"} -->
                    <p class="has-text-align-center has-cyan-bluish-gray-color has-text-color has-link-color">Lillian and Madison were unlikely roommates and yet inseparable friends at their elite boarding school.</p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"center","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","textColor":"cyan-bluish-gray","style":{"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}},"border":{"radius":"17px"}},"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-cyan-bluish-gray-color has-text-color has-link-color has-text-align-center wp-element-button" style="border-radius:17px">Blogs</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div></div>
                    <!-- /wp:cover -->'
                ]
            );
        }
    }

    public function register_block_pattern_categories()
    {
        $pattern_categories = [
            'cover' => __('Cover', 'aquila'),
            'carousel' => __('Carousel', 'aquila')
        ];

        if (!empty($pattern_categories) && is_array($pattern_categories)) {
            foreach ($pattern_categories as $pattern_category => $pattern_category_label) {
                register_block_pattern_category(
                    $pattern_category,
                    ['label' => $pattern_category_label]
                );
            }
        }
    }

}