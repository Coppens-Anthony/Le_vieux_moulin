<?php

/*
Template Name: Legacies Page
*/


get_header();

?>
    <main class="legacies">
        <h2 class="sro">
            <?= get_the_title() ?>
        </h2>
        <article class="legacies__article animate">
            <h3 class="legacies__article__title">
                <strong>&Eacute;diteur</strong> du site
            </h3>
            <div class="legacies__article__content">
                <?= get_field('editor') ?>
            </div>
        </article>

        <article class="legacies__article animate">
            <h3 class="legacies__article__title">
                <strong>H&eacute;bergement</strong>
            </h3>
            <div class="legacies__article__content">
                <?= get_field('hosting') ?>
            </div>
        </article>

        <article class="legacies__article animate">
            <h3 class="legacies__article__title">
                Propri&eacute;t&eacute; <strong>intellectuelle</strong>
            </h3>
            <div class="legacies__article__content">
                <?= get_field('intellectual_propriety') ?>
            </div>
        </article>

        <article class="legacies__article animate">
            <h3 class="legacies__article__title">
                <strong>Responsabilit&eacute;</strong>
            </h3>
            <div class="legacies__article__content">
                <?= get_field('responsability') ?>
            </div>
        </article>

        <article class="legacies__article animate">
            <h3 class="legacies__article__title">
                <strong>Protection</strong> des donn&eacute;es personnelles
            </h3>
            <div class="legacies__article__content">
                <?= get_field('data_protection') ?>
            </div>
        </article>

        <article class="legacies__article animate">
            <h3 class="legacies__article__title">
                <strong>Droit</strong> applicable et juridiction comp&eacute;tente
            </h3>
            <div class="legacies__article__content">
                <?= get_field('law') ?>
            </div>
        </article>
    </main>
<?php
get_footer();
?>