<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function khaown_food_menu_page_customize_register( $wp_customize ) {
	/**********************************
	Food Menu page customizer setup
    *********************************/
    $wp_customize->add_panel('food_menu_page_php', array(
        'theme_supports' => '',
		'title'			=> __('Food Menu Page', 'khaown'),
		'description'	=> sprintf(__('Setup your theme Food Menu page', 'khaown') ),
		'priority' 		=> 81
    ) );

    /**********************************
	Header Section setup
    *********************************/
    $wp_customize->add_section( 'food_menu_header_section', array(
		'title'          => __( 'Food Menu Header', 'khaown' ),
        'panel'          => 'food_menu_page_php',
        'priority' 		 => 41
    ) );

    // Top header 
	$rsv_headers[] = array(
		'slug'      =>'khaown_hide_food_menu_header_section', 
		'default'   => 'false',
        'label'     => 'Hide Header Section',
        'type'      => 'checkbox'
    );
    // Top header 
	$rsv_headers[] = array(
		'slug'      =>'khaown_food_menu_header_title', 
		'default'   => 'Food Menu',
        'label'     => 'Header Title',
        'type'      => 'text'
	);
    // Top header 
	$rsv_headers[] = array(
		'slug'      =>'khaown_food_menu_header_font_size', 
		'default'   => '40',
        'label'     => 'Header Font Size',
        'type'      => 'number'
	);
	foreach( $rsv_headers as $rsv_header ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$rsv_header['slug'], array(
				'default' => $rsv_header['default'],
				'sanitize_callback'  => 'esc_attr',
				'type' => 'theme_mod'
			)
		);
		// CONTROLS
        $wp_customize->add_control($rsv_header['slug'], 
            array(
                'label' => $rsv_header['label'], 
                'section' => 'food_menu_header_section',
                'type'    => $rsv_header['type'],
                'settings' => $rsv_header['slug'])
		);
	}
	
	// Top header bg color
	$rsv_header_colors[] = array(
		'slug'=>'khaown_food_menu_header_bg_color', 
		'default' => '#F0DFF6',
		'label' => 'Header Background Color'
	);
    // Top header text color
	$rsv_header_colors[] = array(
		'slug'=>'khaown_food_menu_header_text_color', 
		'default' => '#292929',
		'label' => 'Header Text Color'
    );
    
	foreach( $rsv_header_colors as $rsv_header_color ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$rsv_header_color['slug'], array(
				'default' => $rsv_header_color['default'],
				'sanitize_callback'  => 'esc_attr',
				'type' => 'theme_mod'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$rsv_header_color['slug'], 
				array('label' => $rsv_header_color['label'], 
				'section' => 'food_menu_header_section',
				'priority' 		=>  20,
				'settings' => $rsv_header_color['slug'])
			)
		);
    }
    
    /**********************************
	Middle Body Section setup
    *********************************/
    $wp_customize->add_section( 'khaown_food_menu_body_section', array(
		'title'          => __( 'Main Body', 'khaown' ),
        'panel'          => 'food_menu_page_php',
        'priority' 		 => 41
	) );
	
	// Default Menu Load count 
	$khaown_food_body_funcs[] = array(
		'slug'      =>'khaown_food_menu_default_menu_count', 
		'default'   => '2',
        'label'     => 'Load Menu Item Count',
        'type'      => 'number'
	);
	foreach( $khaown_food_body_funcs as $khaown_food_body ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$khaown_food_body['slug'], array(
				'default' => $khaown_food_body['default'],
				'sanitize_callback'  => 'esc_attr',
				'type' => 'theme_mod'
			)
		);
		// CONTROLS
        $wp_customize->add_control($khaown_food_body['slug'], 
            array(
                'label' => $khaown_food_body['label'], 
                'section' => 'khaown_food_menu_body_section',
                'type'    => $khaown_food_body['type'],
                'settings' => $khaown_food_body['slug'])
		);
	}

    // Body color
	$khaown_food_menu_body_colors[] = array(
		'slug'		=>'khaown_food_menu_body_bg_color', 
		'default'	=> '#ffffff',
		'label' 	=> 'Body Background Color'
	);
	// Body color
	$khaown_food_menu_body_colors[] = array(
		'slug'		=>'khaown_food_menu_item_bg_color', 
		'default'	=> '#f8f8f8',
		'label' 	=> 'Regular Item Background Color'
	);
	// Body color
	$khaown_food_menu_body_colors[] = array(
		'slug'		=>'khaown_food_menu_varient_bg_color', 
		'default'	=> '#333347',
		'label' 	=> 'Varient Item Background Color'
	);
	// Body color
	$khaown_food_menu_body_colors[] = array(
		'slug'		=>'khaown_food_menu_item_border_color', 
		'default'	=> '#ccc',
		'label' 	=> 'Item Border Color'
    );
    
	foreach( $khaown_food_menu_body_colors as $fm_body_color ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$fm_body_color['slug'], array(
				'default' 				=> $fm_body_color['default'],
				'sanitize_callback'  	=> 'esc_attr',
				'type'					=> 'theme_mod'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$fm_body_color['slug'], 
				array('label' 	=> $fm_body_color['label'], 
				'section' 		=> 'khaown_food_menu_body_section',
				'priority' 		=>  20,
				'settings' 		=> $fm_body_color['slug'])
			)
		);
	}
	

    

}
add_action( 'customize_register', 'khaown_food_menu_page_customize_register' );
