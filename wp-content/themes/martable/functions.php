<?php
/**
 * martable functions and definitions
 *
 * @package martable
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'martable_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function martable_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on martable, use a find and replace
	 * to change 'martable' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'martable', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'martable' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'martable_custom_background_args', array(
		'default-color' => '292929',
		'default-image' => get_stylesheet_directory_uri() . '/images/page_bg.png',
	) ) );
	
	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ecomproduct', 720, 450, true );
	
	// Enable WooCommerce.
	add_theme_support( 'woocommerce' );
	
}
endif; // martable_setup
add_action( 'after_setup_theme', 'martable_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function martable_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'martable' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Bottom Left Sidebar', 'martable' ),
		'id'            => 'bottom-footer-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Bottom Center Sidebar', 'martable' ),
		'id'            => 'bottom-footer-center',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Bottom Right Sidebar', 'martable' ),
		'id'            => 'bottom-footer-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );			
}
add_action( 'widgets_init', 'martable_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function martable_scripts() {
	
	wp_enqueue_style( 'martable-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans|Patua+One' );

	wp_enqueue_style( 'martable-style', get_stylesheet_uri() );

	wp_enqueue_script( 'martable-navigation', get_template_directory_uri() . '/js/tinynav.js', array('jquery'), '20120206', false );

	wp_enqueue_script( 'martable-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'martable-init', get_template_directory_uri() . '/js/martable-general.js', '20120206', true );
	
}
add_action( 'wp_enqueue_scripts', 'martable_scripts' );

function martable_header_one_background(){
        echo '<style> .header-one{';
		if( get_theme_mod('martable_header_one_image') ) {
        	$martable_header_one_background = get_theme_mod('martable_header_one_image');
		}else{
        	$martable_header_one_background = get_template_directory_uri().'/images/header.jpg';
		}
		echo 'background:url('.$martable_header_one_background.') no-repeat;';
		echo '}</style>';
}
add_action('wp_head', 'martable_header_one_background');

function martable_post_format_link_content(){
     if( preg_match( '|<a.*(?=href=\"([^\"]*)\")[^>]*>([^<]*)</a>|i', get_the_content(), $matches ) ){
        echo $matches[0];
     }elseif( preg_match( '/(http\S*)/is', get_the_content(), $matches ) ){
		echo '<a href="'.$matches[0].'">'.$matches[0].'</a>';
     }else{
		echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
    }
}

function martable_post_format_image_content(){
     if( preg_match( '|<img.*(?=src=\"([^\"]*)\")[^>]*>|i', get_the_content(), $matches ) ){
        echo $matches[0];
     }elseif( preg_match( '/(http\S*\.(png|jpg|gif|jpeg))/is', get_the_content(), $matches ) ){
		echo '<img src="'.$matches[0].'" />';
     }else{
		echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
    }
}

function martable_post_format_audio_content(){
     if( preg_match( '/\[audio.*?\]/is', get_the_content(), $matches ) ){
        echo do_shortcode($matches[0]);
     }elseif( preg_match( '/(http\S*\.(3gp|m4a|m4p|mp3|ogg|wav|wma))/is', get_the_content(), $matches ) ){
		echo do_shortcode('[audio '.$matches[0].']');
     }elseif( preg_match( '|<a.*(?=href=\"([^\"]*)\")[^>]*>([^<]*)</a>|i', get_the_content(), $matches ) ){
        echo $matches[0];
     }elseif( preg_match( '/(http\S*)/is', get_the_content(), $matches ) ){
		echo '<a href="'.$matches[0].'">'.$matches[0].'</a>';
     }else{
		echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
    }
}

function martable_post_format_video_content(){
     if( preg_match( '/\[(embed|video|wpvideo).*?\]/is', get_the_content(), $matches ) ){
        echo '<div class="martable_fluid_video_cont">';
		echo do_shortcode($matches[0]);
		echo '</div>';
     }elseif( preg_match( '/(https?:\/\/(www\.)?(blip|collegehumor|dailymotion|flickr|funnyordie|hulu|ted|viddler|vimeo|youtube|wordpress)\.(tv|com)\/\S*)/is', get_the_content(), $matches ) ){
		echo '<div class="martable_fluid_video_cont">';
		echo wp_oembed_get( $matches[0] );
		echo '</div>';
     }elseif( preg_match( '|<a.*(?=href=\"([^\"]*)\")[^>]*>([^<]*)</a>|i', get_the_content(), $matches ) ){
        echo $matches[0];
     }else{
		echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
    }
}

function martable_get_limited_string($output, $max_char=100, $end='...')
{
    $output = str_replace(']]>', ']]&gt;', $output);
    $output = strip_tags($output);
    $output = strip_shortcodes($output);

  	if ((strlen($output)>$max_char) && ($espacio = strpos($output, " ", $max_char )))
	{
        $output = substr($output, 0, $espacio).$end;
		return $output;
   }
   else
   {
      return $output;
   }
}

add_filter('the_title','martable_has_title');
function martable_has_title($title){
	global $post;
	if($title == ''){
		return get_the_time(get_option( 'date_format' ));
	}else{
		return $title;
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
