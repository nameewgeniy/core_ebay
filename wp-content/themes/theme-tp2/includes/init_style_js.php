<?php

add_action('wp_enqueue_scripts', 'gbase_enqueue_script');

function gbase_enqueue_script(){
    wp_enqueue_script('bootstrapJS', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ) );
    wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ) );
    wp_enqueue_script('zoom', get_template_directory_uri() . '/js/zoom.js', array( 'jquery' ) );
    wp_enqueue_script('script', get_template_directory_uri() . '/js/JSbase.js', array( 'jquery', 'jquery-ui-button' ) );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'cloud-zoom', get_template_directory_uri() . 'css/cloud-zoom.css');
    wp_enqueue_style( 'fontello', get_template_directory_uri() . '/css/fontello.css');
    wp_enqueue_style( 'dashicons', home_url() . '/wp-includes/css/dashicons.min.css' );
}