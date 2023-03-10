<?php


add_action('wp_enqueue_scripts', 'theme_name_scripts');

function theme_name_scripts()
{

	wp_enqueue_script('jquery');

	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', '', '', true);
	wp_enqueue_script('jquery');

	wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', '', '', true);
	wp_enqueue_script('custom');

	wp_register_script('filter', get_stylesheet_directory_uri() . '/assets/js//filter.js', array('jquery'), time(), true);
	wp_enqueue_script('filter');
	wp_localize_script('filter', 'true_obj', array('ajaxurl' => admin_url('admin-ajax.php')));

	wp_register_script('my_loadmore', get_stylesheet_directory_uri() . '/assets/js//myloadmore.js', array('jquery'));

	wp_localize_script('my_loadmore', 'news_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
	));

	wp_enqueue_script('my_loadmore');
}

add_action('wp_enqueue_scripts', 'inclede_style');

function inclede_style()
{

	wp_register_style('reset', get_template_directory_uri() . '/assets/css/reset.css');
	wp_enqueue_style('reset');

	wp_register_style('style', get_template_directory_uri() . '/assets/css/style.min.css');
	wp_enqueue_style('style');

	wp_register_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	wp_enqueue_style('responsive');
}
