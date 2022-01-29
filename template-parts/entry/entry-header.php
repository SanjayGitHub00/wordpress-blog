<?php

/**
 *  Entry Header Template
 *  @package advanceBlog
 */
$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
$article_terms = wp_get_post_terms($the_post_id, ['category']);
if (empty($article_terms) || !is_array($article_terms)) {
    return;
}
?>
<div class="post__thumbnail relative">
    <?php
    /**
     *  Featured Image
     */
    if ($has_post_thumbnail) {
    ?>
        <a href="<?php echo esc_url(get_the_permalink()); ?>">
            <!-- <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="post" /> -->
            <?php
            the_post_custom_thumbnail(
                $the_post_id,
                'post-thumbnail',
                []
            );
            ?>
        </a>
    <?php
    }
    ?>
    <div class="category absolute top-5 left-5">
        <span>
            <?php
            foreach ($article_terms as $key => $article_term) {
            ?>
                <a href="<?php echo esc_url(get_term_link($article_term)); ?>"><?php echo esc_html($article_term->name); ?></a>
            <?php
            }
            ?>
        </span>
    </div>
</div>