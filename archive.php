<?php
/**
 *  Archive Template
 * @package advanceBlog
 */
get_header();
?>
<div class="container mx-auto lg:px-4 md:px-4 px-4">
    <header class="page-header">
        <?php
        if (!empty(single_term_title('', false))) {
            printf(
                '<h2 class="page-title">%s</h2>',
                single_term_title('', false)
            );
        }
        ?>
    </header>
    <div class="archive-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-6
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
