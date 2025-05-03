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
        <section class="actualities">
            <div class="actualities__intro">
                <h2 class="actualities__intro__title"><?= get_field('actualities_title') ?></h2>
                <?php if (have_rows('actualities_link')): while (have_rows('actualities_link')): the_row(); ?>
                    <a class="actualities__intro__link" href="<?= get_sub_field('actualities_link_page') ?>"
                       title="<?= get_sub_field('actualities_link_title') ?>"><?= get_sub_field('actualities_link_text') ?></a>
                <?php endwhile; endif; ?>
            </div>
            <?php
            $actualities = new WP_Query([
                'post_type' => 'actuality',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 3,
            ]);

            if ($actualities->have_posts()): ?>
                <ul class="actualities__list">
                    <?php while ($actualities->have_posts()): $actualities->the_post(); ?>
                        <li class="actualities__list__item">
                            <a href="<?= get_the_permalink() ?>"
                               title="Découvrez l'actualité : '<?= get_field('title') ?>'">Vers l'actualité</a>
                            <article class="actualities__list__item__article">
                                <?= wp_get_attachment_image(get_field('image'), 'medium'); ?>
                                <h3 class="actualities__list__item__article__title"><?= get_field('title') ?></h3>
                            </article>
                        </li>
                    <?php endwhile ?>
                </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </section>
        <?php if (have_rows('sections')): ?>
            <?php while (have_rows('sections')): the_row();

                if (get_row_layout() === 'section'): ?>
                    <section class="flexible_content">
                        <div class="flexible_content__intro">
                            <h2 class="flexible_content__intro__title"><?= get_sub_field('title') ?></h2>

                            <?php if (have_rows('link')): while (have_rows('link')): the_row();
                                $type = get_sub_field('select');

                                if ($type === 'url') {
                                    $href = get_sub_field('url');
                                } elseif ($type === 'lien') {
                                    $href = get_sub_field('link_to_page');
                                }

                                if (get_sub_field('text')): ?>
                                    <a href="<?= $href ?>"
                                       class="flexible_content__intro__link"
                                       title="<?= get_sub_field('title') ?>"
                                        <?= ($type === 'url') ? 'target="_blank" rel="noopener"' : ''; ?>>
                                        <?= get_sub_field('text') ?>
                                    </a>
                                <?php endif; endwhile; endif; ?>
                        </div>
                        <div class="flexible_content__content_container">
                            <div class="flexible_content__content_container__content">
                                <p class="flexible_content__content_container__content__text"><?= get_sub_field('content') ?></p>
                                <?php if (get_sub_field('button_title')): ?>
                                    <label for="modal" title="Vers la boîte de don"
                                           class="flexible_content__content_container__content__label button"><?= get_sub_field('button_title') ?></label>
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
                            <?= wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
                        </div>
                    </section>
                <?php endif; endwhile; endif; ?>
    </main>
<?php
get_footer();
