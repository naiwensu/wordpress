<?php
/*
* Single Post template file
*/
get_header(); 
$header_class = (esc_html(get_theme_mod('display_fixed_header')))?esc_attr('heading-layer'):esc_attr('transparent'); ?>
<div class="heading-wrap blog-heading-wrap">
    <div class="<?php echo $header_class; ?>">
        <div class="heading-title">
            <h4><?php the_title(); ?></h4>
        </div>
    </div>
</div>
<div class="single-blog-wrapper">
    <div class="business-consultant-section">
        <div class="container">
            <div class="row responsive">
                <div class="col-md-9 col-sm-12 col-xs-12 content">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="single-blog-content-area fadeIn animated">
                            <div class="single-blog-content">
                                <div class="title-data fadeIn animated">
                                    <h2><?php the_title(); ?></h2>
                                    <?php business_consultant_entry_meta(); ?>
                                </div>
                                <?php if ( has_post_thumbnail() ) : ?>
                                 <div class="single-blog-images">
                                    <?php the_post_thumbnail( 'business_consultant_thumbnail_image', array( 'alt' => esc_html(get_the_title()), 'class' => esc_attr('img-responsive')) ); ?>
                                </div>
                                <?php endif;
                                the_content(); ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <?php business_consultant_tag_meta(); ?>                                   
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                <?php 
                                   the_post_navigation( array(
                                        'prev_text'          => __( '<i class="fa fa-arrow-left" aria-hidden="true"></i>', 'business-consultant' ),
                                        'next_text'          => __( '<i class="fa fa-arrow-right" aria-hidden="true"></i>', 'business-consultant' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'business-consultant' ) . ' </span>',
                                    ) ); ?>
                                </div>
                            </div>
                           <?php comments_template('', true); ?>
                        </div>
                        <?php 
                        wp_link_pages();
                    // Previous/next page navigation.
                     ?>
                <?php endwhile; ?>
                </div>
				<?php get_sidebar();?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>