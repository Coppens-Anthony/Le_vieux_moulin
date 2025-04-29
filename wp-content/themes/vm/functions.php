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


register_sidebar([
    'name' => 'Coordonnées',
    'id' => 'location',
    'description' => 'Listes des coordonnées',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
]);

register_sidebar([
    'name' => 'Nous soutenir',
    'id' => 'donate',
    'description' => 'Listes des moyens de soutiens',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
]);

register_nav_menu('footer', 'Le menu de navigation de fin de page');

function dw_get_navigation_links(string $location): array
{
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];

    $nav = wp_get_nav_menu_items($nav_id);

    $links = [];

    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;

        $links[] = $link;
    }
    return $links;
}




session_write_close();