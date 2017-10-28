<?php
/*
 * The Header template for our theme
 */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">    
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>> 
    <?php $preloader = esc_html(get_theme_mod('preloader',1));
    $custom_preloader = esc_url(get_theme_mod('custom_preloader'));
    if($preloader != 2) :
        if($custom_preloader == '') { ?>
            <div class="preloader">
                <span class="preloader-gif">
                    <svg width='70px' height='70px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring">
                        <circle id="loader" cx="50" cy="50" r="40" stroke-dasharray="163.36281798666926 87.9645943005142" stroke="<?php echo esc_attr(get_theme_mod('theme_color','#106391')); ?>" fill="none" stroke-width="5"></circle>
                    </svg>
                </span>
            </div>
        <?php } else{ ?>
            <div class="preloader"><span class="preloader-gif preloader-no-svg" ></span></div>
    <?php } endif; ?>    
<header>
    <div id="business_consultant_navigation" class="navbar">
        <div class="container">
            <!-- Logo start -->
            <div class="main-logo">
                <?php $logo = '';
                 if(has_custom_logo()){
                        the_custom_logo();
                    } else{
                    echo '<div class="logo-light "><a href="'.esc_url( home_url('/')).'" rel="home" class="site-title"><h4 class="custom-logo ">'.esc_html(get_bloginfo('name')).'</h4></a><h6 class="custom-logo site-description">'.esc_html(get_bloginfo('description')).'</h6></div>';
                }                
                $scroll_logo=wp_get_attachment_url(esc_html(get_theme_mod('scroll_logo','')));
                if($scroll_logo != ''){ ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                        <img class="img-responsive logo-dark" src="<?php echo esc_url($scroll_logo); ?>" alt="<?php esc_attr_e('Logo','business-consultant'); ?>">
                    </a>
                <?php } ?>
            </div>
            <!-- Logo start -->
            <!-- Menu start -->
            <div id="cssmenu">                    
                <?php $business_consultant_defaults = array(
                    'theme_location' => 'primary',
                    'container'       => 'ul',
                    'menu_class'      => 'offside',
                    'echo'            => true,
                    'depth'           => 0,
                );  
                wp_nav_menu($business_consultant_defaults); ?>
            </div>
            <!-- Menu end -->
        </div>
    </div>
</header>