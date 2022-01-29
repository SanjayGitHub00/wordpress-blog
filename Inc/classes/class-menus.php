<?php

/**
 * Register Menus.
 *
 * @package advanceBlog
 */

namespace ADVANCE_BLOG\Inc;

use ADVANCE_BLOG\Inc\Traits\Singleton;

class Menus
{
    use Singleton;

    protected function __construct()
    {
        //Load Classes
        $this->setup_hooks();
    }
    protected function setup_hooks()
    {
        // Action and Filter Hooks
        add_action('init', [$this, 'register_menus']);
    }
    public function register_menus()
    {
        register_nav_menus(
            [
                'advanceblog-header-menu' => esc_html__('Header Menu', 'advanceBlog'),
                'advanceblog-sidebar-menu' => esc_html__('Sidebar Menu', 'advanceBlog'),
                'advanceblog-footer-menu' => esc_html__('Footer Menu', 'advanceBlog'),
            ]
        );
    }
    public function get_menu_id($location)
    {
        //Get All Menu Locations
        $locations = get_nav_menu_locations();

        // Get Object id by location
        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id : '';
    }
    public function get_child_menu_items($menu_array, $parent_id)
    {
        $child_menu = [];

        if (!empty($menu_array) && is_array($menu_array)) {
            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    array_push($child_menu, $menu);
                }
            }
        }
        return $child_menu;
    }
}
