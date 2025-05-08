<?php
get_header(); ?>

    <main class="single_house">
        <section class="intro animate">
            <h2 class="sro"><?= get_the_title() ?></h2>
            <p class="intro__text"><?= get_field('intro')['content'] ?></p>
            <div class="intro__image_container">
                <?= wp_get_attachment_image(get_field('intro')['image'], 'medium'); ?>
            </div>
        </section>
        <section class="values stats">
            <div class="values__container animate">
                <h2 class="values__container__title"><?= get_field('values_title', false, false) ?></h2>
                <?php if (have_rows('values')): ?>
                    <ul class="values__container__list stats__list">
                        <?php while (have_rows('values')): the_row(); ?>
                            <li class="values__container__list__item stats__list__item">
                                <article class="values__container__list__item__article" itemtype="https://schema.org/Organization" itemscope>
                                    <div class="values__container__list__item__article__img_container">
                                        <img class="values__container__list__item__article__img_container__img"
                                             src="<?= wp_get_attachment_url(get_sub_field('value_drawing')); ?>" alt="Dessin repr&eacute;sentant la fonction de la personne">
                                    </div>
                                    <p itemprop="numberOfEmployees" class="values__container__list__item__article__title"><?= get_sub_field('desc') ?></p>
                                    <h3 itemprop="employee" class="values__container__list__item__article__text"><?= get_sub_field('title') ?></h3>
                                </article>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
        <section class="gallery animate">
            <?php $gallery = get_field('gallery'); ?>
            <h2 class="gallery__title"><?= get_field('gallery_title', false, false) ?></h2>
            <?php if (have_rows('gallery')): while (have_rows('gallery')): the_row();
                $i = 1; ?>
                <?php if (have_rows('images')): ?>
                    <?php while (have_rows('images')): the_row();
                        ?>
                        <?= wp_get_attachment_image(get_sub_field('image'), 'medium', attr: "class=index_$i");
                        $i++ ?>
                    <?php endwhile; endif; endwhile; endif; ?>
        </section>
        <section class="map animate">
            <?php $map = get_field('map'); ?>
            <h2 class="map__title"><?= get_field('map_title', false, false) ?></h2>
            <?= wp_get_attachment_image(get_field('map')['image'], 'large'); ?>
        </section>
        <section class="flexible_content other animate">
            <h2 class="other__title"><?= get_field('other_title', false, false) ?></h2>
            <?php
            $other = new WP_Query([
                'post_type' => 'house',
                'posts_per_page' => 1,
                'post__not_in' => [get_the_ID()],
            ]);
            if ($other->have_posts()) :while ($other->have_posts()) : $other->the_post();
                $other_id = get_the_ID(); ?>
                <div class="flexible_content__content_container">
                    <div class="flexible_content__content_container__content">
                        <p class="flexible_content__content_container__content__text">
                            <?= get_field('desc', $other_id) ?>
                        </p>
                        <a title="Vers le second foyer" href="<?= get_permalink($other_id) ?>" class="button">
                            <?= get_the_title($other_id) ?>
                        </a>
                    </div>
                    <?= wp_get_attachment_image(get_field('image', $other_id), 'medium'); ?>
                </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </section>
    </main>

<?php get_footer();