<?php

/**
 * Bootstraps the Theme.
 *
 * @package advanceBlog
 */

namespace ADVANCE_BLOG\Inc;

use ADVANCE_BLOG\Inc\Traits\Singleton;

class Assets
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
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }
    public function register_styles()
    {
        // Register Style
        wp_register_style('main-css', ADVANCE_BUILD_CSS_URI . '/main.css', [], filemtime(ADVANCE_BUILD_CSS_DIR_PATH . '/main.css'), 'all');

        // Enqueue Styls
        wp_enqueue_style('main-css');
        wp_enqueue_style('style', get_stylesheet_uri(), [], '1.0', 'all');
    }
    public function register_scripts()
    {
        // Register script
        wp_register_script('main-js', ADVANCE_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(ADVANCE_BUILD_JS_DIR_PATH . '/main.js'), true);

        // Enqueue script
        wp_enqueue_script('main-js');
    }
}
