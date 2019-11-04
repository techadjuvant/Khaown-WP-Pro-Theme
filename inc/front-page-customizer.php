<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function khaown_front_page_customize_register( $wp_customize ) {
	/**********************************
		Static Front page setup
    *********************************/
    
	$wp_customize->add_panel('front_page_php', array(
        'theme_supports' => '',
		'title'			=> __('Static Front Page', 'khaown'),
		'description'	=> sprintf(__('Setup your theme Top header', 'khaown') ),
		'priority' 		=> 81
    ) );

    /**********************************
		Full Screen Section setup
    *********************************/
    $wp_customize->add_section( 'header_fullscreen_section', array(
		'title'          => __( 'Header Full Screen Section', 'khaown' ),
        'description'    => __( 'Set editable text for certain content.', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );
    

	// FullScreen Photo setting setup
	$wp_customize->add_setting('upload_media_fullscreen_image', array(
		'default'			=> __( '', 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// FullScreen Photo Control setup
	$wp_customize->add_control(
		new WP_Customize_Upload_Control( 
			$wp_customize, 
			'upload_media_fullscreen_image', 
			array(
				'label'      => __( 'Front-Page Header Image', 'khaown' ),
				'section'    => 'header_fullscreen_section',
				'settings'   => 'upload_media_fullscreen_image',
			) 
		) 
	);
	
	// Fullscreen Title
	$wp_customize->add_setting('khaown_fullscreen_title', array(
		'default'			=> __( "About Your Website", 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Location Control setup
	$wp_customize->add_control(
        'khaown_fullscreen_title', 
        array(
            'label'      => __( 'About Your Website ( Title )', 'khaown' ),
            'section'    => 'header_fullscreen_section',
            'type'    => 'text',
            'settings'   => 'khaown_fullscreen_title',
        )
	);
	
	// Fullscreen Description
	$wp_customize->add_setting('khaown_fullscreen_desc', array(
		'default'			=> __( 'Your business purpose. Small description will clear your visitor about your misson & they will be attracted with what your offer', 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Location Control setup
	$wp_customize->add_control(
        'khaown_fullscreen_desc', 
        array(
            'label'      => __( 'Your business purpose. Small description will clear your visitor about your misson & they will be attracted with what your offer', 'khaown' ),
            'section'    => 'header_fullscreen_section',
            'type'    => 'textarea',
            'settings'   => 'khaown_fullscreen_desc',
        )
    );



    /**********************************
		Location Section setup
    *********************************/
    $wp_customize->add_section( 'location_section', array(
		'title'          => __( 'Location Section', 'khaown' ),
        'description'    => __( 'Set editable text for certain content.', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );

    // Location setting setup
	$wp_customize->add_setting('hide_location_section', array(
		'default'			=> __( false, 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Location Control setup
	$wp_customize->add_control(
        'hide_location_section', 
        array(
            'label'      => __( 'Hide Location Section', 'khaown' ),
            'section'    => 'location_section',
            'type'    => 'checkbox',
            'settings'   => 'hide_location_section',
        )
    );
    
    // Location setting setup
	$wp_customize->add_setting('location_google_map_link', array(
		'default'			=> __( '', 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Location Control setup
	$wp_customize->add_control(
        'location_google_map_link', 
        array(
            'label'      => __( 'Google Map Location', 'khaown' ),
            'description'	=> sprintf(__('Paste only the src link from Google embed option, not the full iframe.', 'khaown') ),
            'section'    => 'location_section',
            'type'    => 'textarea',
            'settings'   => 'location_google_map_link',
        )
    );

     // Location Address setting setup
	$wp_customize->add_setting('location_address', array(
		'default'			=> __( 'Khaown <br>
        DHANMONDI HOUSE 84, <br> 
        ROAD 7/A  <br> 
        SATMOSJID ROAD <br>
        DHANMONDI R/A <br>
        DHAKA 1205  <br>
        PHONE: XXXXXX, XXXXXX <br>
        EMAIL: khaown@khaown.com', 'khaown'),
		'type' 				=> 'theme_mod'
	) );
	
	// Location Address Control setup
	$wp_customize->add_control(
        'location_address', 
        array(
            'label'      => __( 'Address', 'khaown' ),
            'description'	=> sprintf(__('Share Your Physical Address. Add br inside angle brackets <> to go on a new line.', 'khaown') ),
            'section'    => 'location_section',
            'type'    => 'textarea',
            'settings'   => 'location_address',
        )
    );

    /**********************************
		Products Section setup
    *********************************/
    $wp_customize->add_section( 'products_section', array(
		'title'          => __( 'Products Section', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );
    // Display products setting setup
	$wp_customize->add_setting('hide_products_section', array(
		'default'			=> __( true, 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display products Control setup
	$wp_customize->add_control(
        'hide_products_section', 
        array(
            'label'      => __( 'Hide Products Section', 'khaown' ),
            'section'    => 'products_section',
            'type'    => 'checkbox',
            'settings'   => 'hide_products_section',
        )
    );


    /**********************************
		About Section setup
    *********************************/
    $wp_customize->add_section( 'about_section', array(
		'title'          => __( 'About Section', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );
    // Display About setting setup
	$wp_customize->add_setting('hide_about_section', array(
		'default'			=> __( false, 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display About Control setup
	$wp_customize->add_control(
        'hide_about_section', 
        array(
            'label'      => __( 'Hide About Section', 'khaown' ),
            'section'    => 'about_section',
            'type'    => 'checkbox',
            'settings'   => 'hide_about_section',
        )
    );

    // About Title setting setup
	$wp_customize->add_setting('about_section_title', array(
		'default'			=> __( 'URBAN NEIGHBORHOOD RESTAURANT', 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// About Title Control setup
	$wp_customize->add_control(
        'about_section_title', 
        array(
            'label'      => __( 'About Section Title', 'khaown' ),
            'section'    => 'about_section',
            'type'    => 'textarea',
            'settings'   => 'about_section_title',
        )
    );

    // About Sub Title setting setup
	$wp_customize->add_setting('about_section_sub_title', array(
		'default'			=> __( 'DHANMONDI DHAKA', 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// About Sub Title Control setup
	$wp_customize->add_control(
        'about_section_sub_title', 
        array(
            'label'      => __( 'About Section Sub Title', 'khaown' ),
            'section'    => 'about_section',
            'type'    => 'text',
            'settings'   => 'about_section_sub_title',
        )
    );

    // About Section Description setting setup
	$wp_customize->add_setting('about_section_description', array(
        'default'			=> __( 'Opening in 2014, Khaown Kitchen was the creation of Dhaka hometown favorite Chef Kerry Simon and restaurateur Cory Harwell. <br><br> The plan, to develop the first urban casual eatery, inside the re-purposed mid-century John E.   Khaown - a skeleton of Downtown Dhaka yesteryears, now home to its eclectic mix of tenants including a sushi bar, tattoo parlor, pilates studio, creative agencies, donut & coffee bar and Chef Simon\'s playful interpretations on American comfort food.', 'khaown'),
		// 'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// About Section Description Control setup
	$wp_customize->add_control(
        'about_section_description', 
        array(
            'label'      => __( 'About Section Sub Title', 'khaown' ),
            'section'    => 'about_section',
            'type'    => 'textarea',
            'settings'   => 'about_section_description',
        )
    );


    /**********************************
		Parallux Section setup
    *********************************/
    $wp_customize->add_section( 'parallux_section', array(
		'title'          => __( 'Parallux Section', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );
    // Display Parallux setting setup
	$wp_customize->add_setting('hide_parallux_section', array(
		'default'			=> __( false, 'khaown'),
		'sanitize_callback'  => 'esc_attr',
		'type' 				=> 'theme_mod'
	) );
	
	// Display Parallux Control setup
	$wp_customize->add_control(
        'hide_parallux_section', 
        array(
            'label'      => __( 'Hide Parallux Section', 'khaown' ),
            'section'    => 'parallux_section',
            'type'    => 'checkbox',
            'settings'   => 'hide_parallux_section',
        )
    );


    $parallux_image[] = array(
		'slug'=> 'upload_media_parallux_image_1', 
        'label'      => __( 'Parllux Image 1', 'khaown' ),
    );
    $parallux_image[] = array(
		'slug'        => 'upload_media_parallux_image_2', 
        'label'       => __( 'Parllux Image 2', 'khaown' ),
    );
    $parallux_image[] = array(
		'slug'        => 'upload_media_parallux_image_3', 
        'label'       => __( 'Parllux Image 3', 'khaown' ),
	);

	foreach( $parallux_image as $image ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$image['slug'], array(
				'type' => 'theme_mod',
				'sanitize_callback'  => 'esc_attr'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Upload_Control( 
				$wp_customize,
				$image['slug'], 
				array('label' => $image['label'], 
				'section' => 'parallux_section',
				'settings' => $image['slug'])
			)
		);
    }
    
     /**********************************
		Review Section setup
    *********************************/
    $wp_customize->add_section( 'review_section', array(
		'title'          => __( 'Review Section', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );

    // Display Review setting setup
	$wp_customize->add_setting('hide_review_section', array(
		'default'			=> __( 'false', 'khaown'),
		'sanitize_callback' => 'esc_attr',
        'type' 				=> 'theme_mod',
        'priority' 		 	=> 41
	) );
	
	// Display Review Control setup
	$wp_customize->add_control(
        'hide_review_section', 
        array(
            'label'      => __( 'Hide Review Section', 'khaown' ),
            'section'    => 'review_section',
            'type'    	 => 'checkbox',
            'settings'   => 'hide_review_section',
        )
	);
	// Display Review setting setup
	$wp_customize->add_setting('khaown_show_max_reviews', array(
		'default'			=> __( '3', 'khaown'),
		'sanitize_callback' => 'esc_attr',
        'type' 				=> 'theme_mod',
        'priority' 		 	=> 41
	) );
	
	// Display Review Control setup
	$wp_customize->add_control(
        'khaown_show_max_reviews', 
        array(
            'label'      => __( 'Shaw Max Number of Review', 'khaown' ),
            'section'    => 'review_section',
            'type'    	 => 'number',
            'settings'   => 'khaown_show_max_reviews',
        )
    );
    $review_bg_image[] = array(
		'slug'        => 'upload_media_review_bg_image', 
        'label'       => __( 'Review Background Image', 'khaown' ),
        'section' 	  => 'review_section',
	);

	foreach( $review_bg_image as $bg_image ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$bg_image['slug'], array(
				'type' => 'theme_mod',
				'sanitize_callback'  => 'esc_attr'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Upload_Control( 
				$wp_customize,
				$bg_image['slug'], 
				array(
                'label' => $bg_image['label'], 
				'section' => $bg_image['section'], 
				'settings' => $bg_image['slug'])
			)
		);
	}
	
	// Schedule bg color
	$khaown_review_bg_colors[] = array(
		'slug'=> 'khaown_review_bg_color', 
		'default' => '#f0dff6',
		'label' => 'Review Section Background Color'
	);

	foreach( $khaown_review_bg_colors as $review_bg_color ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$review_bg_color['slug'], array(
				'default' => $review_bg_color['default'],
				'type' => 'theme_mod',
				'sanitize_callback'  => 'esc_attr'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$review_bg_color['slug'], 
				array('label' => $review_bg_color['label'], 
				'section' => 'review_section',
				'settings' => $review_bg_color['slug'])
			)
		);
    }

    


    /**********************************
		Schedule Section setup
    *********************************/
    $wp_customize->add_section( 'schedule_section', array(
		'title'          => __( 'Schedule Section', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );

    // Display Schedule setting setup
	$wp_customize->add_setting('hide_schedule_section', array(
		'default'			=> __( false, 'khaown'),
		'sanitize_callback'  => 'esc_attr',
        'type' 				=> 'theme_mod',
        'priority' 		 => 41
	) );
	
	// Display Schedule Control setup
	$wp_customize->add_control(
        'hide_schedule_section', 
        array(
            'label'      => __( 'Hide Schedule Section', 'khaown' ),
            'section'    => 'schedule_section',
            'type'    => 'checkbox',
            'settings'   => 'hide_schedule_section',
        )
    );

    // Schedule bg color
	$schedule_colors[] = array(
		'slug'=> 'schedule_bg_color', 
		'default' => '#7774B3',
		'label' => 'Background Color'
    );
    // Schedule bg color
	$schedule_colors[] = array(
		'slug'=> 'schedule_text_color', 
		'default' => '#292929',
		'label' => 'Text Color'
	);

	foreach( $schedule_colors as $sch_color ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$sch_color['slug'], array(
				'default' => $sch_color['default'],
				'type' => 'theme_mod',
				'sanitize_callback'  => 'esc_attr'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$sch_color['slug'], 
				array('label' => $sch_color['label'], 
				'section' => 'schedule_section',
				'settings' => $sch_color['slug'])
			)
		);
    }
    
    
    // Schedule Title
	$schedule_details[] = array(
		'slug'=> 'schedule_title', 
		'default' => 'Opening Hours',
        'label' => 'Schedule Title',
        'input_type' => 'text',
    );
    // Schedule Sub Title
	$schedule_details[] = array(
		'slug'=> 'schedule_sub_title', 
		'default' => 'Get some tomatoes, and, if they were eaten with the great extravagance to season',
        'label' => 'Schedule Sub Title',
        'input_type' => 'textarea',
    );
    // Schedule Time
	$schedule_details[] = array(
		'slug'=> 'schedule_sunday_schedule', 
		'default' => '8.00 AM - 10.00 PM',
        'label' => 'Sunday Schedule',
        'input_type' => 'text',
    );
    // Schedule Time
	$schedule_details[] = array(
		'slug'=> 'schedule_monday_schedule', 
		'default' => '8.00 AM - 10.00 PM',
        'label' => 'Monday Schedule',
        'input_type' => 'text',
    );
    // Schedule Time
	$schedule_details[] = array(
		'slug'=> 'schedule_Tuesday_schedule', 
		'default' => '8.00 AM - 10.00 PM',
        'label' => 'Tuesday Schedule',
        'input_type' => 'text',
    );
    // Schedule Time
	$schedule_details[] = array(
		'slug'=> 'schedule_Wednesday_schedule', 
		'default' => '8.00 AM - 10.00 PM',
        'label' => 'Wednesday Schedule',
        'input_type' => 'text',
    );
    // Schedule Time
	$schedule_details[] = array(
		'slug'=> 'schedule_Thursday_schedule', 
		'default' => '8.00 AM - 10.00 PM',
        'label' => 'Thursday Schedule',
        'input_type' => 'text',
    );
    // Schedule Time
	$schedule_details[] = array(
		'slug'=> 'schedule_Friday_schedule', 
		'default' => '8.00 AM - 10.00 PM',
        'label' => 'Friday Schedule',
        'input_type' => 'text',
    );
    // Schedule Time
	$schedule_details[] = array(
		'slug'=> 'schedule_Saturday_schedule', 
		'default' => 'Clossed',
        'label' => 'Saturday Schedule',
        'input_type' => 'text',
    );
    

	foreach( $schedule_details as $details ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$details['slug'], array(
				'default' => $details['default'],
				'type' => 'theme_mod',
				'sanitize_callback'  => 'esc_attr'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			    $details['slug'], 
                array('label' => $details['label'],
                'section' => 'schedule_section',
                'type' => $details['input_type'],
				'settings' => $details['slug'])
		);
    }


    /**********************************
		Portrait of Yourself Section setup
    *********************************/
    $wp_customize->add_section( 'portrait_section', array(
		'title'          => __( 'Portrait of Yourself', 'khaown' ),
        'panel'          => 'front_page_php',
        'priority' 		 => 41
    ) );

    // Display Portrait of Yourself setting setup
	$wp_customize->add_setting('hide_portrait_section', array(
		'default'			=> __( false, 'khaown'),
		'sanitize_callback'  => 'esc_attr',
        'type' 				=> 'theme_mod',
        'priority' 		 => 41
	) );
	
	// Display Portrait of Yourself Control setup
	$wp_customize->add_control(
        'hide_portrait_section', 
        array(
            'label'      => __( 'Hide Portrait Section', 'khaown' ),
            'section'    => 'portrait_section',
            'type'    => 'checkbox',
            'settings'   => 'hide_portrait_section',
        )
    );

    $portrait_default = get_stylesheet_directory_uri() . '/assets/img/portrait.jpg';

    $portrait_image[] = array(
		'slug'        => 'upload_media_portrait_image', 
        'label'       => __( 'Portrait Photo', 'khaown' ),
        'default'       => $portrait_default,
	);

	foreach( $portrait_image as $image ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$image['slug'], array(
                'default' => $image['default'],
				'type' => 'theme_mod',
				'sanitize_callback'  => 'esc_attr'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Upload_Control( 
				$wp_customize,
				$image['slug'], 
				array('label' => $image['label'], 
				'section' => 'portrait_section',
				'settings' => $image['slug'])
			)
		);
    }

    // Your thought on Portrait section setting setup
	$wp_customize->add_setting('your_thought_on_protrait_section', array(
		'default'			=> __( 'PLEASE KEEP CALM & CARRY ON', 'khaown'),
		'sanitize_callback'  => 'esc_attr',
        'type' 				=> 'theme_mod',
        'priority' 		 => 41
	) );
	
	// Your thought on Portrait section Control setup
	$wp_customize->add_control('your_thought_on_protrait_section', 
        array(
            'label'      => __( 'Hide Portrait Section', 'khaown' ),
            'section'    => 'portrait_section',
            'type'       => 'text',
            'settings'   => 'your_thought_on_protrait_section',
        )
    );
    

}
add_action( 'customize_register', 'khaown_front_page_customize_register' );
