<?php
// 
// Custom search form
// 

?>

<form class="d-flex" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'aquila') ?></span>
    <input class="form-control me-2" type="search" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'aquila'); ?>" value="<?php the_search_query(); ?>" name="s" aria-label="Search">
    <button class="btn btn-outline-success" type="submit"><?php echo esc_attr_x('Search', 'submit button', 'aquila') ?></button>
</form>