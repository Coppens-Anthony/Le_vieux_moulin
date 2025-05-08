<?php

/*
Template Name: Life Page
*/

get_header(); ?>

    <main class="life">
        <section class="intro">
            <h2 class="sro"><?= get_the_title() ?></h2>
            <p class="intro__text"><?= get_field('intro')['content'] ?></p>
            <div class="intro__image_container">
                <?= wp_get_attachment_image(get_field('intro')['image'], 'medium'); ?>
            </div>
        </section>
        <section class="houses">
            <h2 class="houses__title"><?= get_field('houses_title', false, false) ?></h2>
            <?php
            $houses = new WP_Query([
                'post_type' => 'house',
                'order' => 'ASC',
                'orderby' => 'date',
            ]);

            if ($houses->have_posts()): ?>
                <ul class="houses__list">
                    <?php while ($houses->have_posts()): $houses->the_post(); ?>
                        <li class="houses__list__item">
                            <article class="houses__list__item__article">
                                <h3 class="sro"><?= get_the_title(); ?></h3>
                                <div class="houses__list__item__article__content_Container">
                                    <p class="houses__list__item__article__content_Container__text"><?= get_field('desc') ?></p>
                                    <a href="<?= get_the_permalink(); ?>" title="Vers le foyer <?= get_the_title(); ?>"
                                       class="houses__list__item__article__content_Container__link button"><?= get_the_title(); ?></a>
                                </div>
                                <div class="houses__list__item__article__image">
                                    <?= wp_get_attachment_image(get_field('image'), 'medium'); ?>
                                </div>
                            </article>
                        </li>
                    <?php endwhile ?>
                </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </section>
        <?php render_flexible_layout('life', ''); ?>
        <?php render_flexible_layout('family', ''); ?>
        <section class="flexible_content day">
            <?php $day = get_field('day') ?>
            <h2 class="flexible_content__intro__title"><?= get_field('day_title', false, false) ?></h2>
            <p class="day__content"><?= get_field('day')['desc'] ?></p>
            <div class="day__container">
                <?php if (have_rows('day')): while (have_rows('day')): the_row(); ?>
                    <?php if (have_rows('list')): ?>
                        <ul class="day__container__list">
                            <?php while (have_rows('list')): the_row(); ?>
                                <li class="day__container__list__item">
                                    <?= wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
                                    <p> <?= get_sub_field('activity') ?></p>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; endwhile; endif; ?>
                <?= wp_get_attachment_image(get_field('day')['image'], 'medium', attr: 'class=day__container__img'); ?>
            </div>
        </section>
    </main>

<?php get_footer();