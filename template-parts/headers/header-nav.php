<?php

/**
 *  Header Nav Bar
 *  @package advanceBlog
 */

use ADVANCE_BLOG\Inc\Menus;

$menu_class = Menus::get_instance();

$header_menu_id = $menu_class->get_menu_id('advanceblog-header-menu');

$header_menu = wp_get_nav_menu_items($header_menu_id);

?>
<header class="container m-auto lg:px-4 md:px-4">
    <div class="header__topBar flex justify-between align-center">
        <div class="desktop__socials">
            <a href="#"><i class="fa fab fa-facebook-f mr-4"></i></a>
            <a href="#"><i class="fa fab fa-twitter mr-4"></i></a>
            <a href="#"><i class="fa fab fa-instagram mr-4"></i></a>
            <a href="#"><i class="fa fab fab fa-pinterest mr-4"></i></a>
            <a href="#"><i class="fa fab fab fa-medium mr-4"></i></a>
            <a href="#"><i class="fa fab fab fa-youtube"></i></a>
        </div>
        <div class="logo__section">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
            ?>
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
                <p><?php bloginfo('description'); ?></p>
            <?php
            }
            ?>
            <!-- <img src="http://placehold.jp/80x80.png" alt="Logo" /> -->

        </div>
        <div class="right__section">
            <div class="search"><i class="fa fa-search"></i></div>
            <div class="humburger">
                <i class="fa fas fa-bars"></i>
            </div>
        </div>
    </div>
    <div class="main__nav container">

        <?php
        if (!empty($header_menu) && is_array($header_menu)) {
        ?>
            <ul class="nav__bar m-auto flex justify-center items-center">
                <?php
                foreach ($header_menu as $menu_item) {
                    if (!$menu_item->menu_item_parent) {
                        $child_menu_items = $menu_class->get_child_menu_items($header_menu, $menu_item->ID);
                        $has_children = !empty($child_menu_items) && is_array($child_menu_items);
                        if (!$has_children) {
                ?>
                            <li class="nav-item <?php echo vince_check_active_menu($menu_item);  ?>">
                                <a href="<?php echo esc_url($menu_item->url); ?>" class="nav-link"><?php echo esc_html__($menu_item->title, 'advanceBlog'); ?></a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item dropdown <?php echo vince_check_active_menu($menu_item); ?>">
                                <a href="<?php echo esc_url($menu_item->url); ?>" class="nav-link dropdown-toggle"><?php echo esc_html__($menu_item->title, 'advanceBlog'); ?> <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu shadow-lg">
                                    <?php
                                    foreach ($child_menu_items as $child_menu_item) {
                                    ?>
                                        <li>
                                            <a href="<?php echo esc_url($child_menu_item->url); ?>" class="dropdown-item"><?php echo esc_html__($child_menu_item->title, 'advanceBlog'); ?></a>
                                        </li>
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


    </div>
</header>