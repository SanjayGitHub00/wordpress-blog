<?php

/**
 *  Sidebar Menu Component
 *  @package advanceBlog
 */

use ADVANCE_BLOG\Inc\Menus;

$menu_class = Menus::get_instance();

$sidebar_menu_id = $menu_class->get_menu_id('advanceblog-sidebar-menu');
$sidebar_menu = wp_get_nav_menu_items($sidebar_menu_id);
?>
<div class="canvas-menu flex items-end flex-col justify-start">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close">
        <i class="fas fa-2x fa-times"></i>
    </button>

    <!-- logo -->
    <div class="logo">
        <h1><?php bloginfo('name'); ?></h1>
    </div>

    <!-- menu -->
    <nav>
        <?php
        if (!empty($sidebar_menu) && is_array($sidebar_menu)) {
        ?>
            <ul class="vertical-menu">
                <?php
                foreach ($sidebar_menu as $menu) {
                    if (!$menu->menu_item_parent) {
                        $child_menu_items = $menu_class->get_child_menu_items($sidebar_menu, $menu->ID);
                        $has_childrens = !empty($child_menu_items) && is_array($child_menu_items);
                        if (!$has_childrens) {
                ?>
                            <li class="<?php echo vince_check_active_menu($menu); ?>"><a href="<?php echo esc_url($menu->url); ?>"><?php echo esc_html__($menu->title, 'advanceBlog'); ?></a></li>
                        <?php
                        } else {
                        ?>
                            <li class="<?php echo vince_check_active_menu($menu); ?>">
                                <a href="<?php echo esc_url($menu->url); ?>"><?php echo esc_html__($menu->title, 'advanceBlog'); ?></a>
                                <i class="fas fa-chevron-down icon-arrow-down switch"></i>

                                <ul class="submenu">
                                    <?php
                                    foreach ($child_menu_items as $child_menu_item) {
                                    ?>
                                        <li><a href="<?php echo esc_url($child_menu_item->url); ?>"><?php echo esc_html__($child_menu_item->title, 'advanceBlog'); ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                <?php
                        }
                    }
                }
                ?>

            </ul>
        <?php
        }
        ?>

    </nav>

    <!-- social icons -->
    <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        <li class="list-inline-item">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="list-inline-item">
            <a href="#"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="list-inline-item">
            <a href="#"><i class="fab fa-instagram"></i></a>
        </li>
        <li class="list-inline-item">
            <a href="#"><i class="fab fa-pinterest"></i></a>
        </li>
        <li class="list-inline-item">
            <a href="#"><i class="fab fa-medium"></i></a>
        </li>
        <li class="list-inline-item">
            <a href="#"><i class="fab fa-youtube"></i></a>
        </li>
    </ul>
</div>