<div class="blog-wrapper">
    <div class="container">
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'row responsive' ); ?>>
            <div class="col-md-9 col-sm-12 col-xs-12 content">
                <div class="blog-content-area fadeIn animated">
                    <div class="row">
					<?php $bs_clearfix = 0;
					while ( have_posts() ) : the_post();
					$clearfix = business_consultant_bootstrap_clearfix( $bs_clearfix, array( 'xs' => 12, 'sm' => 12, 'md' => 6, 'lg' => 6 ) );
					echo $clearfix;
					$bs_clearfix ++; ?>
                    	<div class="col-sm-6 col-xs-12">    
							<div class="blog-content">
								<div class="title-data fadeIn animated">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php if ( 'post' === get_post_type() ) {
										business_consultant_entry_meta();
									} ?>
								</div>
								<?php if ( has_post_thumbnail() ) : ?>
								<div class="blog-images">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'business_consultant_thumbnail_image', array( 'alt' => esc_attr(get_the_title()), 'class' => 'img-responsive') ); ?></a>
								</div>
							<?php endif; ?>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink();?>" class="btn-light"><?php esc_html_e('READ MORE','business-consultant'); ?></a>
							</div>
						</div>	
					<?php endwhile;  ?>
						</div>
                    <?php the_posts_pagination( array(
                        'prev_text' => __( '<i class="fa fa-arrow-left" aria-hidden="true"></i>', 'business-consultant' ),
                        'next_text' => __( '<i class="fa fa-arrow-right" aria-hidden="true"></i>', 'business-consultant' ),
                    ) ); ?>
                </div>
            </div>
        	<?php get_sidebar(); ?>
		</div>
    </div>
</div>