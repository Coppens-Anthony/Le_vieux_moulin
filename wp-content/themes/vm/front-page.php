<?php

/*
Template Name: Home Page
*/


get_header();
?>
    <main class="home">
        <section class="home__intro">
            <div class="home__intro__content">
                <h2 class="home__intro__content__title"><?= get_field('title') ?></h2>
                <div class="home__intro__content__links">
                    <?php if (have_rows('intro_links')): ?>
                        <ul class="home__intro__content__links__list">
                            <?php while (have_rows('intro_links')): the_row(); ?>
                                <li class="home__intro__content__links__list__item">
                                    <a href="<?= get_sub_field('link_page') ?>"
                                       title="<?= get_sub_field('link_title') ?>"
                                       class="button"><?= get_sub_field('link_text') ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?= wp_get_attachment_image(get_field('background_image'), 'medium', attr: 'class=home__intro__image'); ?>
        </section>
        <section class="houses">
            <h2 class="houses__title"><?= get_field('houses_title') ?></h2>
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
    </main>
<?php
get_footer();
