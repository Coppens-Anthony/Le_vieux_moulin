<?php

/*
Template Name: Donate Page
*/
get_header(); ?>

    <main class="donate">
        <section class="donate__intro">
            <h2 class="sro"><?= get_the_title() ?></h2>
            <p class="donate__intro__text"><?= get_field('intro')['text'] ?></p>
            <div class="donate__intro__image_container">
                <?= wp_get_attachment_image(get_field('intro')['image'], 'medium'); ?>
            </div>
        </section>
        <section class="donate__follow">
            <div class="donate__follow__intro">
                <h2 class="donate__follow__intro__title"><?= get_field('donation')['title'] ?></h2>
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
        <?php render_flexible_money_layout('money'); ?>
        <?php render_flexible_money_layout('material'); ?>
        <?php render_flexible_money_layout('volunteer'); ?>
    </main>

<?php get_footer();
