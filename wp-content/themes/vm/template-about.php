<?php

/*
Template Name: About Page
*/

get_header(); ?>

<main class="about">
    <section class="intro">
        <h2 class="sro"><?= get_the_title() ?></h2>
        <p class="intro__text"><?= get_field('content') ?></p>
        <div class="intro__video_container">
            <video controls>
                <source src="<?= get_field('video') ?>">
            </video>
        </div>
    </section>
</main>

<?php get_footer();