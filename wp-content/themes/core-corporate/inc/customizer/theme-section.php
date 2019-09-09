<?php
/**
 * Header Options.
 *
 * @package Core_Corporate
 */

$default = core_corporate_get_default_theme_options();



// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => esc_html__( 'Theme Options', 'core-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/*************************General  Setting Section starts **********************************/
$wp_customize->add_section('section_general', array(    
'title'       => esc_html__('General Option', 'core-corporate'),
'panel'       => 'theme_option_panel'    
));
//Layout Options
$wp_customize->add_setting('theme_options[layout_options]', 
	array(
	'default' 			=> $default['layout_options'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_select'
	)
);

$wp_customize->add_control(new core_corporate_Image_Radio_Control($wp_customize, 'theme_options[layout_options]', 
	array(		
	'label' 	=> esc_html__('Layout Options', 'core-corporate'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left' 			=> get_template_directory_uri() . '/assest/img/left-sidebar.png',							
		'right' 		=> get_template_directory_uri() . '/assest/img/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assest/img/no-sidebar.png',
		),	
	))
);
// Pagaination Option
$wp_customize->add_setting('theme_options[pagination_option]', 
	array(
	'default' 			=> $default['pagination_option'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[pagination_option]', 
	array(		
	'label' 	=> esc_html__('Pagaination Options', 'core-corporate'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[pagination_option]',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'default' 		=> esc_html__('Default', 'core-corporate'),							
		'numeric' 		=> esc_html__('Numeric', 'core-corporate'),		
		),	
	)
);

/*************************Header Setting Section starts **********************************/
$wp_customize->add_section('section_header', 
	array(    
	'title'       => esc_html__('Header Setting', 'core-corporate'),
	'panel'       => 'theme_option_panel'    
	)
);
// Site Identity
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
	'default' 			=> $default['site_identity'],
	'sanitize_callback' => 'core_corporate_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[site_identity]', 
	array(		
	'label' 	=> esc_html__('Choose Option', 'core-corporate'),
	'section' 	=> 'title_tagline',
	'settings'  => 'theme_options[site_identity]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'logo-only' 	=> esc_html__('Logo Only', 'core-corporate'),
			'logo-text' 	=> esc_html__('Logo + Tagline', 'core-corporate'),
			'title-only' 	=> esc_html__('Title Only', 'core-corporate'),
			'title-text' 	=> esc_html__('Title + Tagline', 'core-corporate')
		)
	)
);
// Enable Social Menu
$wp_customize->add_setting('theme_options[enable_top_header]', 
	array(
	'default' 			=> $default['enable_top_header'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_top_header]', 
	array(		
	'label' 	=> esc_html__('Enable Top Header Section', 'core-corporate'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[enable_top_header]',
	'type' 		=> 'checkbox',	
	)
);

// Top Left Header
$wp_customize->add_setting('theme_options[top_left_search]', 
	array(
	'default' 			=> $default['top_left_search'],
	'sanitize_callback' => 'core_corporate_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_left_search]', 
	array(		
	'label' 	=> esc_html__('Choose Option', 'core-corporate'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[top_left_search]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
		'left-search' 	=> esc_html__('Search in Left Side of Header', 'core-corporate'),
		'right-search' 	=> esc_html__('Search in Right Side of Header', 'core-corporate'),	
		'no-search' 	=> esc_html__('No Search', 'core-corporate'),		
		)
	)
);
// Top Right Header
$wp_customize->add_setting('theme_options[top_right_header]', 
	array(
	'default' 			=> $default['top_right_header'],
	'sanitize_callback' => 'core_corporate_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_right_header]', 
	array(		
	'label' 	=> esc_html__('Choose Option', 'core-corporate'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[top_right_header]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'menu+social' 	=> esc_html__('Menu + Social Icon', 'core-corporate'),
			'social+menu' 	=> esc_html__('Social Icon + Menu', 'core-corporate'),			
		)
	)
);
// Setting Address.
$wp_customize->add_setting( 'theme_options[header_address]',
	array(
	'default'           => $default['header_address'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_textarea_content',	
	)
);
$wp_customize->add_control( 'theme_options[header_address]',
	array(
	'label'    => esc_html__( 'Header Address', 'core-corporate' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);
// Setting Phone Number.
$wp_customize->add_setting( 'theme_options[header_number]',
	array(
	'default'           => $default['header_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',	
	)
);
$wp_customize->add_control( 'theme_options[header_number]',
	array(
	'label'    => esc_html__( 'Phone Number', 'core-corporate' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);
// Setting Email
$wp_customize->add_setting('theme_options[header_emial]',  
	array(
	'default'           => $default['header_emial'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_email',
	'priority' => 100,
	)
);

$wp_customize->add_control('theme_options[header_emial]', 
	array(
	'label'       => esc_html__('Contact Email', 'core-corporate'),
	'section'     => 'section_header',   
	'settings'    => 'theme_options[header_emial]',		
	'type'        => 'text'
	)
);
// Enable Social Menu
$wp_customize->add_setting('theme_options[enable_social_header]', 
	array(
	'default' 			=> $default['enable_social_header'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_social_header]', 
	array(		
	'label' 	=> esc_html__('Enable Social Icon Section', 'core-corporate'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[enable_social_header]',
	'type' 		=> 'checkbox',	
	)
);

/************************** Footer Section  ***************************/
// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => esc_html__('Footer Setting', 'core-corporate'),
	'panel'       => 'theme_option_panel'    
	)
);
// Enable Social Menu
$wp_customize->add_setting('theme_options[enable_social_footer]', 
	array(
	'default' 			=> $default['enable_social_footer'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_social_footer]', 
	array(		
	'label' 	=> esc_html__('Enable Social Icon Section', 'core-corporate'),
	'section' 	=> 'section_footer',
	'settings'  => 'theme_options[enable_social_footer]',
	'type' 		=> 'checkbox',	
	)
);
// Setting copyright text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => esc_html__( 'Copyright Text', 'core-corporate' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);
