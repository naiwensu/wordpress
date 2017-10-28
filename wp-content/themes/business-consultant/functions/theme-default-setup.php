<?php
/*
 * Business Consultant Main Sidebar
 */
function business_consultant_widgets_init() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'business-consultant'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar that appears on the right.', 'business-consultant'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1', 'business-consultant'),
        'id' => 'footer-1',
        'description' => __('Footer that appears on the down.', 'business-consultant'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Footer 2', 'business-consultant'),
        'id' => 'footer-2',
        'description' => __('Footer that appears on the down.', 'business-consultant'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Footer 3', 'business-consultant'),
        'id' => 'footer-3',
        'description' => __('Footer that appears on the down.', 'business-consultant'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Footer 4', 'business-consultant'),
        'id' => 'footer-4',
        'description' => __('Footer that appears on the down.', 'business-consultant'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    ));
}
add_action('widgets_init', 'business_consultant_widgets_init');
/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
function business_consultant_entry_meta() {
	$business_consultant_author= ucfirst(get_the_author());
	$business_consultant_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$business_consultant_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date(get_option( 'date_format' )))); ?>	
    <p><?php esc_html_e('By : ', 'business-consultant'); ?><a href="<?php echo $business_consultant_author_url; ?>" rel="tag"><?php echo esc_attr($business_consultant_author); ?></a> - <?php echo $business_consultant_date; ?></p>
<?php 	
}
/*
* Function For Tag Meta List
*/
function business_consultant_tag_meta() {
	$business_consultant_tag_list = get_the_tag_list('', ', #' );
	if(!empty($business_consultant_tag_list)) { ?>
	<div class="single-blog-tag"><?php echo sprintf( '<span>%1$s</span>#%2$s',esc_html_e('Tag :','business-consultant'),$business_consultant_tag_list); ?></div>
	<?php }
}

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'business_consultant_required_plugins' );
function business_consultant_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','business-consultant'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','business-consultant'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ),
        array(
           'name'      => __('Contact Form 7','business-consultant'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'Business Consultantpro-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Required Plugins', 'business-consultant' ),
           'menu_title'                      => __( 'Install Plugins', 'business-consultant' ),
           'installing'                      => __( 'Installing Plugin: %s', 'business-consultant' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'business-consultant' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','business-consultant' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','business-consultant' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','business-consultant' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','business-consultant' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','business-consultant' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','business-consultant' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','business-consultant' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','business-consultant' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','business-consultant' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','business-consultant' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'business-consultant' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'business-consultant' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'business-consultant' ), 
           'nag_type'                        => 'updated'
        )
      );
      business_consultant( $plugins, $config );
    }
}
require get_template_directory() . '/functions/enqueue-files.php';
require get_template_directory() . '/functions/theme-customization.php';