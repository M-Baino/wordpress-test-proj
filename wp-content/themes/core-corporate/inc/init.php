<?php
/**
 * Load files.
 *
 * @package Core_Corporate
 */

/**
 * Include default theme options.
 */
require_once get_template_directory() . '/inc/customizer/default.php';

/**
 * Load hooks.
 */

require get_template_directory() . '/inc/hook/callback.php';
require_once get_template_directory() . '/inc/hook/structure.php';
require_once get_template_directory() . '/inc/hook/custom.php';
require_once get_template_directory() . '/inc/hook/basic.php';
require_once get_template_directory() . '/inc/hook/slider-section.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';