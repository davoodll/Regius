<?php
/**
 * AccessPress Store functions and definitions
 *
 * @package AccessPress Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_store_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AccessPress Store, use a find and replace
	 * to change 'accesspress-store' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-store', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    add_theme_support( 'woocommerce' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    add_image_size('accesspress-prod-cat-size', 600, 300, true);
    
    add_image_size('accesspress-service-thumbnail', 380, 252, true);
    
    add_image_size('accesspress-blog-big-thumbnail', 760, 300, true);
    
    
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-store' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspress_store_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // accesspress_store_setup
add_action( 'after_setup_theme', 'accesspress_store_setup' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/accesspress-function.php';
/**
 * Implement the Custom Metabox feature.
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load Option Framework file.
 */
 define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/option-framework/' );
//require get_template_directory() . '/inc/option-framework/options-framework.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/accesspress-widget.php';

/**
 * Load General Setting
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Sanitizer Functions
 */
require get_template_directory() . '/inc/accesspress-sanitizer.php';
/**
 * Load General Setting
 */
require get_template_directory() . '/inc/assets/assets-general-setting.php';

/**
 * Load Slider Setting
 */
require get_template_directory() . '/inc/assets/assets-slider-setting.php';

/**
 * Load Woocommerce Setting
 */
require get_template_directory() . '/inc/assets/assets-woocommerce-setting.php';

/**
 * Load Social Setting
 */
//require get_template_directory() . '/inc/assets/assets-social-setting.php';

/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-pagepost-setting.php';


/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-blog-setting.php';

/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-paymentlogo-setting.php';

/**
 * Load Class Custom Radio
 */
require get_template_directory() . '/inc/class/class-image-radio.php';

/**
 * Load Class Custom Switch
 */
require get_template_directory() . '/inc/class/class-custom-switch.php';
/**
 * Load Class Custom Categories
 */
require get_template_directory() . '/inc/class/class-custom-categories.php';
