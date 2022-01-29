<?php

/**
 *  sINGLE pAGE Template
 * @package advanceBlog
 */
get_header();
?>
    <!-- Post Header -->
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <div class="single__post_header flex justify-end items-center flex-col w-full my-4" style="
                background-image: url(<?php the_post_thumbnail_url(); ?>);
                background-size: cover;
                ">
            <div class="container">
                <h1 class="title">
                    <?php
                    the_title();
                    ?>
                </h1>
                <div class="single__post_meta flex items-center pb-8">
                    <div class="author__avtar mr-4">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><img
                                    src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>"
                                    style="width:50px;height:50px;object-fit:cover"/></a>
                    </div>
                    <div class="post_detail flex items-center">
                        <p class="post_author"><?php advanceBlog_posted_by(); ?></p>
                        <span class="dot ml-4 mr-4" style="margin-left:1rem;"></span>
                        <p class="post__date"><?php advanceBlog_posted_on(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile;
endif;
?>

    <!-- Post Content -->
    <div class="container m-auto px-4 py-4 md:grid md:grid-cols-3 md:gap-x-4">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                wpb_set_post_views(get_the_ID());
                ?>
                <div class="main__content_area md:col-span-2 p-4">
                    <?php
                    the_content();
                    ?>
                </div>

            <?php
            endwhile;
        endif;
        ?>
        <div class="single__post_sidebar hidden md:block p-4">
            <?php get_sidebar(); ?>
        </div>
    </div>

    <div class="container m-auto py-8">
        <div class="author flex item-center justify-evenly">
            <div class="author__avtar md:ml-auto">
                <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt=""/>
            </div>
            <div class="author__detail">
                <h2 class="author__name"><a
                            href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
                </h2>
                <p class="author__intro md:w-1/2">
                    <?php echo get_the_author_meta('description'); ?>
                </p>
            </div>
        </div>
    </div>
    <!-- For Comment Form -->

    <!-- For Comment Form -->
    <div class="container m-auto px-4 py-8">
        <div class="latest__post_grid grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 lg:gap-x-6 gap-y-6 px-4 relative">
            <?php
            $arg = [
                'posts_per_page' => 3,
                'post_in' => get_the_tag_list()
            ];
            $the_query = new WP_Query($arg);
            if ($the_query->have_posts()):
                while ($the_query->have_posts()): $the_query->the_post();
                    $the_post_id = get_the_ID();
                    $article_terms = wp_get_post_terms($the_post_id, ['category']);
                    if (empty($article_terms) || !is_array($article_terms)) {
                        return;
                    }
                    ?>
                    <article <?php post_class(['latest__post', 'border-2']); ?>>
                        <div class="post__thumbnail relative">
                            <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                                      alt="post"/></a>
                            <div class="category absolute top-5 left-5">
                                <span>
                                    <?php
                                    foreach ($article_terms as $terms) {
                                        ?>
                                        <a href="<?php echo esc_url(get_term_link($terms)); ?>">
                                            <?php echo esc_html__($terms->name, 'advanceBlog'); ?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="post__content">
                            <div class="author_data">
                                <div class="avtar">
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                        <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>"/>
                                    </a>
                                </div>
                                <p class="author_name"><?php advanceBlog_posted_by(); ?></p>
                                <div class="dot"></div>
                                <p class="post__date"><?php advanceBlog_posted_on(); ?></p>
                            </div>
                            <h2 class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p>
                                <?php advanceBlog_the_excerpt('200'); ?>
                            </p>
                        </div>
                    </article>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>

        </div>
    </div>
    </main>

<?php
get_footer();
?>