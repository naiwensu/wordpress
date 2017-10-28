<?php
/*
 * Archive Template File.
 */
get_header();
$header_class = (esc_html(get_theme_mod('display_fixed_header')))?esc_attr('heading-layer'):esc_attr('transparent'); ?>   
<!--archive posts start-->
<div class="heading-wrap blog-heading-wrap">
    <div class="<?php echo $header_class; ?>">
        <div class="heading-title">
            <h4> <?php _e('Archive ','business-consultant'); the_archive_title(); ?> </h4>
        </div>
    </div>
</div>
<?php  get_template_part('content'); get_footer(); ?>