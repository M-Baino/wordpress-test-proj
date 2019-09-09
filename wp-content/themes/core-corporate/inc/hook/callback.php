<?php
/**
 * Basic  Callback theme functions.
 *
 * This file contains hook  Callback functions attached to core hooks.
 *
 * @package Core_Corporate
 */
//=============================================================
		// Active callback for Slider
//=============================================================
if ( ! function_exists( 'core_corporate_slider_layout' ) ) :

    function core_corporate_slider_layout( $control ) { 
        
        if( 'slider' == $control->manager->get_setting('theme_options[slider_layout]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

//=============================================================
		// Active callback for Banner
//=============================================================
if ( ! function_exists( 'core_corporate_slider_layout_banner' ) ) :

    function core_corporate_slider_layout_banner( $control ) { 
        
        if( 'banner' == $control->manager->get_setting('theme_options[slider_layout]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;