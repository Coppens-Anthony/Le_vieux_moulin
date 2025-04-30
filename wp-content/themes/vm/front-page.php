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
                                       title="<?= get_sub_field('link_title') ?>" class="button"><?= get_sub_field('link_text') ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?= wp_get_attachment_image(get_field('background_image'), 'medium', attr: 'class=home__intro__image'); ?>
        </section>
    </main>
<?php
//get_footer();
