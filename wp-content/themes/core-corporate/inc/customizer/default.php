<?php
/**
 * Default theme options.
 *
 * @package Core_Corporate
 */

if ( ! function_exists( 'core_corporate_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function core_corporate_get_default_theme_options() {

	$defaults = array();

	$defaults['site_identity'] 						= 'title-text';
	$defaults['enable_top_header'] 					= 'true';
	$defaults['top_left_search'] 					= 'left-search';
	$defaults['top_right_header'] 					= 'menu+social';
	$defaults['enable_social_header'] 				= 'false';
	$defaults['header_address'] 					= '';
	$defaults['header_number'] 						= '';
	$defaults['header_emial'] 						= '';


	/******************************  Slider Section      *********************************/
	$defaults['disable_slider_section'] 			= false;
	$defaults['slider_category']	   	 			= 0; 
	$defaults['slider_number']						= 3;
	$defaults['slider_layout']						= 'slider';
	$defaults['banner_image']						= '';
	$defaults['slider_button_title']				= esc_html__('Login','core-corporate');
	$defaults['slider_button_url']					= '';	

	/******************************  Intro Section      *********************************/	
	$defaults['intro_title'] 						= '';
	$defaults['intro_page'] 						= 0;

	/******************************  Sercive Section      *********************************/
	$defaults['disable_service_section'] 			= false;	
	$defaults['service_title'] 						= '';
	$defaults['service_page'] 						= 0;
	$defaults['service_category'] 					= 0;
	$defaults['service_number'] 					= 4;

	/******************************  Blog Section    *********************************/
	$defaults['disable_blog_section'] 				= false;	
	$defaults['blog_title'] 						= '';
	$defaults['blog_description'] 					= '';;
	$defaults['blog_category'] 						= 0;
	$defaults['blog_number'] 						= 2;	

	/******************************  Work Section    *********************************/
	$defaults['disable_work_section'] 				= false;
	$defaults['work_title'] 						= '';
	$defaults['work_category']      				= array();		
	$defaults['work_number'] 						= 4;

	/******************************** General  Section **********************************/
	$defaults['layout_options'] 					= 'right';
	$defaults['pagination_option'] 					= 'default';

	/******************************** Footer Section **********************************/
	$defaults['enable_social_footer'] 				= false;
	$defaults['copyright_text'] 					= '';
	


	// Pass through filter.
	$defaults = apply_filters( 'core_corporate_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'core_corporate_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function core_corporate_get_option( $key ) {

		$default_options = core_corporate_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;
	}

endif;