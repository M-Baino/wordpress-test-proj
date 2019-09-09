<?php
/**
 * Home Page Options.
 *
 * @package Core_Corporate
 */

$default = core_corporate_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => esc_html__( 'Home Section Options', 'core-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/********************** Slider Section. *************************************/
$wp_customize->add_section( 'section_home_slider',
	array(
		'title'      => esc_html__( 'Slider Section Setting', 'core-corporate' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Slider Section
$wp_customize->add_setting('theme_options[disable_slider_section]', 
	array(
	'default' 			=> $default['disable_slider_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_slider_section]', 
	array(		
	'label' 	=> esc_html__('Enable Slider Section', 'core-corporate'),
	'section' 	=> 'section_home_slider',
	'settings'  => 'theme_options[disable_slider_section]',
	'type' 		=> 'checkbox',	
	)
);
// Slider type
$wp_customize->add_setting('theme_options[slider_layout]', 
    array(
        'default'           => $default['slider_layout'],        
        'sanitize_callback' => 'core_corporate_sanitize_select'
    )
);

$wp_customize->add_control(
    'theme_options[slider_layout]', 
    array(      
        'label'     => esc_html__('Select Slider Type', 'core-corporate'),
        'section'   => 'section_home_slider',
        'settings'  => 'theme_options[slider_layout]',
        'type'      => 'radio',
        'choices'   => array(
            'slider'  => esc_html__('Slider', 'core-corporate'),
            'banner'  => esc_html__('Banner Image', 'core-corporate'),              
        ),
    )
);

// Setting slider_category.
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(
	'default'           => $default['slider_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new core_corporate_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'core-corporate' ),
		'section'  => 'section_home_slider',
		'settings' => 'theme_options[slider_category]',
		'active_callback'   => 'core_corporate_slider_layout',
		'priority' => 100,
		)
	)
);

// Slider Number.
$wp_customize->add_setting( 'theme_options[slider_number]',
	array(
		'default'           => $default['slider_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'core_corporate_sanitize_number',
		)
);
$wp_customize->add_control( 'theme_options[slider_number]',
	array(
		'label'       => esc_html__( 'No of Slider', 'core-corporate' ),
		'section'     => 'section_home_slider',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 115px;' ),
		'active_callback'   => 'core_corporate_slider_layout',
	)
);

// Banner Image
$wp_customize->add_setting('theme_options[banner_image]', 
	array(
	'default'           => $default['banner_image'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'core_corporate_sanitize_number',
	)
);

$wp_customize->add_control('theme_options[banner_image]', 
	array(
	'label'       => esc_html__('Banner Image', 'core-corporate'),
	'description' => esc_html__( 'Enter the ID of post to use as a banner image.', 'core-corporate' ), 
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[banner_image]',		
	'type'        => 'text',	
	'active_callback'   => 'core_corporate_slider_layout_banner',	
	)
);
// Button title
$wp_customize->add_setting('theme_options[slider_button_title]', 
	array(
	'default'           => $default['slider_button_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[slider_button_title]', 
	array(
	'label'       => esc_html__('Button Title', 'core-corporate'),
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[slider_button_title]',		
	'type'        => 'text',
	'priority'   => 100,	
	)
);
// Button Url
$wp_customize->add_setting( 'theme_options[slider_button_url]', 
	array(
	'sanitize_callback'     => 'esc_url_raw',
	'sanitize_js_callback'  =>  'esc_url_raw'
	)
);

$wp_customize->add_control( 'theme_options[slider_button_url]', 
	array(
	'label'     => esc_html__('Button Url','core-corporate'),
	'type'      => 'url',
	'section'   => 'section_home_slider',
	'settings'  => 'theme_options[slider_button_url]',
	'priority'   => 100,
	)
);

/********************** Intro Section *************************************/
$wp_customize->add_section( 'section_home_intro',
	array(
		'title'      => esc_html__( 'Intro Section Setting', 'core-corporate' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Intro Section Title
$wp_customize->add_setting('theme_options[intro_title]', 
	array(
	'default'           => $default['intro_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[intro_title]', 
	array(
	'label'       => esc_html__('Intro Title', 'core-corporate'),
	'section'     => 'section_home_intro',   
	'settings'    => 'theme_options[intro_title]',		
	'type'        => 'text'
	)
);
// Intro Page
$wp_customize->add_setting('theme_options[intro_page]', 
	array(
	'default'           => $default['intro_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'core_corporate_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[intro_page]', 
	array(
	'label'       => esc_html__('Select Intro Page', 'core-corporate'),
    'description' => esc_html__( 'Select page from dropdown or leave blank if you want to hide this section.', 'core-corporate' ), 
	'section'     => 'section_home_intro',   
	'settings'    => 'theme_options[intro_page]',		
	'type'        => 'dropdown-pages'
	)
);

/********************** Service Section *************************************/
$wp_customize->add_section( 'section_home_service',
	array(
		'title'      => esc_html__( 'Service Section Setting', 'core-corporate' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Service Section
$wp_customize->add_setting('theme_options[disable_service_section]', 
	array(
	'default' 			=> $default['disable_service_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_service_section]', 
	array(		
	'label' 	=> esc_html__('Enable Service Section', 'core-corporate'),
	'section' 	=> 'section_home_service',
	'settings'  => 'theme_options[disable_service_section]',
	'type' 		=> 'checkbox',	
	)
);

// Service Section Title
$wp_customize->add_setting('theme_options[service_title]', 
	array(
	'default'           => $default['service_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_title]', 
	array(
	'label'       => esc_html__('Service Title', 'core-corporate'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_title]',		
	'type'        => 'text'
	)
);

// Service Page
$wp_customize->add_setting('theme_options[service_page]', 
	array(
	'default'           => $default['service_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'core_corporate_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[service_page]', 
	array(
	'label'       => esc_html__('Select Service Page', 'core-corporate'),
    'description' => esc_html__( 'Select page from dropdown or leave blank if you want to hide this section.', 'core-corporate' ), 
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_page]',		
	'type'        => 'dropdown-pages'
	)
);
// Setting service category.
$wp_customize->add_setting( 'theme_options[service_category]',
	array(
	'default'           => $default['service_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new core_corporate_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[service_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'core-corporate' ),
		'section'  => 'section_home_service',
		'settings' => 'theme_options[service_category]',		
		'priority' => 100,
		)
	)
);

// Service Number.
$wp_customize->add_setting( 'theme_options[service_number]',
	array(
		'default'           => $default['service_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'core_corporate_sanitize_number',
		)
);
$wp_customize->add_control( 'theme_options[service_number]',
	array(
		'label'       => esc_html__( 'Select number for Service', 'core-corporate' ),
		'section'     => 'section_home_service',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 4, 'step' => 2, 'style' => 'width: 115px;' ),
		
	)
);

/********************** Work Section *************************************/
$wp_customize->add_section( 'section_home_work',
	array(
		'title'      => esc_html__( 'Work Section Setting', 'core-corporate' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Blog Section
$wp_customize->add_setting('theme_options[disable_work_section]', 
	array(
	'default' 			=> $default['disable_work_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_work_section]', 
	array(		
	'label' 	=> esc_html__('Enable Work Section', 'core-corporate'),
	'section' 	=> 'section_home_work',
	'settings'  => 'theme_options[disable_work_section]',
	'type' 		=> 'checkbox',	
	)
);
// Work Section Title
$wp_customize->add_setting('theme_options[work_title]', 
	array(
	'default'           => $default['work_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[work_title]', 
	array(
	'label'       => esc_html__('Our Work Title', 'core-corporate'),
	'section'     => 'section_home_work',   
	'settings'    => 'theme_options[work_title]',		
	'type'        => 'text'
	)
);
// Setting Work category.
$wp_customize->add_setting( 'theme_options[work_category]',
	array(
	'default'           => $default['work_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_multiple_dropdown_taxonomies',
	)
);
$wp_customize->add_control(
	new core_corporate_multiple_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[work_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'core-corporate' ),
		'description' => esc_html__( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'core-corporate' ),
		'section'  => 'section_home_work',
		'settings' => 'theme_options[work_category]',		
		'priority' => 100,
		'multiple'    => true,
		)
	)
);
// Work Number.
$wp_customize->add_setting( 'theme_options[work_number]',
	array(
		'default'           => $default['work_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'core_corporate_sanitize_number',
		)
);
$wp_customize->add_control( 'theme_options[work_number]',
	array(
		'label'       => esc_html__( 'Select number', 'core-corporate' ),
		'section'     => 'section_home_work',
		'settings' => 'theme_options[work_number]',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 4, 'max' => 8, 'step' => 4, 'style' => 'width: 115px;' ),		
	)
);

/********************** Blog Section *************************************/
$wp_customize->add_section( 'section_home_blog',
	array(
		'title'      => esc_html__( 'Blog Section Setting', 'core-corporate' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Blog Section
$wp_customize->add_setting('theme_options[disable_blog_section]', 
	array(
	'default' 			=> $default['disable_service_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'core_corporate_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_blog_section]', 
	array(		
	'label' 	=> esc_html__('Enable Blog Section', 'core-corporate'),
	'section' 	=> 'section_home_blog',
	'settings'  => 'theme_options[disable_blog_section]',
	'type' 		=> 'checkbox',	
	)
);

// Blog Section Title
$wp_customize->add_setting('theme_options[blog_title]', 
	array(
	'default'           => $default['blog_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_title]', 
	array(
	'label'       => esc_html__('Blog Title', 'core-corporate'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_title]',		
	'type'        => 'text'
	)
);
// Blog Section Description
$wp_customize->add_setting('theme_options[blog_description]', 
	array(
	'default'           => $default['blog_description'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_description]', 
	array(
	'label'       => esc_html__('Blog Description', 'core-corporate'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_description]',		
	'type'        => 'text'
	)
);
// Setting Blog category.
$wp_customize->add_setting( 'theme_options[blog_category]',
	array(
	'default'           => $default['blog_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new core_corporate_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[blog_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'core-corporate' ),
		'section'  => 'section_home_blog',
		'settings' => 'theme_options[blog_category]',		
		'priority' => 100,
		)
	)
);

// Blog Number.
$wp_customize->add_setting( 'theme_options[blog_number]',
	array(
		'default'           => $default['blog_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'core_corporate_sanitize_number',
		)
);
$wp_customize->add_control( 'theme_options[blog_number]',
	array(
		'label'       => esc_html__( 'Select number for Blog', 'core-corporate' ),
		'section'     => 'section_home_blog',
		'settings' => 'theme_options[blog_number]',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 2, 'max' => 6, 'step' => 2, 'style' => 'width: 115px;' ),		
	)
);
