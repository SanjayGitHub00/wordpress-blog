<?php

/**
 *  Footer Template
 * @package advanceBlog
 */

$menu_class = \ADVANCE_BLOG\Inc\Menus::get_instance();
$footer_menu_id = $menu_class->get_menu_id('advanceblog-footer-menu');

$footer_menu = wp_get_nav_menu_items($footer_menu_id);
?>
<footer>
    <div class="container m-auto px-4 my-8">
        <a id="return-to-top" class="md:float-right mb-4" role="button">
            <i class="fas fa-chevron-up"></i>
            Back to Top
        </a>
        <div class="
              footer__section
              flex
              items-center
              justify-between
              lg:flex-row
              flex-col
              clear-both
            ">
            <div class="left__section">
                <p>&copy; 2022 | All rights reserved</p>
            </div>
            <div class="right__section">
                <?php
                if (!empty($footer_menu) && is_array($footer_menu)) {
                    ?>
                    <ul class="footer__menu flex items-center">
                        <?php
                        foreach ($footer_menu as $menu_item) {
                            ?>
                            <li class="menu__item <?php echo vince_check_active_menu($menu_item); ?>">
                                <a href="<?php echo esc_url($menu_item->url); ?>"><?php echo esc_html__($menu_item->title, 'advanceBlog'); ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- Sidebar menu -->
<?php
get_template_part('template-parts/footer/sidebar', 'menu');
?>
<!-- search pop up  -->
<div class="search-popup">
    <button class="btn-close" aria-label="Close" type="button">
        <i class="fa fa-close fa-2x"></i>
    </button>

    <div class="search-content">
        <div class="text-center">
            <h3 class="mb-4 mt-0">Press ESC to close</h3>
        </div>

        <?php
        get_search_form();
        ?>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>