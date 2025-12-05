<?php
add_action('wp_enqueue_scripts', function () {
  // Parent and child styles
  wp_enqueue_style('frost-parent', get_template_directory_uri() . '/style.css', [], wp_get_theme('frost')->get('Version'));
  wp_enqueue_style('frost-child', get_stylesheet_uri(), ['frost-parent'], wp_get_theme()->get('Version'));

  wp_enqueue_style('page-transition', get_stylesheet_directory_uri() . '/assets/css/page-transition.css', [], '1.0');

  wp_enqueue_script('page-transition', get_stylesheet_directory_uri() . '/assets/js/page-transition.js', [], '1.0', true);
});

add_filter('body_class', function ($classes) {
  $classes[] = 'is-preloading';
  return $classes;
});