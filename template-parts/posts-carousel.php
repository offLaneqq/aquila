<?php
// 
// Carousel
// 
$args = [
  'posts_per_page' => 5,
  'post_type' => 'post',
  'update_post_meta_cache' => false,
  'update_post_term_cache' => false,
];

$post_query = new \WP_Query($args);

?>


<div class="posts-carousel">
  <?php
  if ($post_query->have_posts()) {
    while ($post_query->have_posts()):
      $post_query->the_post();
      ?>
      <div class="card">
        <?php
        if (has_post_thumbnail()) {             // check that post has img
          the_post_custom_thumbnail(
            get_the_ID(),
            'featured-thembnail',
            [
              'sizes' => '(max-width: 350px) 350px, 233px',
              'class' => 'w-100',
            ]
          );
        } else {
          ?>
          <img src="https://via.placeholder.com/510x340" class="w-100" />
          <?php
        }
        ?>
        <div class="card-body">
          <?php
          echo the_title('<h3 class="card-title">', '</h3>');
          aquila_the_excerpt();
          ?>
            <a href="<?php echo esc_url(get_permalink()); ?>">
              <?php esc_html_e('View more', 'aquila') ?>
            </a>
        </div>
      </div>
      <?php
    endwhile;
  }
  wp_reset_postdata();
  ?>
</div>