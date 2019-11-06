<?php
/**
 * khaown functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage khaown
 * @since 1.0.0
 */

/**
 * khaown only works in WordPress 4.7 or later.
 */
define( 'KHAOWN_THEME_DIR', trailingslashit( get_template_directory() ) );


if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'khaown_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function khaown_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on khaown, use a find and replace
		 * to change 'khaown' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'khaown', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'khaown' ),
				'footer' => __( 'Footer Menu', 'khaown' ),
				'social' => __( 'Social Links Menu', 'khaown' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 130,
				'width'       => 390,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'khaown' ),
					'shortName' => __( 'S', 'khaown' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'khaown' ),
					'shortName' => __( 'M', 'khaown' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'khaown' ),
					'shortName' => __( 'L', 'khaown' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'khaown' ),
					'shortName' => __( 'XL', 'khaown' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'khaown' ),
					'slug'  => 'primary',
					'color' => khaown_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'khaown' ),
					'slug'  => 'secondary',
					'color' => khaown_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'khaown' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'khaown' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'khaown' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'khaown_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function khaown_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'khaown' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'khaown' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'khaown_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function khaown_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'khaown_content_width', 640 );
}
add_action( 'after_setup_theme', 'khaown_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function khaown_scripts() {
	wp_enqueue_style( 'khaown-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	
	wp_style_add_data( 'khaown-style', 'rtl', 'replace' );

	// wp_localize_script('your_js_hanlde', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
	wp_enqueue_script( 'frontend-ajax', get_theme_file_uri( '/js/jquery.min.js' ), array(), '1.1', true );
	wp_localize_script( 'frontend-ajax', 'frontend_ajax_object',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'data_var_1' => 'value 1',
            'data_var_2' => 'value 2',
        )
	);
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/js/bootstrap.min.js' ), array(), '1.1', true );
	wp_enqueue_script( 'flexslider', get_theme_file_uri( '/js/flexslider.min.js' ), array(), '1.1', true );
	wp_enqueue_script( 'smooth-scroll', get_theme_file_uri( '/js/smooth-scroll.min.js' ), array(), '1.1', true );
	wp_enqueue_script( 'parallax', get_theme_file_uri( '/js/parallax.js' ), array(), '1.1', true );
	wp_enqueue_script( 'scripts', get_theme_file_uri( '/js/scripts.js' ), array(), '1.1', true );
	wp_enqueue_script( 'moment-with-locales', get_theme_file_uri( '/js/moment-with-locales.js' ), array(), '1.1', true );
	wp_enqueue_script( 'bootstrap-datetimepicker', get_theme_file_uri( '/js/bootstrap-datetimepicker.js' ), array(), '1.1', true );


	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'khaown-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'khaown-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	}

	wp_enqueue_style( 'khaown-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page_template( 'reservation.php' ) ) {
		// Will used in template-reservation.php
		wp_enqueue_script( 'reservationScript', get_theme_file_uri( '/js/reservationScript.js' ), array(), '1.1', true );
	}
	if ( is_page_template( 'template-menu.php' ) ) {
		// Will used in template-reservation.php
		wp_enqueue_script( 'more-menu', get_theme_file_uri( '/js/more-foodMenu.js' ), array(), '1.1', true );
	}
	
}
add_action( 'wp_enqueue_scripts', 'khaown_scripts' );



/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function khaown_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'khaown_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function khaown_editor_customizer_styles() {

	wp_enqueue_style( 'khaown-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	// if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'khaown-editor-customizer-styles', khaown_custom_colors_css() );
	// }
}
add_action( 'enqueue_block_editor_assets', 'khaown_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function khaown_colors_css_wrap() {

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' ); ?>

	<style type="text/css" id="custom-theme-colors" >
		<?php echo khaown_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'khaown_colors_css_wrap' );



// Dropdown Menu - Navigation Menu
class CSS_Menu_Maker_Walker extends Walker {
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

