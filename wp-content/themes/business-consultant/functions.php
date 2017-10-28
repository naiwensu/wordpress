<?php
/*
 * Set up the content width value based on the theme's design.
 */

if (!function_exists('business_consultant_setup')) :
    function business_consultant_setup() {
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1100;
        }
        // Make business-consultant theme available for translation.
        load_theme_textdomain('business-consultant', get_template_directory() . '/languages');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');

        // register menu 
        register_nav_menus(array(
            'primary' => __('Top Header Menu', 'business-consultant'),
        ));
        // Featured image support
        add_theme_support('post-thumbnails');
        add_theme_support( 'custom-logo', array(
            'height'      => 160,
            'width'       => 45,
            'flex-height' => true,
            'flex-width'  => true,
            'priority'    => 11,
            'header-text' => array( 'site-title', 'site-description' ), 
        ) );
        add_image_size('business_consultant_thumbnail_image', 840, 560, true);
        add_image_size('business_consultant_blog_thumbnail_image', 760, 500, true);
        $business_consultant_defaults = array(
            'default-image'          => get_template_directory_uri().'/assets/images/header-img.jpeg',
            'width'                  => 0,
            'height'                 => 0,
            'flex-height'            => false,
            'flex-width'             => false,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => false,
            'default-text-color'     => '',
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        );
        add_theme_support( 'custom-header', $business_consultant_defaults );            
        add_theme_support( 'custom-background', apply_filters( 'business_consultant_custom_background_args', array(
            'default-color' => 'ffffff',
        ) ) );
        // Switch default core markup for search form, comment form, and commen, to output valid HTML5.
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list',
        ));
        // This theme uses its own gallery styles.
        add_filter('use_default_gallery_style', '__return_false');
        /* slug setup */
        add_theme_support('title-tag');
    }
endif; // business_consultant_setup
add_action('after_setup_theme', 'business_consultant_setup');
add_filter('nav_menu_css_class' , 'business_consultant_special_nav_class' , 10 , 2);

function business_consultant_special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function business_consultant_excerpt_length( $length ) {
    if(is_admin()){
        return $length;
    }
    return 30;
}
add_filter( 'excerpt_length', 'business_consultant_excerpt_length', 999 );
add_action( 'admin_menu', 'business_consultant_admin_menu');
function business_consultant_admin_menu( ) {
    add_theme_page( __('Pro Feature','business-consultant'), __('Business Consultant Plus','business-consultant'), 'manage_options', 'business-consultant-plus-buynow', 'business_consultant_plus_buy_now', 300 ); 
  
}
function business_consultant_plus_buy_now(){ ?>
  <script>window.location = "https://electrathemes.com/wordpress-themes/business-consultant-plus/";</script>
<?php }
add_filter('get_custom_logo','business_consultant_change_logo_class');
function business_consultant_change_logo_class($html)
{
    $html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $html);
    $html = str_replace('width=', 'original-width=', $html);
    $html = str_replace('height=', 'original-height=', $html);
    $html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-fixed"', $html);
    return $html;
}
//clearfix
function business_consultant_bootstrap_clearfix( $i, $args = array(), $element = 'div',  $grid = 12 ) {
    $performFor = array();
    $clearfix   = '';

    if ( isset( $args['xs'] ) && is_int( $args['xs'] ) ) {
        $performFor[] = 'xs';
    }
    if ( isset( $args['sm'] ) && is_int( $args['sm'] ) ) {
        $performFor[] = 'sm';
    }
    if ( isset( $args['md'] ) && is_int( $args['md'] ) ) {
        $performFor[] = 'md';
    }
    if ( isset( $args['lg'] ) && is_int( $args['lg'] ) ) {
        $performFor[] = 'lg';
    }

    foreach ( $performFor as $v ) {
        $modulus = $grid / $args[ $v ];
        $clearfix .= ( $i > 0 && $i % $modulus == 0 ? ' <'.$element.' class="clearfix visible-' . $v . '"></'.$element.'>' : '' );
    }
    return $clearfix;
}
require get_template_directory() . '/functions/theme-default-setup.php';