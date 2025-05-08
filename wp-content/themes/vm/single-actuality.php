<?php get_header(); ?>
    <main class="single_actuality">
        <section class="single_actuality__content">
            <h2 class="single_actuality__content__title"><?= get_field('title') ?></h2>
            <div class="single_actuality__content__image_container">
                <?= wp_get_attachment_image(get_field('image'), 'medium'); ?>
            </div>
            <div class="single_actuality__content__description">
                <?= get_field('description') ?>
            </div>
        </section>
        <section class="actualities__all_actualities">
            <h2 class="actualities__all_actualities__title">D&apos;autres <strong>actualit&eacute;s</strong> &agrave; lire</h2>
            <?php
            $actualities = new WP_Query([
                'post_type' => 'actuality',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
            ]);

            if ($actualities->have_posts()): ?>
                <ul class="actualities__all_actualities__list">
                    <?php while ($actualities->have_posts()): $actualities->the_post(); ?>
                        <li class="actualities__all_actualities__list__item">
                            <a href="<?= get_the_permalink() ?>"
                               title="D&eacute;couvrez l&apos;actualit&eacute; : '<?= get_the_title() ?>'">Vers l&apos;actualit&eacute;</a>
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