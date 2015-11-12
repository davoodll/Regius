<?php
/**
 * martable Theme Customizer
 *
 * @package martable
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function martable_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Header Section */
	$wp_customize->add_panel( 'martable_header_options', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header Options', 'martable'),
	) );
	
   	$wp_customize->add_section( 'martable_header_type' , array(
		'title'      => __('Select Header Type', 'martable'),
		'panel'  => 'martable_header_options',
		'priority'   => 100,
   	) );
	$wp_customize->add_setting(
		'martable_header_type', array(
        'default'        => 'one',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_header_option',
    ));
    $wp_customize->add_control( 'martable_header_type', array(
        'label'   => __('Select custom header or header one:', 'martable'),
        'section' => 'martable_header_type',
        'type'    => 'select',
		'priority'   => 100,
        'choices' => array('one'=>__('Header One', 'martable'), 'two'=>__('Custom Header', 'martable')),
    ));		
	
   	$wp_customize->add_section( 'header_image' , array(
		'title'      => __('Custom Header Settings', 'martable'),
		'panel'  => 'martable_header_options',
		'priority'   => 200,
   	) );
	
   	$wp_customize->add_section( 'martable_header_one' , array(
		'title'      => __('Header One Settings', 'martable'),
		'panel'  => 'martable_header_options',
		'priority'   => 300,
   	) );
	$wp_customize->add_setting(
		'martable_header_one_image', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'martable_header_one_image',
			   array(
				   'label'          => __( 'Upload a 2000x750 for header Image', 'martable' ),
				   'section'        => 'martable_header_one',
				   'priority'   => 100,
			   )
		   )
	);
	$wp_customize->add_setting(
		'martable_header_one_name', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'martable_header_one_name', array(
        'label'   => __('Header Headline :', 'martable'),
        'section' => 'martable_header_one',
        'type'    => 'text',
		'priority'   => 140,
    ));
	$wp_customize->add_setting(
		'martable_header_one_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'martable_header_one_text', array(
        'label'   => __('Header Text :', 'martable'),
        'section' => 'martable_header_one',
        'type'    => 'text',
		'priority'   => 140,
    ));
	$wp_customize->add_setting(
		'martable_header_one_cta', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'martable_header_one_cta', array(
        'label'   => __('Header CTA :', 'martable'),
        'section' => 'martable_header_one',
        'type'    => 'text',
		'priority'   => 150,
    ));
	$wp_customize->add_setting(
		'martable_header_one_cta_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'martable_header_one_cta_link', array(
        'label'   => __('Header CTA Link:', 'martable'),
        'section' => 'martable_header_one',
        'type'    => 'text',
		'priority'   => 160,
    ));

	/* FrontPage Section */
	$wp_customize->add_panel( 'martable_frontpage_options', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Static Front Page Options', 'martable'),
	) );
	
   	$wp_customize->add_section( 'static_front_page' , array(
		'title'      => __('Static front page', 'martable'),
		'panel'  => 'martable_frontpage_options',
		'priority'   => 100,
   	) );
	
	$wp_customize->add_setting(
		'martable_show_frontpage_posts', array(
        'default'        => 'two',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_front_layout',
    ));
    $wp_customize->add_control( 'martable_show_frontpage_posts', array(
        'label'   => __('Select front page layout:', 'martable'),
        'section' => 'static_front_page',
        'type'    => 'select',
		'priority'   => 900,
        'choices' => array('one'=>__('Ecom without Posts/Pages', 'martable'), 'two'=>__('Ecom with Posts/Pages', 'martable'), 'three'=>__('Only Posts/Pages', 'martable'),),
    ));	
	
   	$wp_customize->add_section( 'martable_front_welcome' , array(
		'title'      => __('Front Page Welcome Section', 'martable'),
		'panel'  => 'martable_frontpage_options',
		'priority'   => 200,
   	) );
	$wp_customize->add_setting(
		'martable_show_front_welcome_section', array(
        'default'        => 'yes',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'martable_show_front_welcome_section', array(
        'label'   => __('Show Front Page Welcome Section:', 'martable'),
        'section' => 'martable_front_welcome',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));	
	$wp_customize->add_setting(
		'martable_frontpage_welcome_heading', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'martable_frontpage_welcome_heading', array(
        'label'   => __('Front Page Welcome Text :', 'martable'),
        'section' => 'martable_front_welcome',
        'type'    => 'text',
		'priority'   => 20,
    ));
	$wp_customize->add_setting(
		'martable_frontpage_welcome_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'martable_frontpage_welcome_text', array(
        'label'   => __('Front Page Welcome Text :', 'martable'),
        'section' => 'martable_front_welcome',
        'type'    => 'text',
		'priority'   => 30,
    ));			
		
	/* Social Section */
   	$wp_customize->add_section( 'martable_social_options' , array(
		'title'      => __('Social Options', 'martable'),
		'priority'   => 800,
   	) );
	$wp_customize->add_setting(
		'martable_show_social_section', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'martable_show_social_section', array(
        'label'   => __('Show Social Section:', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_social_facebook', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_facebook', array(
        'label'   => __('Facebook Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 20,
    ));
	$wp_customize->add_setting(
		'martable_social_twitter', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_twitter', array(
        'label'   => __('Twitter Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 30,
    ));
	$wp_customize->add_setting(
		'martable_social_behance', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_behance', array(
        'label'   => __('Behance Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 40,
    ));
	$wp_customize->add_setting(
		'martable_social_bitbucket', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_bitbucket', array(
        'label'   => __('BitBucket Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 50,
    ));
	$wp_customize->add_setting(
		'martable_social_github', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_github', array(
        'label'   => __('GitHub Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 60,
    ));
	$wp_customize->add_setting(
		'martable_social_instagram', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_instagram', array(
        'label'   => __('InstaGram Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 69,
    ));
	$wp_customize->add_setting(
		'martable_social_youtube', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_youtube', array(
        'label'   => __('YouTube Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 70,
    ));
	$wp_customize->add_setting(
		'martable_social_dribble', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_dribble', array(
        'label'   => __('Dribble Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 80,
    ));
	$wp_customize->add_setting(
		'martable_social_googleplus', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_googleplus', array(
        'label'   => __('Google Plus Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 90,
    ));
	$wp_customize->add_setting(
		'martable_social_tumblr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_tumblr', array(
        'label'   => __('Tunblr Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 100,
    ));	
	$wp_customize->add_setting(
		'martable_social_vine', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_vine', array(
        'label'   => __('Vine Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 110,
    ));
	$wp_customize->add_setting(
		'martable_social_wp', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_wp', array(
        'label'   => __('WordPress Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 120,
    ));
	$wp_customize->add_setting(
		'martable_social_spotify', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_spotify', array(
        'label'   => __('Spotify Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 130,
    ));
	$wp_customize->add_setting(
		'martable_social_soundcloud', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_soundcloud', array(
        'label'   => __('SoundCloud Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 140,
    ));
	$wp_customize->add_setting(
		'martable_social_reddit', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_reddit', array(
        'label'   => __('Reddit Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 150,
    ));
	$wp_customize->add_setting(
		'martable_social_pinterest', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_pinterest', array(
        'label'   => __('Pinterest Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 160,
    ));
	$wp_customize->add_setting(
		'martable_social_linkedin', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_linkedin', array(
        'label'   => __('LinkedIn Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 170,
    ));
	$wp_customize->add_setting(
		'martable_social_flickr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_flickr', array(
        'label'   => __('Flickr Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 180,
    ));
	$wp_customize->add_setting(
		'martable_social_stackexchange', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'martable_social_stackexchange', array(
        'label'   => __('StackExchange Link :', 'martable'),
        'section' => 'martable_social_options',
        'type'    => 'text',
		'priority'   => 190,
    ));	
	
	/* Single Post Section */
   	$wp_customize->add_section( 'martable_single_post' , array(
		'title'      => __('Single Post Options', 'martable'),
		'priority'   => 900,
   	) );
	$wp_customize->add_setting(
		'martable_show_title_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_title_post', array(
        'label'   => __('Show Title on Single Post:', 'martable'),
        'section' => 'martable_single_post',
        'type'    => 'select',
		'priority'   => 200,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_show_meta_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_meta_post', array(
        'label'   => __('Show Meta on Single Post:', 'martable'),
        'section' => 'martable_single_post',
        'type'    => 'select',
		'priority'   => 300,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_show_featured_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_featured_post', array(
        'label'   => __('Show Featured Image on Single Post:', 'martable'),
        'section' => 'martable_single_post',
        'type'    => 'select',
		'priority'   => 390,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_show_cats_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_cats_post', array(
        'label'   => __('Show Categories on Single Post:', 'martable'),
        'section' => 'martable_single_post',
        'type'    => 'select',
		'priority'   => 400,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_show_tags_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_tags_post', array(
        'label'   => __('Show Tags on Single Post:', 'martable'),
        'section' => 'martable_single_post',
        'type'    => 'select',
		'priority'   => 500,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_show_author_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_author_post', array(
        'label'   => __('Show Author Section on Single Post:', 'martable'),
        'section' => 'martable_single_post',
        'type'    => 'select',
		'priority'   => 600,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_show_nav_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_nav_post', array(
        'label'   => __('Show Nav Section on Single Post:', 'martable'),
        'section' => 'martable_single_post',
        'type'    => 'select',
		'priority'   => 700,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	
	/* Page Section */
   	$wp_customize->add_section( 'martable_page_options' , array(
		'title'      => __('Page Options', 'martable'),
		'priority'   => 910,
   	) );
	$wp_customize->add_setting(
		'martable_show_title_page', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_title_page', array(
        'label'   => __('Show Title on Page:', 'martable'),
        'section' => 'martable_page_options',
        'type'    => 'select',
		'priority'   => 100,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	$wp_customize->add_setting(
		'martable_show_featured_image_page', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_featured_image_page', array(
        'label'   => __('Show Featured Image on Page:', 'martable'),
        'section' => 'martable_page_options',
        'type'    => 'select',
		'priority'   => 200,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
	
	/* Archive Section */
   	$wp_customize->add_section( 'martable_category_page' , array(
		'title'      => __('Archive Pages Options', 'martable'),
		'priority'   => 920,
   	) );
	
	$wp_customize->add_setting(
		'martable_show_excerpt_categories', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'martable_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'martable_show_excerpt_categories', array(
        'label'   => __('Show Categories on Archive Pages:', 'martable'),
        'section' => 'martable_category_page',
        'type'    => 'select',
		'priority'   => 200,
        'choices' => array('yes'=>__('Yes', 'martable'), 'no'=>__('No', 'martable')),
    ));
		
}
add_action( 'customize_register', 'martable_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function martable_customize_preview_js() {
	wp_enqueue_script( 'martable_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'martable_customize_preview_js' );

function martable_sanitize_yes_no( $value ) {
    if ( ! in_array( $value, array( 'yes', 'no' ) ) ){
        $value = 'yes';
	}
    return $value;
}

function martable_sanitize_front_layout( $value ) {
    if ( ! in_array( $value, array( 'one', 'two', 'three' ) ) ){
        $value = 'one';
	}
    return $value;
}

function martable_sanitize_header_option( $value ) {
    if ( ! in_array( $value, array( 'one', 'two' ) ) ){
        $value = 'one';
	}
    return $value;
}