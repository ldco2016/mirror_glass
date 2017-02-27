<?php
require_once('wp_bootstrap_navwalker.php');

// Theme Support
function mirror_glass_theme_setup(){
	// Logo Support
	add_theme_support('custom-logo');
	register_nav_menus(array(
		'primary' => __('Primary Menu')
	));
}

add_action('after_setup_theme', 'mirror_glass_theme_setup');

function bcarousel_default_function(){

	// this creates the Featured Image widget in pages and post
	add_theme_support('post-thumbnails');

	register_post_type('bcarousel', array(
		'labels' => array(
			'name' => 'Carousel Option',
			'add_new_item' => 'Add new carousel'
		 ),
			'public'	=> true,
			'menu_icon' => 'dashicons-art',
			'supports'	=> array('title', 'editor', 'thumbnail')
	));

}

add_action('after_setup_theme', 'bcarousel_default_function');


function boot_carousel_css_js(){

	wp_enqueue_style('fawesome', get_template_directory_uri().'/assets/css/font-awesome.css');
	wp_enqueue_style('bootcss', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('stylecss', get_stylesheet_uri());

	wp_enqueue_script('jquery', get_template_directory_uri().'/assets/js/jquery-1.12.4.min.js');
	wp_enqueue_script('bootjs', get_template_directory_uri().'/assets/js/bootstrap.min.js');
}

add_action('wp_enqueue_scripts', 'boot_carousel_css_js');