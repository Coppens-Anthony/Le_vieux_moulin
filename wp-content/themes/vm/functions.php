<?php


add_action('init', function () {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}, 1);


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
    'post_status' => 'publish',
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


add_image_size('mid', 500, 500);


register_nav_menu('footer', 'Le menu de navigation de fin de page');
register_nav_menu('header', 'Le menu de navigation de haut de page');

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


function render_flexible_layout($layout_name, $id): void
{
    if (!have_rows('flexible_content')) return;

    while (have_rows('flexible_content')): the_row();
        if (get_row_layout() !== $layout_name) continue; ?>

        <section class="flexible_content" id="<?= $id ?>">
            <div class="flexible_content__intro animate">
                <h2 class="flexible_content__intro__title"><?= get_sub_field('title', false, false) ?></h2>

                <?php if (have_rows('link')): while (have_rows('link')): the_row();
                    $type = get_sub_field('select');
                    $href = ($type === 'url') ? get_sub_field('url') : get_sub_field('link_to_page');

                    if (get_sub_field('text')): ?>
                        <a href="<?= $href ?>"
                           class="flexible_content__intro__link hover_animation"
                           title="<?= get_sub_field('title') ?>"
                            <?= ($type === 'url') ? 'target="_blank" rel="noopener"' : ''; ?>>
                            <?= get_sub_field('text') ?>
                        </a>
                    <?php endif; endwhile; endif; ?>
            </div>

            <div class="flexible_content__content_container">
                <div class="flexible_content__content_container__content">
                    <p class="flexible_content__content_container__content__text animate"><?= get_sub_field('content') ?></p>

                    <?php if (get_sub_field('button_title')): ?>
                        <label for="modal" title="Vers la bo&icirc;te de don"
                               class="flexible_content__content_container__content__label button animate"><?= get_sub_field('button_title') ?></label>
                        <input type="checkbox" id="modal" name="modal" class="modal_input">

                        <div class="modal_overlay">
                            <label for="modal" class="modal_overlay__label"></label>
                            <section class="modal_overlay__modal">
                                <div class="modal_overlay__modal__intro">
                                    <h3 class="modal_overlay__modal__intro__title"><?= get_field('modal_title') ?></h3>
                                    <label for="modal" class="modal_overlay__modal__intro__close"></label>
                                </div>
                                <div class="modal_overlay__modal__content_container">
                                    <div class="modal_overlay__modal__content_container__content">
                                        <p class="modal_overlay__modal__content_container__content__text">
                                            <?= get_field('modal_text') ?></p>
                                    </div>
                                    <?= wp_get_attachment_image(get_field('modal_image'), 'medium'); ?>
                                </div>
                            </section>
                        </div>
                    <?php endif; ?>
                </div>

                <?= wp_get_attachment_image(get_sub_field('image'), 'mid', attr: "class=animate"); ?>
            </div>
        </section>
    <?php

    endwhile;
}


register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title','editor'],
]);

add_action('admin_post_dw_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_nopriv_dw_submit_contact_form', 'dw_handle_contact_form');

require_once(__DIR__.'/forms/ContactForm.php');

function dw_handle_contact_form()
{
    $form = (new \DW_Theme\Forms\ContactForm())
        ->rule('lastname', 'required')
        ->rule('firstname', 'required')
        ->rule('email', 'required')
        ->rule('email', 'email')
        ->rule('subject', 'required')
        ->rule('message', 'required')
        ->sanitize('lastname', 'sanitize_text_field')
        ->sanitize('firstname', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('subject', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_textarea_field');

    return $form->handle($_POST);
}


function dashboard() {
    wp_add_dashboard_widget(
        'instructions_client',
        'Bienvenue ! Consignes à suivre',
        'update_content_instruction'
    );
}

function update_content_instruction() {
    echo '<p>Bienvenue dans l’interface d’administration. Voici quelques consignes :</p>';
    echo '<ul>
            <li>Ne touchez pas aux réglages du thème.</li>
            <li>Pour modifier les éléments spécifiques à une page, allez dans "Pages" et sélectionnez la page en question.</li>
            <li>Pour mettre à jour vos actualités, allez dans "Actualités".</li>
            <li>Pour mettre à jour les informations concernant les foyers, allez dans "Foyers".</li>
            <li>Vous pouvez consulter l’historique des messages envoyés via le formulaire de contact dans la section "Messages de contact".</li>
            <li>En cas de doute, vous pourrez me contacter à l&apos;adresse <a href="mailto:anthonycoppens04@gmail.com">anthonycoppens04@gmail.com</a>.</li>
          </ul>';
}

function upload() {
    wp_add_dashboard_widget(
        'upload_instructions',
        'Consignes pour la mise à jour en ligne',
        'upload_instruction'
    );
}

function upload_instruction() {
    echo '<p>Voici les étapes pour mettre à jour le site :</p>';
    echo '<ul>
            <li>Allez dans "All-In-One WP Migration" puis dans l&apos;option "Export".</li>
            <li>Sélectionner "File" comme méthode d&apos;export (cela va télécharger un fichier au format .wpress).</li>
            <li>Ouvrez FileZilla en vous connactant avec les informations de votre site.</li>
            <li>Aller dans le dossier "wp-content" et ensuite dans le "ai1wm-backups".</li>
            <li>Remplacez le fichier wpress par celui que vous avez téléchargez.</li>
            <li>Rendez-vous sur votre site en ligne.</li>
            <li>Ajouter "/wp-admin" dans votre url pour accéder à Wordpress.</li>
            <li>Connectez-vous.</li>
            <li>Allez dans "All-In-One WP Migration" puis dans l&apos;option "Backups".</li>
            <li>Cliquez sur les 3 points du fichier et sélectionnez "Restaurer".</li>
          </ul>
            <p>Et voilà, votre site vient d&apos;être mis à jour&nbsp;!</p>';
}

add_action('wp_dashboard_setup', 'dashboard');
add_action('wp_dashboard_setup', 'upload');



session_write_close();