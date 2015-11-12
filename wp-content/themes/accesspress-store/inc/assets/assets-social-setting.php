<?php
function accesspress_social_setting($wp_customize){
  $wp_customize->add_section(
    'social_setting',
    array(
      'title'           =>      __('Social Icon Setting', 'accesspress-store'),
      'priority'        =>      '30',
      )
    );
  
  $wp_customize->add_setting(
    'social_icon_info',
    array(
      'default'       =>      '0',
      'sanitize_callback' => 'accesspress_store_integer_sanitize'
      )
    );
  $wp_customize->add_control(new WP_Customize_Switch_Control_YesNo(
    $wp_customize,
    'social_icon_info',
    array(
      'section'       =>      'social_setting',
      'label'         =>      __('Socail Icon Info', 'accesspress-store'),
      'type'          =>      'switch_yesno',
      'output'        =>      array('Yes', 'No'),
      'description'   => 'You have to install and activate the AccessPress Social Icon to have this section work.',
      ))
  );
  $wp_customize->add_setting(
    'social_icon_shortcode',
    array(
      'default'       =>      '',
      'sanitize_callback' => 'accesspress_store_sanitize_text'
      )
    );
  $wp_customize->add_control('social_icon_shortcode',
    array(
      'section'       =>      'social_setting',
      'label'         =>      __('Enter the Social Icon Shortcode', 'accesspress-store'),
      'type'          =>      'text',
      )
    );
}
add_action('customize_register', 'accesspress_social_setting');