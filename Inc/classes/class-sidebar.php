<?php

/**
 * sidebar of the Theme.
 *
 * @package advanceBlog
 */

namespace ADVANCE_BLOG\Inc;

use ADVANCE_BLOG\Inc\Traits\Singleton;

class Sidebar
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
        add_action('widgets_init', [$this, 'register_widgets']);
    }
    public function register_widgets()
    {
        register_sidebar([
            'name'          => __('Sidebar', 'advanceBlog'),
            'id'            => 'sidebar-1',
            'description'   => __('Main sidebar.', 'advanceBlog'),
            'before_widget' => '<div id="%1$s" class="widget widget_sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ]);
        register_sidebar([
            'name'          => __('Blog Page Sidebar', 'advanceBlog'),
            'id'            => 'sidebar-2',
            'description'   => __('Blog Page sidebar.', 'advanceBlog'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ]);
    }
}
