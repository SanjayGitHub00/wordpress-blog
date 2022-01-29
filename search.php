<?php
/**
 *  Template name: Search Page
 * @package advanceBlog
 */
get_header();
global $wp_query;
?>
<div class="container search-page mt-10 mx-auto lg:px-4 md:px-4 px-4">
    <h1 class="page-title"> <?php echo $wp_query->found_posts; ?>
        <?php _e('Search Results Found For', 'advanceBlog'); ?>: "<?php the_search_query(); ?>"
    </h1>
    <div class="search__post_result">
        <?php if (have_posts()) { ?>
            <?php
            while (have_posts()):the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(['search_post']); ?>>
                    <div class="post--thumbnail">
                        <?php
                        if (has_post_thumbnail()) {
                            ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="post--content">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php advanceBlog_the_excerpt('220'); ?></p>
                    </div>
                </article>
            <?php
            endwhile;
            ?>
            <?php advanceBlog_pagination(); ?>
        <?php } else {
            get_search_form();
        } ?>
    </div>
</div>
<?php get_footer(); ?>
