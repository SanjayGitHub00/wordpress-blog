<?php
function get_the_custom_post_thumbnail($post_id, $size = 'post-thumbnail', $additional_attributes = [])
{
    $custom_thumbnail = '';
    if (null === $post_id) {
        $post_id = get_the_ID();
    }

    if (has_post_thumbnail($post_id)) {
        $default_thumbnail = [
            'loading' => 'lazy',
        ];
        $attributes = array_merge($default_thumbnail, $additional_attributes);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $additional_attributes
        );
    }
    return $custom_thumbnail;
}
function the_post_custom_thumbnail($post_id, $size = 'post-thumbnail', $additional_attributes = [])
{
    echo get_the_custom_post_thumbnail($post_id, $size, $additional_attributes);
}

function advanceBlog_posted_on()
{
    $time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_attr(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_attr(get_the_modified_date())
    );
    $post_on = sprintf(
        esc_attr_x('%s', 'Date Time', 'advanceBlog'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<p class="post__date">' . $post_on . '</p>';
}
function advanceBlog_posted_by()
{
    $by_line = sprintf(
        esc_attr_x('%s', 'post author', 'advanceBlog'),
        '<p class="author_name"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></p>'
    );

    echo $by_line;
}
function advanceBlog_the_excerpt($trim_character_count = 0)
{
    if (!has_excerpt() || 0 === $trim_character_count) {
        the_excerpt();
        return;
    }
    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $trim_character_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . '[...]';
}

function advanceBlog_pagination()
{
    $allowed_tags = [
        'li' => [
            'class' => []
        ],
        'a' => [
            'href' => [],
            'class' => []
        ]
    ];
    $args = [
        'before_page_number' => '<li class="page_number">',
        'after_page_number' => '</li>'
    ];
    printf('<ul class="flex items-center m-auto">%s</ul>', wp_kses(paginate_links($args), $allowed_tags));
}

function wpb_set_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views($post_id)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action('wp_head', 'wpb_track_post_views');
