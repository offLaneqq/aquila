<?php
// 
// Main template file
// 

get_header();
?>

<div id="primary">
    <main class="site-main mt-5" id="main" role="main">
        <?php if (have_posts()) : ?>
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
                ?>

                <div class="row">
                    <?php
                    $index = 0;
                    $n_of_col = 3;

                    // Start loop
                    while (have_posts()) : the_post();
                        if ($index % $n_of_col === 0) {
                    ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                            <?php
                        }

                        get_template_part('template-parts/content');

                        $index++;

                        if ($index !== 0 && $index % $n_of_col === 0) {
                            ?>
                            </div>
                    <?php
                        }
                    endwhile ?>
                </div>
            </div>
        <?php
        else : // can be bug here
            get_template_part('template-parts/content-none');

        endif;
        ?>
    </main>
</div>


<?php
get_footer();
?>