	function start_lvl( &$output, $depth = 0, $args = array() ) {  
		$indent = str_repeat("\t", $depth);  
		$output .= "\n$indent<ul>\n";  
	}  

	function end_lvl( &$output, $depth = 0, $args = array() ) {  
		$indent = str_repeat("\t", $depth);  
		$output .= "$indent</ul>\n";  
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		global $wp_query;  
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';  
		$class_names = $value = '';          
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;  

		/* Add active class */  
		if(in_array('current-menu-item', $classes)) { 
		$classes[] = 'active';  
		unset($classes['current-menu-item']);  
		}

		/* Check for children */

		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));  
		if (!empty($children)) {  
		$classes[] = 'has-sub';  
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );  
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );  
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : ''; 
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';  
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before; 
		$item_output .= '<a'. $attributes .'><span>';  
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;  
		$item_output .= '</span></a>';  
		$item_output .= $args->after;  
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );  
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {  
		$output .= "</li>\n";  
	}
}


/**
 * TGMPA class.
 */
 require get_template_directory() . '/classes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'khaown_require_plugins' );

function khaown_require_plugins() {
 
$plugins = array( 
	/* The array to install plugins */

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Khaown Plugin', // The plugin name.
			'slug'               => 'khaown-plugin', // The plugin slug (typically the folder name).
			'source'    		 => 'https://github.com/techadjuvant/Khaown-pro-plugin/archive/master.zip',
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false
		)
		
 ); 
$config = array( 
	/* The array to configure TGM Plugin Activation */

	'id'           => 'khaown-tgmpa', // your unique TGMPA ID
    'default_path' => get_stylesheet_directory() . '/lib/plugins/', // default absolute path
    'menu'         => 'khaown-install-required-plugins', // menu slug
    'has_notices'  => true, // Show admin notices
    'dismissable'  => false, // the notices are NOT dismissable
    'dismiss_msg'  => 'Please install these plugins to get access to all the features of the theme.', // this message will be output at top of nag
    'is_automatic' => true, // automatically activate plugins after installation
    'message'      => '<!--Hey there.-->', // message to output right before the plugins table
    'strings'      => array() // The array of message strings that TGM Plugin Activation uses
 
);

tgmpa( $plugins, $config );

}


function khaown_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 400,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
  ) );

  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'khaown_add_woocommerce_support' );

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 21);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'khaown_custom_loop_shop_per_page', 20 );

function khaown_custom_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}

add_filter( 'woocommerce_output_related_products_args', 'khaown_related_products_args', 20 );
  function khaown_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	return $args;
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'khaown-cart-thumb', 100, 100 ); // 100 wide and 100 high
}




/// Load More products button

add_action('wp_ajax_load_products_by_ajax', 'load_products_by_ajax');
add_action('wp_ajax_nopriv_load_products_by_ajax', 'load_products_by_ajax');

function load_products_by_ajax() {
  check_ajax_referer('load_more_products', 'security');
  $paged = $_POST['page'];
  $khaown_product_per_page = $_POST['khaown_product_per_page'];
  $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $khaown_product_per_page,
      'paged' => $paged,
  );
  $em_products = new WP_Query( $args ); ?>
    <?php 
        if ( $em_products->have_posts() ) : 
          while ( $em_products->have_posts() ) : $em_products->the_post();
            $id = get_the_ID();
    ?>
        <li>
            <a href="<?php the_permalink(); ?>" >
                <div class="background-image-holder">
                    <?php the_post_thumbnail(); ?>
                </div>
            </a>
            <button class="add-to-cart-btn"><?php echo do_shortcode('[add_to_cart id="' . $id .'"]'); ?></button>
        </li>
    <?php 
          endwhile; 
      endif;
      wp_die();

}



/**
 * Pro Fucntions.
 */
require get_template_directory() . '/inc/functions-pro.php';


/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-khaown-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-khaown-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

