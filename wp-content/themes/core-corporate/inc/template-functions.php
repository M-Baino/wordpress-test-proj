<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Core_Corporate
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function core_corporate_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    // Add class for global layout.
    $sidebar_layout = core_corporate_get_option('layout_options'); 
    $sidebar_layout = apply_filters( 'core_corporate_filter_theme_global_layout', $sidebar_layout );
    $classes[] = 'global-layout-' . esc_attr( $sidebar_layout );

    // Add class for global layout.
    $search_layout = core_corporate_get_option('top_left_search'); 
    $search_layout = apply_filters( 'core_corporate_filter_theme_global_layout_search', $search_layout );
    $classes[] = 'global-layout-' . esc_attr( $search_layout );

    return $classes;
	
}
add_filter( 'body_class', 'core_corporate_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function core_corporate_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'core_corporate_pingback_header' );


if ( ! function_exists( 'core_corporate_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     * @since 1.0.0
     *
     * @param int     $length Excerpt length in words.
     * @param WP_Post $post_obj WP_Post instance (Optional).
     * @return string Excerpt.
     */
    function core_corporate_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }

endif;
