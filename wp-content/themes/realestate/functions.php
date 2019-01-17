<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'template', get_stylesheet_directory_uri() . '/css/template.css');
}