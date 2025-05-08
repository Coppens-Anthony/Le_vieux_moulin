<?php

/*
Template Name: Contact Page
*/

get_header(); ?>

    <main class="contact animate">
        <?php
        $errors = $_SESSION['contact_form_errors'] ?? [];
        unset($_SESSION['contact_form_errors']);
        $success = $_SESSION['contact_form_success'] ?? false;
        unset($_SESSION['contact_form_success']);

        if ($success): ?>
            <div class="success-message">
                <p><?= $success; ?></p>
            </div>
        <?php endif; ?>
        <h2 class="contact__title"><?= get_field('title', false, false) ?></h2>
        <div class="contact__container">
            <section class="contact__container__info">
                <h3 class="sro"><?= get_the_title() ?></h3>
                <p class="contact__container__info__text"><?= get_field('text') ?></p>
                <div class="contact__container__info__links_container">
                    <ul class="contact__container__info__links_container__list">
                        <li class="contact__container__info__links_container__list__item">
                            <img src="/wp-content/themes/vm/resources/svg/mail.svg" alt="Ic&ograve;ne d&apos;enveloppe">
                            <a class="contact__container__info__links_container__list__item__link hover_animation"
                               title="Envoyez-nous un mail"
                               href="mailto:<?= get_field('mail') ?>">
                                Mail - <?= get_field('mail') ?>
                            </a>
                        </li>
                        <li class="contact__container__info__links_container__list__item">
                            <img src="/wp-content/themes/vm/resources/svg/phone.svg" alt="Ic&ograve;ne de t&eacute;l&eacute;phone">
                            <a class="contact__container__info__links_container__list__item__link hover_animation"
                               title="T&eacute;l&eacute;phonez-nous"
                               href="tel:<?= get_field('tel') ?>">
                                T&eacute;l&eacute;phone - <?= get_field('tel') ?>
                            </a>
                        </li>
                        <li class="contact__container__info__links_container__list__item">
                            <img src="/wp-content/themes/vm/resources/svg/download.svg" alt="Ic&ograve;ne de t&eacute;l&eacute;chargement">
                            <a class="contact__container__info__links_container__list__item__link hover_animation"
                               title="Vers les ressources t&eacute;l&eacute;chargeables"
                               href="<?= get_the_permalink(get_page_by_path('a-propos')->ID) . "#downloading" ?>">
                                Ressources t&eacute;l&eacute;chargeables
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="contact__container__form">
                <form action="<?= admin_url('admin-post.php'); ?>" method="post">
                    <div>
                        <label for="lastname">Nom
                            <span>*</span>
                            <?php if (isset($errors['lastname'])): ?>
                                <small class="error"><?= $errors['lastname']; ?></small>
                            <?php endif; ?>
                        </label>
                        <input type="text" id="lastname" name="lastname" placeholder="Doe">
                    </div>
                    <div>
                        <label for="firstname">Pr&eacute;nom
                            <span>*</span>
                            <?php if (isset($errors['firstname'])): ?>
                                <small class="error"><?= $errors['firstname']; ?></small>
                            <?php endif; ?>
                        </label>
                        <input type="text" id="firstname" name="firstname" placeholder="John">
                    </div>
                    <div>
                        <label for="email">Email
                            <span>*</span>
                            <?php if (isset($errors['email'])): ?>
                                <small class="error"><?= $errors['email']; ?></small>
                            <?php endif; ?>
                        </label>
                        <input type="text" id="email" name="email" placeholder="john.doe@gmail.com">
                    </div>
                    <div>
                        <label for="subject">Sujet
                            <span>*</span>
                            <?php if (isset($errors['subject'])): ?>
                                <small class="error"><?= $errors['subject']; ?></small>
                            <?php endif; ?>
                        </label>
                        <select id="subject" name="subject">
                            <?php if (have_rows('options')): while (have_rows('options')): the_row(); ?>
                                <option value="<?= get_sub_field('option') ?>"><?= get_sub_field('option') ?></option>
                            <?php endwhile; endif; ?>
                        </select>
                    </div>
                    <div>
                        <label for="message">Message
                            <span>*</span>
                            <?php if (isset($errors['message'])): ?>
                                <small class="error"><?= $errors['message']; ?></small>
                            <?php endif; ?>
                        </label>
                        <textarea name="message" id="message" cols="30" rows="10"
                                  placeholder="Renseignez votre message..."></textarea>
                    </div>
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button type="submit" title="Soumettre vos donn&eacute;es" name="submit" class="button">Soumettre</button>
                </form>
            </section>
        </div>
    </main>
<?php get_footer();