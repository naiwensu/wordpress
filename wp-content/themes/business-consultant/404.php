<?php
/*
 * Search Template File
 */
get_header();
$header_class = (esc_html(get_theme_mod('display_fixed_header')))?esc_attr('heading-layer'):esc_attr('transparent'); ?>
<div class="heading-wrap blog-heading-wrap">
    <div class="<?php echo $header_class; ?>">
        <div class="heading-title">
            <h4><?php _e('404 - ARTICLE NOT FOUND', 'business-consultant'); ?></h4>
        </div>
    </div>
</div>
<div class="business-consultant-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12 content">
                <div class="blog-content-area fadeIn animated">
                    <div class="search-area">
                        <p class="spage">
                            <?php _e("This is embarassing. We can't find what you were looking for.",'business-consultant'); ?>
                            <br>
                            <?php _e('Whatever you were looking for was not found, but maybe try looking again or search using the form below.', 'business-consultant'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer();