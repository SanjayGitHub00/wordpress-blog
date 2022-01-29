<?php

/**
 *  Entry content Template
 *  @package advanceBlog
 */
?>
<div class="post__content">
    <div class="author_data">
        <div class="avtar">
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" style="width:30px; height:30px; object-fit:cover" /></a>
        </div>
        <?php advanceBlog_posted_by(); ?>
        <div class="dot"></div>
        <?php advanceBlog_posted_on(); ?>
    </div>
    <h2 class="title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <p>
        <?php advanceBlog_the_excerpt(200); ?>
    </p>
</div>