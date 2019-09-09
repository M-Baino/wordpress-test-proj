<?php
/**
 * Sanitization functions.
 *
 * @package Core_Corporate
 */

if ( ! function_exists( 'core_corporate_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *	
	 */
	function core_corporate_sanitize_select( $input, $setting ) {
		$input = esc_attr( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
endif;

if ( ! function_exists( 'core_corporate_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *	
	 */
	function core_corporate_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

//=============================================================
// Integer Number Sanitization
//=============================================================
if ( ! function_exists( 'core_corporate_sanitize_number' ) ) :

    function core_corporate_sanitize_number( $input, $setting ) {

        $input = absint( $input );

        return ( $input ? $input : $setting->default );

    }

endif;

if ( ! function_exists( 'core_corporate_dropdown_pages' ) ) :
	function core_corporate_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	  
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
endif;

if ( ! function_exists( 'core_corporate_sanitize_textarea_content' ) ) :

	/**
	 * Sanitize textarea content.
	 *
	 * @since 1.0.0
	 *
	 */
	function core_corporate_sanitize_textarea_content( $input, $setting ) {

		return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

	}
endif;

if ( ! function_exists( 'core_corporate_sanitize_multiple_dropdown_taxonomies' ) ) :

/**
 *  Sanitize Multiple Dropdown Taxonomies.
 *  @since 1.0.0
 */
function core_corporate_sanitize_multiple_dropdown_taxonomies( $input ) {
	// Make sure we have array.
	$input = (array) $input;

	// Sanitize each array element.
	$input = array_map( 'absint', $input );

	// Remove null elements.
	$input = array_values( array_filter( $input ) );

	return $input;
}
endif;