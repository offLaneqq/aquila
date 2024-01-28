<?php
// 
// Content template
// 

$container_classes = !empty($args['container_classes']) ? $args['container_classes'] : 'mb-5';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($container_classes); ?>>
    <?php get_template_part('template-parts/components/blog/entry-header') ?>
    <?php get_template_part('template-parts/components/blog/entry-meta') ?>
    <?php get_template_part('template-parts/components/blog/entry-content') ?>
    <?php get_template_part('template-parts/components/blog/entry-footer') ?>
</article>