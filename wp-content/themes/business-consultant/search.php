<?php
/*
 * Search Template File
 */
get_header();
$header_class = (esc_html(get_theme_mod('display_fixed_header')))?esc_attr('heading-layer'):esc_attr('transparent'); ?>
<div class="heading-wrap blog-heading-wrap">
    <div class="<?php echo $header_class; ?>">
        <div class="heading-title">
            <h4><?php _e('Search results for', 'business-consultant');
                echo " : " . get_search_query();
            ?></h4>
        </div>
    </div>
</div>
<?php if (have_posts()) : ?>
    <?php get_template_part('content'); ?>
<?php else : ?>
    <div class="business-consultant-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 content">
                    <div class="blog-content-area fadeIn animated">
                        <div class="search-area">
                            <p class="spage">
                                <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords', 'business-consultant'); ?>.</p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php endif; get_footer(); ?>