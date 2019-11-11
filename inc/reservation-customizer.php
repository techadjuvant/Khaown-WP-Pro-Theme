<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function khaown_reservation_page_customize_register( $wp_customize ) {
	/**********************************
	Reservation page customizer setup
    *********************************/
    $wp_customize->add_panel('reservation_page_php', array(
        'theme_supports' => '',
		'title'			 => __('Reservation Page', 'khaown'),
		'description'	 => sprintf(__('Setup your theme reservation page', 'khaown') ),
		'priority' 		 => 81
    ) );

    /**********************************
	Header Section setup
    *********************************/
    $wp_customize->add_section( 'reservation_header_section', array(
		'title'          => __( 'Reservation Header', 'khaown' ),
        'panel'          => 'reservation_page_php',
        'priority' 		 => 41
    ) );

    // Top header 
	$rsv_headers[] = array(
		'slug'      =>'hide_header_section', 
		'default'   => 0,
        'label'     => 'Hide Header Section',
        'type'      => 'checkbox'
    );
    // Top header 
	$rsv_headers[] = array(
		'slug'      =>'rsv_header_title', 
		'default'   => 'Reservation',
        'label'     => 'Header Title',
        'type'      => 'text'
	);
    // Top header 
	$rsv_headers[] = array(
		'slug'      =>'rsv_font_size', 
		'default'   => '40',
        'label'     => 'Header Font Size',
        'type'      => 'number'
	);
	
	foreach( $rsv_headers as $rsv_header ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$rsv_header['slug'], array(
				'default' 				=> $rsv_header['default'],
				'sanitize_callback'  	=> 'esc_attr',
				'type' 					=> 'theme_mod'
			)
		);
		// CONTROLS
        $wp_customize->add_control($rsv_header['slug'], 
            array(
                'label' 			=> $rsv_header['label'], 
                'section' 			=> 'reservation_header_section',
                'type'    			=> $rsv_header['type'],
                'settings' 			=> $rsv_header['slug'])
		);
    }


    
    /**********************************
	Middle Body Section setup
    *********************************/
    $wp_customize->add_section( 'reservation_middle_body_section', array(
		'title'          => __( 'Middle Body Section', 'khaown' ),
        'panel'          => 'reservation_page_php',
        'priority' 		 => 41
    ) );
    // Display Middle Body setting setup
	$wp_customize->add_setting('rsv_hide_middle_body_section', array(
		'default'			=> 0,
		'sanitize_callback' => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display Middle Body Control setup
	$wp_customize->add_control(
        'rsv_hide_middle_body_section',
        array(
            'label'      => __( 'Hide Middle Body Section', 'khaown' ),
            'section'    => 'reservation_middle_body_section',
            'type'    => 'checkbox',
            'settings'   => 'rsv_hide_middle_body_section',
        )
    );

    // Body text color
	$rsv_body_colors[] = array(
		'slug'		=>'rsv_middle_body_bg_color', 
		'default' 	=> '#ffffff',
		'label' 	=> 'Body Background Color'
    );
    // Body text color
	$rsv_body_colors[] = array(
		'slug'			=>'rsv_middle_body_text_color', 
		'default' 		=> '#7a7a7a',
		'label' 		=> 'Header Text Color'
    );
	foreach( $rsv_body_colors as $rsv_body_color ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$rsv_body_color['slug'], array(
				'default' 				=> $rsv_body_color['default'],
				'sanitize_callback'  	=> 'esc_attr',
				'type' 					=> 'theme_mod'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$rsv_body_color['slug'], 
				array('label' 		=> $rsv_body_color['label'], 
				'section' 			=> 'reservation_middle_body_section',
				'settings' 			=> $rsv_body_color['slug'])
			)
		);
    }

    // Display Middle Body Title setting setup
	$wp_customize->add_setting('rsv_middle_body_title', array(
		'default'			=> 'Select your type of reservation here',
		'sanitize_callback' => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display Middle Body Title Control setup
	$wp_customize->add_control(
        'rsv_middle_body_title', 
        array(
            'label'      => __( 'Middle Body Title', 'khaown' ),
            'section'    => 'reservation_middle_body_section',
            'type'    => 'text',
            'settings'   => 'rsv_middle_body_title',
        )
    );
    // Display Middle Body Desc setting setup
	$wp_customize->add_setting('rsv_middle_body_desc', array(
		'default'			=> 'Here will be your description about the reservation.',
		'sanitize_callback' => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display Middle Body Desc Control setup
	$wp_customize->add_control(
        'rsv_middle_body_desc', 
        array(
            'label'      => __( 'Reservation Description', 'khaown' ),
            'section'    => 'reservation_middle_body_section',
            'type'    	 => 'textarea',
            'settings'   => 'rsv_middle_body_desc',
        )
    );

    $reservation_default_photo = get_stylesheet_directory_uri() . '/assets/img/khaown-reservation.jpg';

    $reservation_image[] = array(
		'slug'        => 'upload_media_reservation_image', 
        'label'       => __( 'Reservation Photo', 'khaown' ),
        'default'     => $reservation_default_photo,
	);

	foreach( $reservation_image as $rsv_image ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$rsv_image['slug'], array(
                'default' 				=> $rsv_image['default'],
				'type' 					=> 'theme_mod',
				'sanitize_callback'  	=> 'esc_attr'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Upload_Control( 
				$wp_customize,
				$rsv_image['slug'], 
				array('label' 			=> $rsv_image['label'], 
				'section' 				=> 'reservation_middle_body_section',
				'settings' 				=> $rsv_image['slug'])
			)
		);
    }

    /**********************************
	Reservation Form Section setup
    *********************************/
    $wp_customize->add_section( 'reservation_form_section', array(
		'title'          => __( 'Form Section', 'khaown' ),
        'panel'          => 'reservation_page_php',
        'priority' 		 => 41
    ) );
    // Display Reservation Form setting setup
	$wp_customize->add_setting('rsv_hide_form_section', array(
		'default'			=> 0,
		'sanitize_callback' => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display Reservation Form Control setup
	$wp_customize->add_control('rsv_hide_form_section',
        array(
            'label'      => __( 'Hide Reservation Form Section', 'khaown' ),
            'section'    => 'reservation_form_section',
            'type'    => 'checkbox',
            'settings'   => 'rsv_hide_form_section',
        )
	);

	// Email of Reservation Form Control setup
	$wp_customize->add_setting('rsv_receiver_email_of_reservation', array(
		'default'			=> 'yourEmail@example.com',
		'sanitize_callback' => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Email of Reservation Form Control setup
	$wp_customize->add_control(
        'rsv_receiver_email_of_reservation',
        array(
            'label'      => __( 'Email Address of Receiver', 'khaown' ),
            'section'    => 'reservation_form_section',
            'type'    	 => 'text',
            'settings'   => 'rsv_receiver_email_of_reservation',
        )
    );
    $rsv_form_colors[] = array(
		'slug'			=>'rsv_form_bg_color', 
		'default' 		=> '#F0DFF6',
		'label' 		=> 'form Section Background Color'
    );
    $rsv_form_colors[] = array(
		'slug'			=>'rsv_form_text_color', 
		'default'		=> '#7a7a7a',
		'label' 		=> 'form Section Text Color'
    );
	foreach( $rsv_form_colors as $rsv_form_color ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$rsv_form_color['slug'], array(
				'default' 				=> $rsv_form_color['default'],
				'sanitize_callback'  	=> 'esc_attr',
				'type' 					=> 'theme_mod'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$rsv_form_color['slug'], 
				array(
					'label' 		=> $rsv_form_color['label'], 
					'section' 		=> 'reservation_form_section',
					'priority' 		=>  20,
					'settings' 		=> $rsv_form_color['slug'])
			)
		);
    }

    // Display Reservation Form Left Heading setting setup
	$wp_customize->add_setting('rsv_reserve_form_left_heading', array(
		'default'			=> 'For general information please use our contact form here - this form is for table reservations.',
		'sanitize_callback' => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display Reservation Form Left Heading Control setup
	$wp_customize->add_control(
        'rsv_reserve_form_left_heading',
        array(
            'label'      => __( 'Left Part Heading', 'khaown' ),
            'section'    => 'reservation_form_section',
            'type'    	 => 'textarea',
            'settings'   => 'rsv_reserve_form_left_heading',
        )
    );
    // Display Reservation Form setting setup
	$wp_customize->add_setting('rsv_hide_form_left_address', array(
		'default'			=> 0,
		'sanitize_callback' => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display Reservation Form Control setup
	$wp_customize->add_control(
        'rsv_hide_form_left_address',
        array(
            'label'      => __( 'Hide Address', 'khaown' ),
            'section'    => 'reservation_form_section',
            'type'    	 => 'checkbox',
            'settings'   => 'rsv_hide_form_left_address',
        )
    );

    $rsv_form_table_sizes[] = array(
		'slug'			=>'rsv_form_table_size_1', 
		'default' 		=> 'Small Size Table',
		'label' 		=> 'Name Your Tabel Size Option 1'
    );
    $rsv_form_table_sizes[] = array(
		'slug'			=>'rsv_form_table_size_2', 
		'default' 		=> 'Average Size Table',
		'label' 		=> 'Name Your Tabel Size Option 2'
    );
    $rsv_form_table_sizes[] = array(
		'slug'			=>'rsv_form_table_size_3', 
		'default'		=> 'Large Size Table',
		'label' 		=> 'Name Your Tabel Size Option 3'
    );
	foreach( $rsv_form_table_sizes as $rsv_form_table_size ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$rsv_form_table_size['slug'], array(
				'default' 				=> $rsv_form_table_size['default'],
				'sanitize_callback'  	=> 'esc_attr',
				'type' 					=> 'theme_mod'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$rsv_form_table_size['slug'], 
				array(
					'label' 		=> $rsv_form_table_size['label'], 
					'section' 		=> 'reservation_form_section',
					'priority' 		=>  20,
					'settings' 		=> $rsv_form_table_size['slug'])
			)
		);
    }


    

}
add_action( 'customize_register', 'khaown_reservation_page_customize_register' );
