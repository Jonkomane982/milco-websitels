<?php
function milco_theme_scripts() {
    // Enqueue styles
    wp_enqueue_style('milco-style', get_stylesheet_uri());
    wp_enqueue_style('milco-static-style', get_template_directory_uri() . '/style-static.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');

    // Enqueue scripts
    wp_enqueue_script('milco-script', get_template_directory_uri() . '/script.js', array(), '1.0', true);

    // Pass theme URI to JS
    wp_localize_script('milco-script', 'milcoTheme', array(
        'templateUrl' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'milco_theme_scripts');

function milco_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'milco_theme_setup');
?>
