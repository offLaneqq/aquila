<?php
// 
// Search result page
// 

get_header();
global $wp_query;
// echo '<pre>';
// print_r($wp_query->max_num_pages > 1);
// wp_die();
?>
<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container">
            <header class="mb-5">
                <h1 class="page-title">
                    <?php echo $wp_query->found_posts; ?>
                    <?php _e('Search Results Found For', 'locale'); ?>: 
                    "<?php the_search_query(); ?>"
                </h1>
            </header>

            <?php if (have_posts()) { ?>

                <div>

                    <?php while (have_posts()) {
                        the_post(); ?>
                        <div class="card mb-5 pb-3">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="search-card-container">
                                    <div class="search-card-content">
                                        <?php if (has_post_thumbnail(get_the_ID())) {
                                            the_post_custom_thumbnail(get_the_ID(), 'medium', ['class' => 'search-card-thumbnail']);
                                        }
                                        ?>
                                        <?php aquila_the_excerpt(); ?>
                                    </div>
                                    <?php echo aquila_excerpt_more(); ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>

                <?php
                if ($wp_query->max_num_pages > 1) {
                    aquila_pagination();
                }
                ?>

            <?php } else {
                get_search_form();
            } ?>

        </div>
    </main>
</div>
<?php get_footer(); ?>