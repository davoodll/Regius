<?php
function accesspress_ticker_setting($wp_customize){
  $wp_customize->add_panel( 
    'general_setting',
    array(
     'priority'         =>      '2',
     'capability'       =>      'edit_theme_options',
     'theme_supports'   =>      '',
     'title'            =>      __( 'General Setting', 'accesspress-store' ),
     'description'      =>      __( 'This allows to edit the header', 'accesspress-store' ),
     ) );

  $wp_customize->add_section(
    'accesspress_ticker',
    array(
      'title'           =>      __('Ticker Setting', 'accesspress-store'),
      'priority'        =>      '2',
      'panel' => 'general_setting', )
    );

  $wp_customize->add_setting(
    'accesspress_ticker_checkbox',
    array(
      'default' =>  '1',
      'sanitize_callback'     =>  'accesspress_store_checkbox_sanitize'
      )
    );
  $wp_customize->add_control(new WP_Customize_Switch_Control(
    $wp_customize,
    'accesspress_ticker_checkbox',
    array(
      'section'       =>      'accesspress_ticker',
      'label'         =>      __('Enable Disable Ticker', 'accesspress-store'),
      'type'          =>      'switch',
      'output'        =>      array('Enable', 'Disable')
      ))
  );
  $wp_customize->add_setting(
    'accesspress_ticker_title',
    array(
      'default'       =>      'Latest',
      'sanitize_callback'     =>  'accesspress_store_sanitize_text'
      )
    );
  $wp_customize->add_control(
    'accesspress_ticker_title',
    array(
      'section'       =>      'accesspress_ticker',
      'label'         =>      __('Ticker Title', 'accesspress-store'),
      'type'          =>      'text'
      )
    );
  $wp_customize->add_setting(
    'accesspress_ticker_text1',
    array(
      'default'       =>      '',
      'sanitize_callback'     =>  'accesspress_store_sanitize_text'
      )
    );
  $wp_customize->add_control(
    'accesspress_ticker_text1',
    array(
      'section'       =>      'accesspress_ticker',
      'label'         =>      __('Ticker Text 1', 'accesspress-store'),
      'type'          =>      'text'
      )
    );

  $wp_customize->add_setting(
    'accesspress_ticker_text2',

    array(
      'default'       =>      '',
      'sanitize_callback'     => 'accesspress_store_sanitize_text'
      )
    );

  $wp_customize->add_control(
    'accesspress_ticker_text2',
    array(
      'section'       =>      'accesspress_ticker',
      'label'         =>      __('Ticker Text2', 'accesspress-store'),
      'type'          =>      'text'
      )
    );
  $wp_customize->add_setting(
    'accesspress_ticker_text3',
    array(
      'default'       =>      '',
      'sanitize_callback'     =>      'accesspress_store_sanitize_text'
      )
    );

  $wp_customize->add_control(
    'accesspress_ticker_text3',
    array(
      'section'       =>      'accesspress_ticker',
      'label'         =>      __('Ticker Text3', 'accesspress-store'),
      'type'          =>      'text'
      )
    );

  $wp_customize->add_setting(
    'accesspress_ticker_text4',
    array(
      'default'       =>      '',
      'sanitize_callback'     =>      'accesspress_store_sanitize_text'
      )
    );

  $wp_customize->add_control(
    'accesspress_ticker_text4',
    array(
      'section'       =>      'accesspress_ticker',
      'label'         =>      __('Ticker Text4', 'accesspress-store'),
      'type'          =>      'text'
      )
    );
//moving default sections to custom panel
  $wp_customize->get_section('title_tagline')->panel = 'general_setting';
  $wp_customize->get_section('header_image')->panel = 'general_setting';
  $wp_customize->remove_section('nav');
  $wp_customize->get_section( 'colors')->panel = 'general_setting';
  $wp_customize->get_section( 'static_front_page')->panel = 'general_setting';   
  
  $wp_customize->add_section('background_image',
    array(
      'title'           =>      __('Background', 'accesspress-store'),
      'priority'        =>      '40',
      'panel'           => 'general_setting',));

  $wp_customize->add_setting(
    'accesspress_background_type',
    array(
      'default'       =>      'none',
      'sanitize_callback' => 'accesspress_store_bkg_type'
      )
    );

  $wp_customize->add_control(     'accesspress_background_type',
   array(
    'section'       =>      'background_image',
    'label'         =>      __('Select the Background type', 'accesspress-store'),
    'description'   =>      __('Select the Background type for your website', 'accesspress-store'),
    'type'          =>      'select',
    'priority'      =>      '2',
    'choices'       =>      array(
      'color' => __('Color', 'accesspress-store'),
      'image' => __('Image', 'accesspress-store'),
      'pattern' => __('Pattern', 'accesspress-store')),
    )
   );



  $wp_customize->add_setting(
    'accesspress_background_image_pattern',

    array(
      'default'       =>      '',
      'sanitize_callback' => 'accesspress_store_bkg_pattern'
      )
    );
  $imagepath =  get_template_directory_uri() . '/inc/images/';                           
  $wp_customize->add_control( new WP_Customize_Radioimage_Control(
    $wp_customize,
    'accesspress_background_image_pattern',
    array(
      'section'       =>      'background_image',
      'label'         =>      __('Background Pattern', 'accesspress-store'),
      'type'          =>      'radioimage',
      'choices'       =>      array( 
        'pattern1' => $imagepath.'patterns/80X80/pattern1.png',  
        'pattern2' =>  $imagepath.'patterns/80X80/pattern2.png', 
        'pattern3' =>  $imagepath.'patterns/80X80/pattern3.png', 
        'pattern4' => $imagepath.'patterns/80X80/pattern4.png', 
        'pattern5' =>  $imagepath.'patterns/80X80/pattern5.png',  
        'pattern6' => $imagepath.'patterns/80X80/pattern6.png', 
        )
      )
    ));


  $wp_customize->add_section('favicon_image',
    array(
     'title'            =>       __('Favicon Image', 'accesspress-store'),
     'priority'         =>      '110',
     'panel'            =>      'general_setting',
     )
    );

  $wp_customize->add_setting(
    'accesspress_favicon',
    array(
      'default'       =>      '',
      'sanitize_callback' => 'esc_url_raw'
      )
    );

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
    'accesspress_favicon',
    array(
      'section'       =>      'favicon_image',
      'label'         =>      __('Upload Favicon', 'accesspress-store'),
      'description'   =>      __('Standard Size of Favicon is 40x40px', 'accesspress-store'),

      )
    ));

  $wp_customize->add_section('webpage_layout',
    array(
     'title'            =>       __('Layout Setting', 'accesspress-store'),
     'priority'         =>      '110',
     'panel'            =>      'general_setting',
     )
    );

  $wp_customize->add_setting(
    'accesspress_webpage_layout',
    array(
      'default'       =>  'fullwidth',
      'sanitize_callback' => 'accesspress_store_radio_sanitize_webpagelayout'
      )
    );

  $wp_customize->add_control(
    'accesspress_webpage_layout',
    array(
      'section'       =>      'webpage_layout',
      'label'         =>      __('Website Layout', 'accesspress-store'),
      'description'   =>      __('Make your website either box layout or full width from click away', 'accesspress-store'),
      'type'          =>      'radio',
      'setting'       =>      'accesspress_webpage_layout',
      'choices'        =>      array(
        'boxed' => __('Boxed Layout', 'accesspress-store'),
        'fullwidth' => __('Full Width', 'accesspress-store')
        )
      )
    );

  $wp_customize->add_section('responsive_setting',
    array(
     'title'            =>       __('Responsive Setting', 'accesspress-store'),
     'priority'         =>      '110',
     'panel'            =>      'general_setting',
     )
    );

  $wp_customize->add_setting(
    'accesspress_ed_responsive',
    array(
      'default'       =>      '1',
      'sanitize_callback' => 'accesspress_store_integer_sanitize'
      )
    );

  $wp_customize->add_control(new WP_Customize_Switch_Control(
    $wp_customize,
    'accesspress_ed_responsive',
    array(
      'section'       =>      'responsive_setting',
      'label'         =>      __('Enable or Disable Responsive Design', 'accesspress-store'),
      'type'          =>      'switch',
      )
    ));




}
add_action( 'customize_register', 'accesspress_ticker_setting' );

/**
 * This outputs the javascript needed to automate the live settings preview.
 * Also keep in mind that this function isn't necessary unless your settings 
 * are using 'transport'=>'postMessage' instead of the default 'transport'
 * => 'refresh'
 * 
 * Used by hook: 'customize_preview_init'
 */

function accesspress_ticker_setting_live_preview()
{
	wp_enqueue_script( 
		  'accessoress_store-themecustomizer',			//Give the script an ID
		  get_template_directory_uri().'/inc/js/accesspress-theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
     );
}
add_action( 'customize_preview_init', 'accesspress_ticker_setting_live_preview' );