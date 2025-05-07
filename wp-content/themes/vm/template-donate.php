<?php

/*
Template Name: Donate Page
*/
get_header(); ?>

    <main class="donate">
        <section class="intro">
            <h2 class="sro"><?= get_the_title() ?></h2>
            <p class="intro__text"><?= get_field('intro')['text'] ?></p>
            <div class="intro__image_container">
                <?= wp_get_attachment_image(get_field('intro')['image'], 'medium'); ?>
            </div>
        </section>
        <section class="donate__follow">
            <div class="donate__follow__intro">
                <h2 class="donate__follow__intro__title"><?= get_field('donation')['title'], false, false ?></h2>
            </div>
            <?php if (have_rows('donation_projects')): ?>
                <ul class="donate__follow__list">
                    <?php while (have_rows('donation_projects')): the_row(); ?>
                        <li class="donate__follow__list__item">
                            <article class="donate__follow__list__item__article">
                                <?= wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
                                <h3 class="donate__follow__list__item__article__title"><?= get_sub_field('title'); ?></h3>
                            </article>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </section>
        <?php render_flexible_layout('money', 'dons_financiers'); ?>
        <?php render_flexible_layout('material','dons_materiels'); ?>
        <?php render_flexible_layout('volunteer', 'benevolat'); ?>
    </main>

<?php get_footer();
