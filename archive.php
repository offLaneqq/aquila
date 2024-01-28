<?php
/**
 * Archive Page template file.
 *
 * @package Aquila
 */

get_header();


// echo '<pre>';
// print_r($wp_query);
// wp_die();

?>
<div id="primary">
    <main id="main" class="site-main my-5" role="main">
        <div class="container">

            <header class="page-header">
                <?php
                if (have_posts()):
                    if (!empty(single_term_title('', false))) {
                        printf(
                            '<h1 class="page-title">%s</h1>',
                            single_term_title('', false)
                        );
                    }

                    if (!empty(get_the_archive_description())) {
                        the_archive_description('<div class="archive-description">', '</div>');
                    }
                    ?>
                </header><!-- .page-header -->
                <div class="site-content">
                    <div class="row">
                        <?php

                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/content', '', ['container_classes' => 'col-lg-4 col-md-6 col-sm-12 pb-4']);
                        endwhile;
                else:
                    get_template_part('template-parts/content-none');
                endif;
                ?>
                </div>
                <div>

                    <?php
                    if ($wp_query->max_num_pages > 1) {
                        aquila_pagination();
                    } ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php

get_footer();