<?php
/*
 * default footer file
 */
$footer_widget_style = esc_html(get_theme_mod('footer_widget_style',3));
$hide_footer_widget_bar = esc_html(get_theme_mod('hide_footer_widget_bar',1)); ?>
<footer>
    <?php if(($hide_footer_widget_bar == 1) || ($hide_footer_widget_bar == '')) : 
        $footer_widget_style = $footer_widget_style+1;
        $footer_column_value = floor(12/($footer_widget_style)); ?>
        <div class="footer-box">
            <div class="container">
                <div class="row">
                    <?php $k = 1;
                    for( $i=0; $i<$footer_widget_style; $i++) {
                        if (is_active_sidebar('footer-'.$k)) { ?>
                            <div class="col-md-<?php echo esc_attr($footer_column_value); ?> col-sm-<?php echo esc_attr($footer_column_value); ?> col-xs-12"><?php dynamic_sidebar('footer-'.$k); ?></div>
                        <?php }
                        $k++;
                    } ?>
                </div>
            </div>
        </div>
    <?php endif;
    $copyright_style = esc_html(get_theme_mod('copyright_style','style1'));
    if(get_theme_mod('hide_copyright_area','1') != 2) :
        if($copyright_style == 'style1') : ?>
            <div class="footer-wrap <?php echo esc_attr($copyright_style); ?>">
                <div class="container no-padding">
                    <div class="row">
    					<div class="business-consultant-section">
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="copyright fadeIn animated">
                                    <p><?php echo wp_kses_post(get_theme_mod('Copyright_area_text')); ?></p>
                                    <p><?php esc_html_e('Powered By ','business-consultant'); ?><a href="<?php echo esc_url("https://electrathemes.com/wordpress-themes/business-consultant/"); ?>"><?php esc_html_e('Business Consultant WordPress Theme','business-consultant'); ?></a></p>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <?php if(get_theme_mod('footer_logo') != '') : ?>
                                    <div class="footer-logo fadeIn animated">
                                        <?php $footer_logo=get_theme_mod('footer_logo'); $footer_logo=wp_get_attachment_url($footer_logo);?>
                                        <img class="img-responsive" src="<?php echo esc_url($footer_logo); ?>" alt="<?php _e('Footer Logo','business-consultant');?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="footer-social-icon fadeIn animated">
                                    <ul>
                                        <?php for($i=1; $i<=6; $i++) : ?>
                                        <?php if(get_theme_mod('business_consultant_social_icon'.$i) != '' && get_theme_mod('business_consultant_social_icon_links'.$i) != '' ): ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_theme_mod('business_consultant_social_icon_links'.$i)); ?>" class="fb" title="" target="_blank">
                                                    <i class="fa <?php echo esc_attr(get_theme_mod('business_consultant_social_icon'.$i)); ?>"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
        <?php endif; ?>
        <?php if($copyright_style == 'style2') : ?>
            <div class="footer-wrap <?php echo esc_attr($copyright_style); ?>">
                <div class="container">
					<div class="bc-navigation">
                    <?php if(get_theme_mod('footer_logo') != '') : ?>
                        <div class="footer-logo fadeIn animated">
                            <?php $footer_logo=get_theme_mod('footer_logo'); $footer_logo=wp_get_attachment_url($footer_logo);?>
                            <img class="img-responsive" src="<?php echo esc_url($footer_logo); ?>" alt="<?php _e('Footer Logo','business-consultant');?>">
                        </div>
                    <?php endif; ?>
                    <?php if(get_theme_mod('footer_menu') != '') : ?>
                        <div class="footer-nav fadeIn animated">
                            <?php $business_consultant_menu_arguments = array('menu' => get_theme_mod('footer_menu'));
                                wp_nav_menu($business_consultant_menu_arguments); ?>
                        </div>
                    <?php endif; ?>
                    <div class="footer-social-icon fadeIn animated">
                        <ul>
                            <?php for($i=1; $i<=6; $i++) : ?>
                                <?php if(get_theme_mod('business_consultant_social_icon'.$i) != '' && get_theme_mod('business_consultant_social_icon_links'.$i) != '' ): ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_theme_mod('business_consultant_social_icon_links'.$i)); ?>" class="fb" title="" target="_blank">
                                            <i class="fa <?php echo esc_attr(get_theme_mod('business_consultant_social_icon'.$i)); ?>"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="copyright fadeIn animated">
                        <?php if(get_theme_mod('Copyright_area_text') != '') : ?>
                            <p><?php echo wp_kses_post(get_theme_mod('Copyright_area_text')); ?></p>
                        <?php endif; ?>
                        <p><?php esc_html_e('Powered By ','business-consultant'); ?><a href="<?php echo esc_url("https://electrathemes.com/wordpress-themes/business-consultant/"); ?>"><?php esc_html_e('Business Consultant WordPress Theme','business-consultant'); ?></a></p>
                    </div>
                </div>
				</div>
            </div>
        <?php endif;
        endif; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>