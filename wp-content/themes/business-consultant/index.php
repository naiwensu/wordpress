<?php
/**
 * The main template file
 **/
get_header();
$header_class = (esc_html(get_theme_mod('display_fixed_header')))?esc_attr('heading-layer'):esc_attr('transparent'); ?>
 <div class="heading-wrap blog-heading-wrap" >
    <div class="<?php echo $header_class; ?>">
        <div class="heading-title">
            <h4>
            <?php $business_consultant_blog_page = esc_html(get_option('page_for_posts')); 
    		if(!empty($business_consultant_blog_page)){ 
                echo get_the_title(get_option( 'page_for_posts' )); 
            } else{ 
                esc_html_e( "Blog", 'business-consultant' );
            }  ?>
            </h4>
        </div>
    </div>
</div> 
<?php get_template_part('content'); get_footer(); ?>