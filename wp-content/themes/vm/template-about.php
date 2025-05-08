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
                <h2 class="values__container__title"><?= get_field('values_title', false, false) ?></h2>
                <?php if (have_rows('values')): ?>
                    <ul class="values__container__list">
                        <?php while (have_rows('values')): the_row(); ?>
                            <li class="values__container__list__item">
                                <article class="values__container__list__item__article">
                                    <div class="values__container__list__item__article__img_container">
                                        <img class="values__container__list__item__article__img_container__img"
                                             src="<?= wp_get_attachment_url(get_sub_field('value_drawing')); ?>">
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
            <?php $history =  get_field('history') ?>
            <h2 class="history__title"><?= get_field('history_title', false, false) ?></h2>
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
        <section class="downloading" id="downloading">
            <?php $downloading =  get_field('downloading') ?>
            <h2 class="downloading__title"><?= get_field('downloading_title', false, false) ?></h2>
            <div class="downloading__container">
                <?php if (have_rows('downloading')): while (have_rows('downloading')): the_row(); ?>
                    <?php if (have_rows('list')): ?>
                        <ul class="downloading__container__list">
                            <?php while (have_rows('list')): the_row(); ?>
                                <li class="downloading__container__list__item">
                                    <a href="<?= get_sub_field('file'); ?>"
                                       title="T&eacute;l&eacute;chargez '<?= get_sub_field('title'); ?>'" download> </a>
                                    <p><?= get_sub_field('title'); ?></p>
                                    <img src="/wp-content/themes/vm/resources/svg/download.svg"
                                         alt="Ic&ograve;ne de t&eacute;l&eacute;chargement">
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; endwhile; endif; ?>
            </div>
        </section>
        <section class="partner flexible_content">
            <div class="flexible_content__intro">
                <?php $partner = get_field('partner') ?>
                <h2 class="flexible_content__intro__title"><?= get_field('partner_title', false, false) ?></h2>
                <a href="<?= get_field('partner')['link_to_page'] ?>"
                   class="flexible_content__intro__link hover_animation"
                   title="Vers la page contact"><?= get_field('partner')['link'] ?>
                </a>
            </div>
            <p class="partner__content"><?= get_field('partner')['content'] ?></p>
            <div class="partner__container">
                <?php if (have_rows('partner')): while (have_rows('partner')): the_row(); ?>
                    <?php if (have_rows('list')): ?>
                        <ul class="partner__container__list">
                            <?php while (have_rows('list')): the_row(); ?>
                                <li class="partner__container__list__item">
                                    <a href="<?= get_sub_field('link') ?>"
                                       target="_blank" rel="noopener"
                                       title="Vers la page de <?= get_sub_field('name') ?>"><?= get_sub_field('name') ?></a>
                                        <?= wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; endwhile; endif; ?>
            </div>
        </section>
    </main>

<?php get_footer();