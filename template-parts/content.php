<?php

/**
 *  Load Content
 *  @package advanceBlog
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(['latest__post', 'border-2']); ?>>
    <?php
    get_template_part('template-parts/entry/entry', 'header');
    ?>
    <?php
    get_template_part('template-parts/entry/entry', 'content');
    ?>
</article>