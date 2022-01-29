<?php

/**
 *  Content None Template
 *  @package advanceBlog
 */
?>

<section class="no-result not-found">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Nothing found', 'advanceBlog'); ?></h1>
        </header>
        <div class="page-content">
            <?php
            if (is_home() && current_user_can('publish_posts')) {
            ?>
                <p>
                    <?php
                    printf(
                        wp_kses(
                            __('Ready to publish your first post? <a href="%s">Get Started Here</a>', 'advanceBlog'),
                            [
                                'a' => [
                                    'href' => [],
                                    'class' => []
                                ]
                            ]
                        ),
                        esc_url(admin_url('post-new.php'))
                    );
                    ?>
                </p>
            <?php
            } elseif (is_search()) {
            ?>
                <p>
                    <?php
                    esc_html_e('Sorry, but nothing match for your search item. Please try again with some different items.', 'advanceBlog');
                    ?>
                </p>
            <?php
                get_search_form();
            } else {
            ?>
                <p>
                    <?php
                    esc_html_e('It seem like that we can\'t find any item related to your search. Perhaps search can help.', 'advanceBlog');
                    ?>
                </p>
            <?php
                get_search_form();
            }
            ?>
        </div>
    </div>
</section>