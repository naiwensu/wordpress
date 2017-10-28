<?php
/**
 * Template Name: Full Width
 **/
get_header();
$header_class = (esc_html(get_theme_mod('display_fixed_header')))?esc_attr('heading-layer'):esc_attr('transparent'); ?>
 <div class="heading-wrap blog-heading-wrap" >
    <div class="<?php echo $header_class; ?>">       
    </div>
</div>  
<?php 
get_template_part('content-fullwidth'); 
get_footer(); ?>