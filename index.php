<?php

/**
 *  Main Template File
 * @package advanceBlog
 */
get_header();

?>
    <div class="container m-auto lg:px-4 md:px-4 px-4">
        <div class="
              main__body_content
              grid grid-cols-1
              lg:grid-cols-3
              py-8
              lg:gap-x-6
            ">
            <div class="
                latest__post_grid
                grid grid-cols-1
                lg:grid-cols-2 lg:col-span-2 lg:gap-x-6 lg:gap-y-6
                gap-y-6
                relative
              ">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content');
                    endwhile;
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>

                <!-- Pagination -->
                <div class="pagination my-8 lg:hidden mobile__pagination">
                    <ul class="flex items-center m-auto">
                        <?php advanceBlog_pagination(); ?>
                    </ul>
                </div>
            </div>
            <div class="sidebar__right">
                <div class="about__us_hero border-2">
                    <div class="logo">
                        <h1><?php bloginfo('name'); ?></h1>
                    </div>
                    <p class="my-6">
                        <?php bloginfo('description'); ?>
                    </p>
                    <div class="socia__follow">
                        <a href="#"><i class="fa fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fab fa-twitter"></i></a>
                        <a href="#"><i class="fa fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="popular__posts border-2">
                    <div class="section__heading mb-7">
                        <h3>Popular Posts</h3>
                    </div>
                    <div class="popular__post_content">
                        <?php
                        $popularpost = new WP_Query([
                            'posts_per_page' => 5,
                            'meta_key' => 'wpb_post_views_count',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC'
                        ]);
                        $post_number = 1;
                        while ($popularpost->have_posts()) : $popularpost->the_post();
                            ?>
                            <div class="single__popular_post flex items-center">
                                <div class="thumbs relative">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <a href="<?php the_permalink(); ?>" style="width: 20%;"><img
                                                    src="<?php the_post_thumbnail_url(); ?>"/></a>
                                        <?php
                                    }
                                    ?>
                                    <p class="absolute"><?php echo $post_number ?></p>
                                </div>
                                <div class="text__content" style="width: 80%;">
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <?php advanceBlog_posted_on(); ?>
                                </div>
                            </div>
                            <?php
                            $post_number++;
                        endwhile;
                        ?>

                    </div>
                </div>
                <div class="category__sidebar border-2">
                    <div class="section__heading mb-7">
                        <h3>Explore Topics</h3>
                    </div>
                    <div class="category_lists">
                        <?php
                        $category_lists = get_categories([
                            'orderby' => 'name',
                            'order' => 'ASC'
                        ]);
                        if (!empty($category_lists) && is_array($category_lists)) {
                            foreach ($category_lists as $category) {
                                ?>
                                <div class="category">
                                    <a href="<?php echo get_category_link($category->term_id) ?>"
                                       class="flex items-center justify-between">
                                        <p>
                                            <i class="fa fas fa-chevron-right pr-2"></i> <?php echo $category->name; ?>
                                        </p>
                                        <span class="count">(<?php echo $category->count; ?>)</span>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="tag__cloud border-2">
                    <div class="section__heading mb-7">
                        <h3>Tag Cloud</h3>
                    </div>
                    <div class="all_tags">
                        <?php
                        $tags = get_tags([
                            'hide_empty' => false
                        ]);

                        if (!empty($tags) && is_array($tags)) {
                            foreach ($tags as $tag) {
                                ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>"
                                   class="tag">#<?php echo $tag->name ?></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <aside id="primary" class="border-2" role="complementary">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </aside>
            </div>
        </div>
        <!-- Pagination -->
        <div class="pagination my-8">
            <ul class="flex items-center m-auto">
                <?php advanceBlog_pagination(); ?>
            </ul>
        </div>
    </div>
    </main>
<?php
get_footer();
?>