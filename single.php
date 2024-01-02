<?php
// 
// Template for single post
// 

get_header();
?>

<div id="primary">
    <main class="site-main mt-5" id="main" role="main">
        <?php if (have_posts()): ?>
            <div class="container">

                <?php
                if (is_home() && !is_front_page()) {
                    ?>
                    <header class="mb-5">
                        <h1 class="page-title">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php
                }
                // Start loop
                while (have_posts()):
                    the_post();

                    get_template_part('template-parts/content');

                endwhile ?>
            </div>
    </div>
    <?php
        else: // can be bug here
            get_template_part('template-parts/content-none');

        endif;
        ?>
</main>
</div>


<?php
get_footer();
?>