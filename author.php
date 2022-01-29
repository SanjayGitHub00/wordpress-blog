<?php
/**
 * Author Archive Page template file.
 *
 * @package advanceBlog
 */
get_header();

$author = get_queried_object();
?>
<div class="container mx-auto lg:px-4 md:px-4 px-4">
    <header class="page-header">
        <?php
        if (!empty(get_the_author())) {
            printf(
                '<h2 class="font-size-xl h3 pb-4"><span>%1$s</span> %2$s</h2>',
                __('Articles written by: ', 'advanceBlog'),
                get_the_author()
            );
        }
        ?>
    </header>
    <div class="author-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-6
                gap-y-6
                relative">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', '');
            endwhile;
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>

