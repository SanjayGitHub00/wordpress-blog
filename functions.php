<?php

/**
 *  Functions Template
 *  @package advanceBlog
 */

use ADVANCE_BLOG\Inc\ADVANCE_BLOG;

if (!defined('ADVANCE_DIR_PATH')) {
    define('ADVANCE_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('ADVANCE_DIR_URI')) {
    define('ADVANCE_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('ADVANCE_BUILD_URI')) {
    define('ADVANCE_BUILD_URI', untrailingslashit(get_template_directory_uri()) . '/Assets/build');
}

if (!defined('ADVANCE_BUILD_PATH')) {
    define('ADVANCE_BUILD_PATH', untrailingslashit(get_template_directory()) . '/Assets/build');
}

if (!defined('ADVANCE_BUILD_JS_URI')) {
    define('ADVANCE_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . '/Assets/build/js');
}

if (!defined('ADVANCE_BUILD_JS_DIR_PATH')) {
    define('ADVANCE_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/Assets/build/js');
}

if (!defined('ADVANCE_BUILD_IMG_URI')) {
    define('ADVANCE_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . '/Assets/build/src/img');
}

if (!defined('ADVANCE_BUILD_CSS_URI')) {
    define('ADVANCE_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/Assets/build/css');
}

if (!defined('ADVANCE_BUILD_CSS_DIR_PATH')) {
    define('ADVANCE_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory()) . '/Assets/build/css');
}

if (!defined('ADVANCE_BUILD_LIB_URI')) {
    define('ADVANCE_BUILD_LIB_URI', untrailingslashit(get_template_directory_uri()) . '/Assets/build/library');
}


require_once ADVANCE_DIR_PATH . '/inc/helpers/autoloader.php';
require_once ADVANCE_DIR_PATH . '/inc/helpers/template-tags.php';

function vince_check_active_menu($menu_item)
{
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($actual_link == $menu_item->url) {
        return 'active';
    }
    return '';
}

function advance_get_theme_instance()
{
    ADVANCE_BLOG::get_instance();
}

advance_get_theme_instance();
