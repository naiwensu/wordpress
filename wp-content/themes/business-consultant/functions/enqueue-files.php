<?php
/*
 * business-consultant Enqueue css and js files
 */
function business_consultant_enqueue() {
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array());
	wp_enqueue_style('business-consultant-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array());
	wp_enqueue_style('business-consultant-font-poppins', '//fonts.googleapis.com/css?family=Quicksand', array());
	wp_enqueue_style('business-consultant-main-style', get_template_directory_uri() .'/assets/css/default.css');

	business_consultant_customs_css();
	if (is_singular())
    wp_enqueue_script("comment-reply");
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-form');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',array(), '3.3.6', true);
  	wp_enqueue_script('business-consultant-script', get_template_directory_uri() . '/assets/js/custom.js',false, true, array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'business_consultant_enqueue' );