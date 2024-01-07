<?php
// 
// Cover Block Patterns template
//

$cover_url = esc_url(AQUILA_BUILD_IMG_URI . '/patterns/cover.jpg');

?>

<!-- wp:cover {"url":"<?php echo $cover_url ?>","id":648,"dimRatio":50,"minHeight":640,"align":"full","className":"aquila-cover","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull aquila-cover" style="min-height:640px">
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
    <img class="wp-block-cover__image-background wp-image-648" alt="Nothin' to See Here Neon Signqwe"
        src="<?php echo $cover_url ?>" data-object-fit="cover" />
    <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><strong>Nothin' to see here...</strong></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}}},"textColor":"cyan-bluish-gray"} -->
        <p class="has-text-align-center has-cyan-bluish-gray-color has-text-color has-link-color">Lillian and Madison
            were unlikely roommates and yet inseparable friends at their elite boarding school.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"center","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"textAlign":"center","textColor":"cyan-bluish-gray","style":{"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}},"border":{"radius":"17px"}},"className":"is-style-outline"} -->
            <div class="wp-block-button is-style-outline"><a
                    class="wp-block-button__link has-cyan-bluish-gray-color has-text-color has-link-color has-text-align-center wp-element-button"
                    style="border-radius:17px">Blogs</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
</div>
<!-- /wp:cover -->