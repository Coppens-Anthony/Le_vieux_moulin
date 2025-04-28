<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function dw_asset(string $file): string
{
    return get_template_directory_uri() . '/public/' . $file;
}

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );
// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
// Disable default front-end styles.
add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');


register_post_type('house', [
    'label' => 'Foyers',
    'description' => 'Les foyers du Vieux Moulin',
    'menu_position' => 6,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-home',
    'public' => true,
    'rewrite' => [
        'slug' => 'foyers',
    ],
    'supports' => ['title','excerpt','editor','thumbnail'],
]);


register_post_type('actuality', [
    'label' => 'Actualités',
    'description' => 'Les actualités du Vieux Moulin',
    'menu_position' => 7,
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-aside',
    'public' => true,
    'rewrite' => [
        'slug' => 'actualités',
    ],
    'supports' => ['title','excerpt','editor','thumbnail'],
]);









session_write_close();