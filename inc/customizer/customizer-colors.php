<?php
function ouch_customize_colors($wp_customize){

  $wp_customize->add_panel( 'colors_settings', array(
    'priority'       => 300,
    'capability'     => 'edit_theme_options',
    'title'    	=> esc_html__('Style', 'ouch'),
  ));

  $wp_customize->add_section('general_style_settings', array(
    'title'    	=> esc_html__('General', 'ouch'),
    'panel'  => 'colors_settings'
  ));

  Kirki::add_field( 'radius', array(
  'type'        => 'radio-buttonset',
  'settings'    => 'radius',
  'label'       => esc_html__( 'Border Radius', 'ouch' ),
  'section'     => 'general_style_settings',
  'default'     => '5px',
  'priority'    => 1,
  'option_type' => 'option',
  'choices'     => array(
    '0px'   => esc_attr__( '0px', 'ouch' ),
    '5px' => esc_attr__( '5px', 'ouch' ),
    '25px' => esc_attr__( '25px', 'ouch' ),
  ),
  ));

  Kirki::add_field( 'colors', array(
  'type'        => 'radio-buttonset',
  'settings'    => 'colors',
  'label'       => esc_html__( 'Color Sheme', 'ouch' ),
  'section'     => 'general_style_settings',
  'default'     => 'color1',
  'priority'    => 1,
  'option_type'           => 'option',
  'choices'     => array(
    'color1'   => esc_attr__( 'Color 1', 'ouch' ),
    'color2' => esc_attr__( 'Color 2', 'ouch' ),
  ),
  ));

Kirki::add_field( 'zoom', array(
 'type'        => 'radio-buttonset',
 'settings'    => 'zoom',
 'label'       => esc_html__( 'Image Hover Zoom', 'ouch' ),
 'section'     => 'general_style_settings',
 'default'     => 'on',
 'priority'    => 1,
 'option_type'           => 'option',
 'choices'     => array(
   'on'   => esc_attr__( 'Zoom On', 'ouch' ),
   'off' => esc_attr__( 'Zoom Off', 'ouch' )
 ),
));

  $wp_customize->add_section('background_settings', array(
    'title'    	=> esc_html__('Background', 'ouch'),
    'panel'  => 'colors_settings'
  ));

  Kirki::add_field( 'ouch_theme_options[background_image]', array(
    'type'        => 'image',
    'settings'    => 'ouch_theme_options[background_image]',
    'label'       => esc_html__( 'Background Image', 'ouch' ),
    'section'     => 'background_settings',
    'default'     => '',
    'option_type' => 'option',
    'priority'    => 10,
  ) );

  Kirki::add_field( 'ouch_theme_options[background_color]', array(
    'type'        => 'color',
    'settings'    => 'ouch_theme_options[background_color]',
    'label'       => esc_html__( 'Background Color', 'ouch' ),
    'section'     => 'background_settings',
    'default'     => '',
    'option_type' => 'option',
    'priority'    => 10,
  ) );

  // GENERAL COLORS //
  $wp_customize->add_section('colors_general', array(
    'title'    	=> esc_html__('General', 'ouch'),
    'panel'  => 'colors_settings'
  ));

  $wp_customize->add_setting('ouch_theme_options[colors_default]', array(
      'capability'        => 'edit_theme_options',
      'type'           => 'option',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ouch_theme_options[colors_default]', array(
      'label'    => esc_html__('Site Color', 'ouch'),
      'section'  => 'general_style_settings',
      'settings' => 'ouch_theme_options[colors_default]',
    )));


  $wp_customize->add_setting('ouch_theme_options[colors_button]', array(
      'capability'        => 'edit_theme_options',
      'type'           => 'option',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ouch_theme_options[colors_button]', array(
      'label'    => esc_html__('Form Button', 'ouch'),
      'section'  => 'general_style_settings',
      'settings' => 'ouch_theme_options[colors_button]',
  )));



  // MENU COLORS //
  $wp_customize->add_section('colors_menu', array(
    'title'    	=> esc_html__('Header & Menu Colors', 'ouch'),
    'panel'  => 'colors_settings'
  ));

  Kirki::add_field( 'mt_colors_header', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_header',
    'label'       => esc_attr__( 'Header', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'ouch' ),
        'link'   => esc_attr__( 'Link', 'ouch' ),
        'hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'background'    => '',
        'link'    => '',
        'hover'    => ''
    ),
  ));

  Kirki::add_field( 'mt_colors_header_icons', array(
       'type'        => 'multicolor',
       'settings'    => 'mt_colors_header_icons',
       'label'       => esc_attr__( 'Header Icons', 'ouch' ),
       'section'     => 'colors_menu',
       'option_type' => 'option',
       'priority'    => 1,
       'choices'     => array(
           'latest'    => esc_attr__( 'Latest', 'ouch' ),
           'popular'   => esc_attr__( 'Popular', 'ouch' ),
           'hot'  => esc_attr__( 'Hot', 'ouch' ),
           'trending'  => esc_attr__( 'Trending', 'ouch' ),
       ),
       'default'     => array(
           'latest'    => '',
           'popular'    => '',
           'hot'    => '',
           'trending'    => '',
      ),
   ));


  Kirki::add_field( 'mt_colors_header_button', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_header_button',
    'label'       => esc_attr__( 'Header Button', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'ouch' ),
        'text_hover'   => esc_attr__( 'Hover', 'ouch' ),
        'background'  => esc_attr__( 'Background', 'ouch' ),
        'background_hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'background'    => '',
        'background_hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_bg', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_bg',
    'label'       => esc_attr__( 'Menu Background', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'in'    => esc_attr__( 'In', 'ouch' ),
        'out'   => esc_attr__( 'Out', 'ouch' ),
    ),
    'default'     => array(
        'in'    => '',
        'out'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_link', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_link',
    'label'       => esc_attr__( 'Menu Links', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Lines', 'ouch' ),
        'text_hover'   => esc_attr__( 'Hover', 'ouch' ),
        'border'  => esc_attr__( 'Border', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'border'    => ''
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_link_sub', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_link_sub',
    'label'       => esc_attr__( 'Menu Sub Links', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Lines', 'ouch' ),
        'text_hover'   => esc_attr__( 'Hover', 'ouch' ),
        'background'  => esc_attr__( 'Background', 'ouch' ),
        'background_hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'background'    => '',
        'background_hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_button', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_button',
    'label'       => esc_attr__( 'Menu Smart Button', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Lines', 'ouch' ),
        'text_hover'   => esc_attr__( 'Hover', 'ouch' ),
        'background'  => esc_attr__( 'Background', 'ouch' ),
        'background_hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'background'    => '',
        'background_hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_search', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_search',
    'label'       => esc_attr__( 'Menu Search', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'ouch' ),
        'text_hover'   => esc_attr__( 'Hover', 'ouch' ),
        'background'  => esc_attr__( 'Background', 'ouch' ),
        'background_hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'background'    => '',
        'background_hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_icon', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_icon',
    'label'       => esc_attr__( 'Menu Social Icons', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Icon', 'ouch' ),
        'hover'   => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_header_mobile', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_header_mobile',
    'label'       => esc_attr__( 'Mobile Header', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'ouch' ),
        'link'   => esc_attr__( 'Text', 'ouch' ),
    ),
    'default'     => array(
        'background'    => '',
        'link'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_header_fixed', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_header_fixed',
    'label'       => esc_attr__( 'Fixed Header', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 99,
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'ouch' ),
        'link'   => esc_attr__( 'Link', 'ouch' ),
        'hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'background'    => '',
        'link'    => '',
        'hover'    => ''
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_smart', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_smart',
    'label'       => esc_attr__( 'Smart Menu', 'ouch' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'ouch' ),
        'link'   => esc_attr__( 'Link', 'ouch' ),
        'hover'  => esc_attr__( 'Hover', 'ouch' ),
        'out'  => esc_attr__( 'Out', 'ouch' ),
    ),
    'default'     => array(
        'background'    => '',
        'link'    => '',
        'hover'    => '',
        'out'    => '',
    ),
  ));


  // FOOTER COLORS //
  $wp_customize->add_section('colors_footer', array(
    'title'    	=> esc_html__('Footer Colors', 'ouch'),
    'panel'  => 'colors_settings'
  ));


  Kirki::add_field( 'mt_colors_footer_top', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_footer_top',
    'label'       => esc_attr__( 'Footer Top Colors', 'ouch' ),
    'section'     => 'colors_footer',
    'option_type' => 'option',
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'ouch' ),
        'title'   => esc_attr__( 'Title', 'ouch' ),
        'text'   => esc_attr__( 'Text', 'ouch' ),
        'link'  => esc_attr__( 'Link', 'ouch' ),
        'hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'background'    => '',
        'text'    => '',
        'title'    => '',
        'link'    => '',
        'hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_footer_social', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_footer_social',
    'label'       => esc_attr__( 'Footer Social Icons', 'ouch' ),
    'section'     => 'colors_footer',
    'option_type' => 'option',
    'choices'     => array(
        'icon'    => esc_attr__( 'Icon', 'ouch' ),
        'hover'   => esc_attr__( 'Hover', 'ouch' ),
        'background'   => esc_attr__( 'Background', 'ouch' ),
        'background_hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'icon'    => '',
        'hover'    => '',
        'background'    => '',
        'background_hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_footer_bottom', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_footer_bottom',
    'label'       => esc_attr__( 'Footer Bottom Colors', 'ouch' ),
    'section'     => 'colors_footer',
    'option_type' => 'option',
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'ouch' ),
        'border'   => esc_attr__( 'Border', 'ouch' ),
        'text'   => esc_attr__( 'Text', 'ouch' ),
        'link'  => esc_attr__( 'Link', 'ouch' ),
        'hover'  => esc_attr__( 'Hover', 'ouch' ),
    ),
    'default'     => array(
        'background'    => '',
        'border'    => '',
        'text'    => '',
        'link'    => '',
        'hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_footer_icons', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_footer_icons',
    'label'       => esc_attr__( 'Footer Bottom Icons', 'ouch' ),
    'section'     => 'colors_footer',
    'option_type' => 'option',
    'choices'     => array(
        'latest'    => esc_attr__( 'Latest', 'ouch' ),
        'popular'   => esc_attr__( 'Popular', 'ouch' ),
        'hot'  => esc_attr__( 'Hot', 'ouch' ),
        'trending'  => esc_attr__( 'Trending', 'ouch' ),
    ),
    'default'     => array(
        'latest'    => '',
        'popular'    => '',
        'hot'    => '',
        'trending'    => '',
    ),
  ));


  // MENU COLORS //
  $wp_customize->add_section('colors_other', array(
    'title'    	=> esc_html__('Other Colors', 'ouch'),
    'panel'  => 'colors_settings'
  ));


  Kirki::add_field( 'colors_post_share', array(
    'type'        => 'multicolor',
    'settings'    => 'colors_post_share',
    'label'       => esc_attr__( 'Post Share Count', 'ouch' ),
    'section'     => 'colors_other',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'ouch' ),
        'text_dark'   => esc_attr__( 'Photo bg', 'ouch' ),
        'icon'   => esc_attr__( 'Icon', 'ouch' ),
        'icon_dark'   => esc_attr__( 'Photo bg', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_dark'    => '',
        'icon'    => '',
        'icon_dark'    => '',
    ),
  ));
  Kirki::add_field( 'colors_post_view', array(
    'type'        => 'multicolor',
    'settings'    => 'colors_post_view',
    'label'       => esc_attr__( 'Post View Count', 'ouch' ),
    'section'     => 'colors_other',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'ouch' ),
        'text_dark'   => esc_attr__( 'Photo bg', 'ouch' ),
        'icon'   => esc_attr__( 'Icon', 'ouch' ),
        'icon_dark'   => esc_attr__( 'Photo bg', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_dark'    => '',
        'icon'    => '',
        'icon_dark'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_cat', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_cat',
    'label'       => esc_attr__( 'Post List Category', 'ouch' ),
    'section'     => 'colors_other',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'ouch' ),
        'background'   => esc_attr__( 'Background', 'ouch' ),
        'only_text'   => esc_attr__( 'Only Text', 'ouch' ),
    ),
    'default'     => array(
        'text'    => '',
        'background'    => '',
        'only_text'    => '',
    ),
  ));




}

add_action('customize_register', 'ouch_customize_colors');
?>
