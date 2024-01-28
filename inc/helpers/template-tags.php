<?php

function get_the_post_custom_thumbnail($post_id, $size = 'featured-large', $additional_attributes = [])
{
    $custom_thumbnail = [];

    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if (has_post_thumbnail($post_id)) {
        $default_attributes = [
            'loading' => 'lazy',

        ];
        $attributes = array_merge($additional_attributes, $default_attributes);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $attributes
        );
    }

    return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{
    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

function aquila_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    // Post is modified
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
                        <time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_attr(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_attr(get_the_modified_date()),
    );

    $posted_on = sprintf(
        // esc_html_x func for help w/ translation + safe use HTML
        esc_html_x('Posted on %s', 'post date', 'aquila'),
        '<a class="text-decoration-none" href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}

function aquila_posted_by()
{
    $byline = sprintf(
        esc_html_x(' by %s', 'post author', 'aquila'),
        '<span class="author vcard"><a class="text-decoration-none" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline text-secondary">' . $byline . '</span>';
}

function aquila_the_excerpt($trim_character_count = 0)
{
    $post_ID = get_the_ID();

    if (empty($post_ID)) {
        return null;
    }

    if (!has_excerpt() || $trim_character_count === 0) {
        the_excerpt();
        return;
    }

    $excerpt = wp_html_excerpt(get_the_excerpt($post_ID), $trim_character_count, '[...]');

    echo $excerpt;
}

function aquila_excerpt_more($more = '')
{
    if (!is_single()) {
        $more = sprintf(
            '<a class="aquila-read-more text-white" href="%1$s"><button class="mt-3 btn btn-info">%2$s</button></a>',
            // current way next
            // get_permalink(get_the_ID());
            // custom way next(here can be a bug) !!!
            get_post_permalink(),
            __('Read more', 'aquila')
        );
    }
    return $more;
}

function aquila_pagination()
{

    $allowed_tags = [
        'span' => [
            'class' => []
        ],
        'a' => [
            'class' => [],
            'href' => [],
        ]
    ];

    $args = [
        'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
        'after_page_number' => '</span>',
    ];

    printf('<nav class="aquila-pagination clearfix">%s</nav>', wp_kses(paginate_links($args), $allowed_tags));
}

/**
 * If the gravatar is uploaded returns true.
 *
 * There are two things we need to check, If user has uploaded the gravatar:
 * 1. from WP Dashboard, or
 * 2. or gravatar site.
 *
 * If any of the above condition is true, user has valid gravatar,
 * and the function will return true.
 *
 * 1. For Scenario 1: Upload from WP Dashboard:
 * We check if the query args is present or not.
 *
 * 2. For Scenario 2: Upload on Gravatar site:
 * When constructing the URL, use the parameter d=404.
 * This will cause Gravatar to return a 404 error rather than an image if the user hasn't set a picture.
 *
 * @param $user_email
 *
 * @return bool
 */
function aquila_has_gravatar($user_email)
{

    $gravatar_url = get_avatar_url($user_email);

    if (aquila_is_uploaded_via_wp_admin($gravatar_url)) {
        return true;
    }

    $gravatar_url = sprintf('%s&d=404', $gravatar_url);

    // Make a request to $gravatar_url and get the header
    $headers = @get_headers($gravatar_url);

    // If request status is 200, which means user has uploaded the avatar on gravatar site
    return preg_match("|200|", $headers[0]);
}

/**
 * Checks to see if the specified user id has a uploaded the image via wp_admin.
 *
 * @return bool  Whether or not the user has a gravatar
 */
function aquila_is_uploaded_via_wp_admin($gravatar_url)
{

    $parsed_url = wp_parse_url($gravatar_url);

    $query_args = !empty($parsed_url['query']) ? $parsed_url['query'] : '';

    // If query args is empty means, user has uploaded gravatar.
    return empty($query_args);

}