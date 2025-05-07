<?php

/*
Template Name: Actualities Page
*/

get_header(); ?>

<main class="actualities">
    <section class="intro">
        <h2 class="sro"><?= get_the_title() ?></h2>
        <p class="intro__text"><?= get_field('text') ?></p>
        <div class="intro__image_container">
            <?= wp_get_attachment_image(get_field('image'), 'medium'); ?>
        </div>
    </section>
    <section class="actualities__all_actualities">
        <h2 class="actualities__all_actualities__title"><?= get_field('title'), false, false ?></h2>
        <?php
        $actualities = new WP_Query([
            'post_type' => 'actuality',
            'order' => 'DESC',
            'orderby' => 'date',
        ]);

        if ($actualities->have_posts()): ?>
            <ul class="actualities__all_actualities__list">
                <?php while ($actualities->have_posts()): $actualities->the_post(); ?>
                    <li class="actualities__all_actualities__list__item">
                        <a href="<?= get_the_permalink() ?>"
                           title="Découvrez l'actualité : '<?= get_field('title') ?>'">Vers l'actualité</a>
                        <article class="actualities__all_actualities__list__item__article">
                            <?= wp_get_attachment_image(get_field('image'), 'medium'); ?>
                            <h3 class="actualities__all_actualities__list__item__article__title"><?= get_field('title') ?></h3>
                        </article>
                    </li>
                <?php endwhile ?>
            </ul>
        <?php endif; ?>
    </section>
</main>

<?php get_footer();