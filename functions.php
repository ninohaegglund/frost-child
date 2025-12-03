<?php
add_action('wp_enqueue_scripts', function () {
    // Ladda parent theme CSS
    wp_enqueue_style(
        'frost-parent',
        get_template_directory_uri() . '/style.css'
    );

    // Ladda child CSS (efter parent)
    wp_enqueue_style(
        'frost-child',
        get_stylesheet_directory_uri() . '/style.css',
        ['frost-parent']
    );
});
