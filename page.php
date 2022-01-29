<?php
/**
 * Page Template
 * @package advanceBlog
 */

get_header();
?>
<div class="container mx-auto lg:px-4 md:px-4 px-4">
    <?php
    if (have_posts()):
        while (have_posts()):the_post();
            the_title();
            the_content();
        endwhile;
    endif;
    ?>
</div>
<?php get_footer(); ?>
