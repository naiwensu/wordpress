<div class="blog-wrapper">
    <div class="container">
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'row responsive' ); ?>>
            <div class="col-md-12 col-sm-12 col-xs-12 content-fullwidth">
                <div class="blog-content-area fadeIn animated">
                    <div class="row">
					<?php $bs_clearfix = 0;
					while ( have_posts() ) : the_post();
						the_content(); 					
					 endwhile;  ?>
						</div>                    
                </div>
            </div>        	
		</div>
    </div>
</div>