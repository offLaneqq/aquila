<?php

// 
// Front page template
// 

get_header();
?>

<div id="primary">
    <main class="site-main mt-5" id="main" role="main">
        <div class="home-page-wrap">
            <?php if (have_posts()):
                while (have_posts()):
                    the_post();

                    get_template_part('template-parts/content', 'page');

                endwhile ?>

                <?php
            else: // can be bug here
                get_template_part('template-parts/content-none');

            endif;
            ?>
        </div>
    </main>
</div>



<?php
get_footer();
?>