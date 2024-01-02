<?php

// Template for entry content

?>

<div class="entry-content">
    <?php
    if (is_single()) {
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading %s <span class="meta-nav">rarr;</span>', 'aquila'),
                    [
                        "span" => [
                            "class" => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            )
        );

        // Pagination in single post(pages breaks in wp)
        wp_link_pages(
            [
                'before' => '<div class="page-links">' . esc_html__('Pages: ', 'aquila'),
                'after' => '</div>'
            ]
        );

    } else {
        aquila_the_excerpt(350);
        printf('<br />');
        echo aquila_excerpt_more();
    }
    ?>
</div>