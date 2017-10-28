<?php
/**
 * Main Page template file
 **/
get_header();
$header_class = (esc_html(get_theme_mod('display_fixed_header')))?esc_attr('heading-layer'):esc_attr('transparent'); ?> 
    <div class="heading-wrap blog-heading-wrap">
        <div class="<?php echo $header_class; ?>">
            <div class="heading-title">
                <h4><?php the_title(); ?></h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row responsive">
            <div class="col-md-9 col-sm-12 col-xs-12 content">
            <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content();
                    wp_link_pages();
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    } ?>
            <?php endwhile;  ?> 
            </div>
            <?php get_sidebar();?>            
        </div>
    </div>
<?php get_footer(); ?>