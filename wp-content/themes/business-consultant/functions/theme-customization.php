<?php
/**
* business-consultant Customization options
**/
function business_consultant_menu_list(){
  $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
  $business_consultant_menu_list[''] = __('Select','business-consultant');
  foreach ( $menus as $menu ):
    $business_consultant_menu_list[$menu->name] = $menu->name;
  endforeach;
  return $business_consultant_menu_list;
}
function business_consultant_customize_register( $wp_customize ) {
  $wp_customize->add_panel(
    'general',
    array(
        'title' => __( 'General', 'business-consultant' ),
        'description' => __('styling options','business-consultant'),
        'priority' => 20, 
    )
  );
   //All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'business_consultant_social_links',
    array(
      'title' => __('Social Accounts', 'business-consultant'),
      'priority' => 120,
      'description' => balanceTags( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.<br /> Enter the URL of your social accounts. Leave it empty to hide the icon.' , true),
      'panel' => 'footer'
    )
  );
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('title_tagline')->title = __('Header & Logo','business-consultant');
  $wp_customize->get_section('static_front_page')->panel = 'general';

$business_consultant_social_icon = array();
for($i=1;$i <= 10;$i++):  
    $business_consultant_social_icon[] =  array( 'slug'=>sprintf('business_consultant_social_icon%d',$i),   
      'default' => '',   
      'label' => sprintf(esc_html__( 'Social Account %s', 'business-consultant' ),$i),   
      'priority' => sprintf('%d',$i) );  
  endfor;
foreach($business_consultant_social_icon as $business_consultant_social_icons){
    $wp_customize->add_setting(
        $business_consultant_social_icons['slug'],
        array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'type' => 'theme_mod',
          'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        $business_consultant_social_icons['slug'],
        array(
            'section' => 'business_consultant_social_links',
            'label'      =>   $business_consultant_social_icons['label'],
            'priority' => $business_consultant_social_icons['priority']
        )
    );
}
$business_consultant_social_icon_links = array();
for($i=1;$i <= 10;$i++):  
    $business_consultant_social_icon_links[] =  array( 'slug'=>sprintf('business_consultant_social_icon_links%d',$i),   
      'default' => '',   
      'label' => sprintf(esc_html__( 'Social Link %s', 'business-consultant' ),$i),   
      'priority' => sprintf('%d',$i) );  
  endfor;

foreach($business_consultant_social_icon_links as $business_consultant_social_icons){
    $wp_customize->add_setting(
        $business_consultant_social_icons['slug'],
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        $business_consultant_social_icons['slug'],
        array(
            'section' => 'business_consultant_social_links',
            'priority' => $business_consultant_social_icons['priority']
        )
    );
}
$wp_customize->add_section(
  'header_n_logo',
  array(
    'title' => __('Header & Logo','business-consultant'),
    'panel' => 'general'
  )
);
/*------Scroll Logo Option---------*/
  $wp_customize->add_setting(
    'scroll_logo',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
 $wp_customize->add_setting(
    'display_fixed_header',
    array(
        'default'    =>  false,
        'transport'  =>  'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
 $wp_customize->add_control(
    'display_fixed_header',
    array(
        'section'   => 'title_tagline',
        'label'     => __('Display Fixed Header?','business-consultant'),
        'type'      => 'checkbox'
    )
);
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'scroll_logo', array(
    'section'     => 'title_tagline',
    'label'       => __( 'Fixed Header Logo (120x50)' ,'business-consultant'),
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 120,
    'height'      => 50,
    'priority'    => 10,
    'default-image' => '',
) ) );
$wp_customize->add_setting(
  'logo_height',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'logo_height',
  array(
    'section' => 'title_tagline',
    'label'      => __('Enter Logo Size', 'business-consultant'),
    'description' => __("Use if you want to increase or decrease logo size (optional) Don't include `px` in the string. e.g. 20 (default: 10px)",'business-consultant'),
    'type'       => 'text',
    'priority'    => 21,
    )
  );

/*----------end---------------*/

$wp_customize->add_setting(
    'preloader',
    array(
        'default' => 1,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_section( 'preloader_section' , array(
    'title'       => __( 'Preloader', 'business-consultant' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'general'
) );
$wp_customize->add_control(
    'preloader',
    array(
        'section' => 'preloader_section',                
        'label'   => __('Preloader','business-consultant'),
        'type'    => 'radio',
        'choices'        => array(
            "1"   => esc_html__( "On", 'business-consultant' ),
            "2"   => esc_html__( "Off", 'business-consultant' ),
        ),
    )
);

$wp_customize->add_setting( 'custom_preloader', array(
    'sanitize_callback' => 'esc_url_raw',
    'capability'     => 'edit_theme_options',
    'priority' => 40,
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_preloader', array(
    'label'    => __( 'Upload Custom Preloader', 'business-consultant' ),
    'section'  => 'preloader_section',
    'settings' => 'custom_preloader',
) ) );
$wp_customize->add_setting(
    'theme_color',
    array(
        'default' => '#106391',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'theme_color',
    array(
        'label'      => __('Theme Color ', 'business-consultant'),
        'section' => 'colors',
        'priority' => 10
    )
  )
);
$wp_customize->add_setting(
  'secondary_color',
  array(
      'default' => '#000',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'secondary_color',
    array(
        'label'      => __('Secondary Color', 'business-consultant'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
$wp_customize->add_setting(
  'footer_bg_color',
  array(
      'default' => '#2c3e50',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footer_bg_color',
    array(
        'label'      => __('Footer Background Color', 'business-consultant'),
        'section' => 'colors',
        'priority' => 12
    )
  )
);
$wp_customize->add_setting(
  'footer_txt_color',
  array(
      'default' => '#fff',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footer_txt_color',
    array(
        'label'      => __('Footer Text Color', 'business-consultant'),
        'section' => 'colors',
        'priority' => 13
    )
  )
);
//Footer Section
$wp_customize->add_panel(
    'footer',
    array(
        'title' => __( 'Footer', 'business-consultant' ),
        'description' => __('Footer options','business-consultant'),
        'priority' => 105, 
    )
);
$wp_customize->add_section( 'footer_widget_area' , array(
    'title'       => __( 'Footer Widget Area', 'business-consultant' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );

$wp_customize->add_section( 'footer_social_section' , array(
    'title'       => __( 'Social Settings', 'business-consultant' ),
    'description' => balanceTags( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.' , true),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_section( 'footer_copyright' , array(
    'title'       => __( 'Footer Copyright Area', 'business-consultant' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_setting(
  'hide_footer_widget_bar',
  array(
      'default' => '1',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'hide_footer_widget_bar',
  array(
    'section' => 'footer_widget_area',                
    'label'   => __('Hide Widget Area','business-consultant'),
    'type'    => 'select',
    'choices' => array(
        "1"   => esc_html__( "Show", 'business-consultant' ),
        "2"   => esc_html__( "Hide", 'business-consultant' ),
    ),
  )
);
$wp_customize->add_setting(
  'footer_widget_style',
  array(
      'default' => '3',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'footer_widget_style',
  array(
      'section' => 'footer_widget_area',                
      'label'   => __('Select Widget Area','business-consultant'),
      'type'    => 'select',
      'choices'        => array(
          "1"   => esc_html__( "2 column", 'business-consultant' ),
          "2"   => esc_html__( "3 column", 'business-consultant' ),
          "3"   => esc_html__( "4 column", 'business-consultant' )
      ),
  )
);
$wp_customize->add_setting(
    'hide_copyright_area',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'hide_copyright_area',
    array(
        'section' => 'footer_copyright',                
        'label'   => __('Hide Copyright Section','business-consultant'),
        'type'    => 'select',
        'choices'        => array(
            "1"   => esc_html__( "Show", 'business-consultant' ),
            "2"   => esc_html__( "Hide", 'business-consultant' ),
        ),
    )
);
$wp_customize->add_setting(
    'copyright_style',
    array(
        'default' => 'style1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'copyright_style',
    array(
        'section' => 'footer_copyright',                
        'label'   => __('Choose Style','business-consultant'),
        'type'    => 'select',
        'choices'        => array(
            "style1"   => esc_html__( "Style 1", 'business-consultant' ),
            "style2"   => esc_html__( "Style 2", 'business-consultant' ),
        ),
    )
);
$wp_customize->add_setting(
    'footer_menu',
    array(
        'default' => 'style1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'footer_menu',
    array(
        'section' => 'footer_copyright',                
        'label'   => __('Choose Footer Menu','business-consultant'),
        'description' => __('This option works with style 2 only.','business-consultant'),
        'type'    => 'select',
        'choices' => business_consultant_menu_list(),
    )
);
$wp_customize->add_setting(
    'footer_logo',
    array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'footer_logo', array(
    'section'     => 'footer_copyright',
    'label'       => __( 'Upload Footer Logo' ,'business-consultant'),
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 120,
    'height'      => 50,
    'default-image' => '',
) ) );
$wp_customize->add_setting(
    'Copyright_area_text',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'Copyright_area_text',
    array(
        'section' => 'footer_copyright',                
        'label'   => __('Enter Copyright Text','business-consultant'),
        'type'    => 'textarea',
    )
);
}
add_action( 'customize_register', 'business_consultant_customize_register' );

function business_consultant_customs_css(){ 

wp_enqueue_style('business-consultant-style', get_stylesheet_uri(), array()); 
  $custom_css = '';
  if(get_header_image()!=''){
          $custom_css .= ".blog-heading-wrap{background-image:url(".esc_url(get_header_image()).");}";
      }
  $custom_css .= '*::selection,.silver-package-bg,#menu-line,.menu-left li:hover:before,.footer-box .tagcloud > a:hover, .nav-links .page-numbers.current, .page-numbers:hover, .post-navigation .nav-links .nav-previous:hover, .post-navigation .nav-links .nav-next:hover, .blog-menu-area .tagcloud a:hover, .footer-box select, .footer-box #today, .footer-wrap, .footer-box .wp-caption{ background-color: '.esc_attr(get_theme_mod('theme_color','#106391')).'; }
    .title-data h2,.title-data h2 a,.btn-light:focus,.btn-light:hover,a:hover, a:focus,.package-feature h6,.menu-left h6,.sow-slide-nav a:hover .sow-sld-icon-theme_default-left,.sow-slide-nav a:hover .sow-sld-icon-theme_default-right,#cssmenu ul ul li:hover > a, #cssmenu ul ul li a:hover,.menu-left ul li a:hover, .menu-left ul li.active a, .recentcomments:hover,.blog-carousel .blog-carousel-title h4,
    .gallery-item .ovelay .content .lightbox:hover, .gallery-item:hover .ovelay .content .imag-alt a:hover, .single-blog-tag a:hover, .page-numbers,.footer-box .footer-widget ul li a:hover, .post-navigation .nav-links .nav-previous a, .post-navigation .nav-links .nav-next a, .comment-form .form-submit input, .blog-menu-area .tagcloud a, .footer-box tfoot a:hover, .comment .comment-reply-link:hover, .blog-menu-area #today{ color: '.esc_attr(get_theme_mod('theme_color','#106391')).'; }
      .footer-box{ background-color: '.esc_attr(get_theme_mod('footer_bg_color','#2c3e50')).'; color: '.esc_attr(get_theme_mod('footer_txt_color','#fff')).'; } .footer-box .footer-widget ul li a,.footer-box .tagcloud > a, .footer-box #today, .footer-box .calendar_wrap caption, .footer-box select, .footer-box .rsswidget, .footer-widget h6, .footer-box tfoot a, .footer-wrap.style1 .copyright a:hover, .footer-wrap.style2 .copyright a:hover, .footer-box .wp-caption p.wp-caption-text{ color: '.esc_attr(get_theme_mod('footer_txt_color','#fff')).'; } .footer-widget h6:after{background-color: '.esc_attr(get_theme_mod('footer_txt_color','#fff')).'; }
    .fixed-scroll-header .custom-logo-link .custom-logo {  display: none;}
    .fixed-scroll-header .custom-logo-link .logo-dark {  display: block;}
    #cssmenu > ul > li:hover > a, #cssmenu > ul > li.current-menu-item a,#cssmenu .offside .current_page_item a, #cssmenu > ul > li.current-menu-parent > a,input:focus, textarea:focus, select:focus, .nav-links .page-numbers.current, .page-numbers, .page-numbers:hover, .post-navigation .nav-links .nav-previous, .post-navigation .nav-links .nav-next, .post-navigation .nav-links .nav-previous:hover, .post-navigation .nav-links .nav-next:hover, .comment .comment-reply-link:hover, .blog-menu-area .tagcloud a {border-color: '.esc_attr(get_theme_mod('theme_color','#106391')).';   }
      .footer-wrap.style2 .footer-nav ul .sub-menu { display: none;}
    #cssmenu #menu-button span,.heading-wrap .heading-title h4:after{ background: '.esc_attr(get_theme_mod('theme_color','#106391')).'; }
    .btn-blank{ box-shadow: inset 0 0 0 1px '.esc_attr(get_theme_mod('theme_color','#106391')).'; }
    .btn-blank:hover:before, .btn-blank:focus:before, .btn-blank:active:before{ box-shadow: inset 10px 0 0 0px '.esc_attr(get_theme_mod('theme_color','#106391')).'; }
    .contact-me.dark_form input[type=submit],.contact-me.light_form input[type=submit]:hover {
    background: '.esc_attr(get_theme_mod('secondary_color','#000000')).';
    box-shadow: inset 10px 0 0 0px '.esc_attr(get_theme_mod('theme_color','#106391')).';}    
    .btn-nav:focus,.btn-nav:hover, .menu-left li.active:before,
    .services-tabs-left li:hover:before, .services-tabs-left li.active:before,
    .search-submit:hover, .search-submit:focus,.offside .menu-item.current_page_item::before,
    .offside .menu-item.current_page_item::after, .offside .menu-item.current_page_item a::before,
    .offside .menu-item.current_page_item a::after, .offside .menu-item:hover::before,
    .offside .menu-item:hover::after, .offside .menu-item:hover a::before, .offside .menu-item:hover a::after,
    input[type="submit"]:hover, .search-submit { background: '.esc_attr(get_theme_mod('theme_color','#106391')).'; }
    .menu-left li a:hover:before, .page-numbers:after, .comment-form .form-submit input{ border-color: '.esc_attr(get_theme_mod('theme_color','#106391')).';}
    .contact-me.light_form input[type=submit],.contact-me.dark_form input[type=submit]:hover {
      background: '.esc_attr(get_theme_mod('theme_color','#106391')).';
      box-shadow: inset 10px 0 0 0px '.esc_attr(get_theme_mod('secondary_color','#000000')).';}
      .comment .comment-reply-link{border-color: '.esc_attr(get_theme_mod('secondary_color','#000000')).';}
    a,.comment .comment-reply-link,.services-tabs-left li a:hover, .services-tabs-left li.active a, .title-data h2 a:hover, .blog-menu-area td a{ color: '.esc_attr(get_theme_mod('secondary_color','#000000')).';}
    .contact-me.dark_form input:focus, .contact-me.light_form input:focus, .contact-me.dark_form textarea:focus, .contact-me.light_form textarea:focus,
    blockquote, .comment-form input:focus, .comment-form textarea:focus{
      border-color: '.esc_attr(get_theme_mod('theme_color','#106391')).';} 
    .single-blog-content-area .post-password-form input[type="submit"] {
        color: '.esc_attr(get_theme_mod('theme_color','#106391')).';  border: 2px solid '.esc_attr(get_theme_mod('theme_color','#106391')).';
    }
    .single-blog-content-area .post-password-form input[type="submit"]:hover {
        color: '.esc_attr(get_theme_mod('secondary_color','#000000')).'; background-color: '.esc_attr(get_theme_mod('theme_color','#106391')).';
    } 
    .main-logo img {   max-height: '.esc_attr(get_theme_mod('logo_height','45')).'px;   }
    @media only screen and (max-width: 1024px){
      #cssmenu > ul > li:hover > a, #cssmenu > ul > li.current-menu-item a, #cssmenu > ul > li.current-menu-parent > a{
        border-color: rgba(0, 0, 0, 0.1);
        color: '.esc_attr(get_theme_mod('theme_color','#106391')).'; }
        .fixed-header  #cssmenu #menu-button{    position: absolute; top:10px;}
         }
    .preloader .preloader-gif.preloader-no-svg{background: url('.esc_url(get_theme_mod('custom_preloader')).') no-repeat;background-size: contain;animation: none;}
    '.esc_attr(get_theme_mod('customs_css')).'
    '; 
  wp_add_inline_style( 'business-consultant-style', $custom_css ); 
} 