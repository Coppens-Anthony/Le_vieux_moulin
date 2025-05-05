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
        <section class="values">
            <div class="values__container">
                <h2 class="values__container__title"><?= get_field('values_title') ?></h2>
                <?php if (have_rows('values')): ?>
                    <ul class="values__container__list">
                        <?php while (have_rows('values')): the_row(); ?>
                            <li class="values__container__list__item">
                                <article class="values__container__list__item__article">
                                    <div class="values__container__list__item__article__img_container">
                                        <img class="values__container__list__item__article__img_container__img"
                                             src="<?= wp_get_attachment_url(get_sub_field('value_drawing')); ?>" alt="">
                                    </div>
                                    <h3 class="values__container__list__item__article__title"><?= get_sub_field('title') ?></h3>
                                    <p class="values__container__list__item__article__text"><?= get_sub_field('desc') ?></p>
                                </article>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
        <section class="history">
            <h2 class="history__title"><?= get_field('history')['title'] ?></h2>
            <div class="history__content_container">
                <div class="history__content_container__content">
                    <?= get_field('history')['content'] ?>
                </div>
                <div class="history__content_container__images">
                    <?= wp_get_attachment_image(get_field('history')['old'], 'medium'); ?>
                    <?= wp_get_attachment_image(get_field('history')['beginning'], 'medium'); ?>
                    <?= wp_get_attachment_image(get_field('history')['now'], 'medium'); ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer();