<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Anthony Coppens">
    <meta name="keywords"
          content="asbl, foyers, maisons, jeunes, vieux, moulin, association, soutenir, dons, confiance, respect, juridique, famille, entraide">
    <meta name="description"
          content="<?= get_the_title() ?>">
    <!--Changer la descirption-->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--<link rel="stylesheet" href="<?php /*= dw_asset("css/style.css") */ ?>">-->
    <link rel="stylesheet" href="/wp-content/themes/vm/public/css/style.css">
    <title>Le Vieux Moulin - <?= get_the_title() ?></title>
</head>
<body>
<header class="header">
    <h1 class="sro">Le Vieux Moulin</h1>
    <div class="header__brand">
        <div class="header__brand__logo">
            <a href="<?= home_url() ?>" title="Retour &agrave; l&apos;accueil"
               class="header__brand__logo__link">Accueil</a>
            <img src=" <?= is_front_page() ? '/wp-content/themes/vm/resources/svg/white_logo.svg' : '/wp-content/themes/vm/resources/svg/logo.svg' ?>"
                 class="header__brand__logo__img"
                 alt="Logo du Vieux Moulin. Un 'V' dans le creux d'un 'M'. Avec une vague turquoise aux pieds qui représente un fleuve ainsi que des carrés oranges qui représentent la chaleur.">
        </div>
        <input type="checkbox" id="menuToggle">
        <label for="menuToggle">
            <span class="<?= is_front_page() ? '' : 'span_home_page'; ?>"></span>
            <span class="<?= is_front_page() ? '' : 'span_home_page'; ?>"></span>
            <span class="<?= is_front_page() ? '' : 'span_home_page'; ?>"></span>
        </label>
        <nav class="header__brand__nav">
            <h2 class="sro">
                Navigation principale
            </h2>
            <ul class="header__brand__nav__list">
                <?php foreach (dw_get_navigation_links('header') as $link):
                    $is_active = ($_SERVER['REQUEST_URI'] == parse_url($link->href, PHP_URL_PATH)) ? 'current_page' : ''; ?>
                    <li class="header__brand__nav__list__item">
                        <a href="<?= $link->href; ?>"
                           title="Vers la page <?= $link->label ?>"
                           class="<?= $is_active ?> <?= is_front_page() ? 'home_page' : ''; ?>"
                        >
                            <?= $link->label; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
