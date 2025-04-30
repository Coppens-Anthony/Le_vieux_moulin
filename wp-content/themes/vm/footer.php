<footer class="footer">
    <h2 class="sro">Pied de page</h2>
    <div class="footer__upPart">
        <section class="footer__upPart__brand">
            <h3 class="sro">Suivez-nous</h3>
            <div class="footer__upPart__brand__logo">
                <a href="<?= home_url(); ?>" class="footer__upPart__brand__logo__link" title="Vers la page d'accueil"
                   aria-label="Aller à la page d'accueil">Accueil</a>
                <img src="/wp-content/themes/vm/resources/svg/little_logo_white.svg"
                     class="footer__upPart__brand__logo__img"
                     alt="Logo minimisé du Vieux Moulin. Un 'V' dans le creux d'un 'M'. Tout cela en blanc">
            </div>
            <small class="footer__upPart__brand__message">Un lieu, une mission : accueillir, accompagner,
                transmettre</small>
            <div>
            <a href="https://www.facebook.com/SRGVM/?locale=fr_FR" class="footer__upPart__brand__facebook"
               title="Découvrez notre page Facebook">f</a>
            <!--Typo klavika basic bold pour le f Facebook-->
            </div>
        </section>
        <section class="footer__upPart__infos">
            <h3 class="sro">Informations de pied de page</h3>
            <?php
            get_sidebar('location');
            get_sidebar('donate');
            ?>
            <nav class="footer__upPart__infos__nav" role="navigation" aria-label="Navigation de pied de page">
                <h4>Navigation</h4>
                <ol class="footer__upPart__infos__nav__list">
                    <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                        <li class="footer__upPart__infos__nav__list__item">
                            <a href="<?= $link->href; ?>" class="footer__upPart__infos__nav__list__item__link"
                               title="Vers la page <?= $link->label ?>">
                                <?= $link->label; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </section>
    </div>
    <section class="footer__downPart">
        <h2 class="sro">Mentions légales</h2>
        <small class="footer__downPart__text">© 2025 Le Vieux Moulin - Tous droits réservés.</small>
        <small class="footer__downPart__legacy">
            <a href="/mentions-legales" title="Se renseigner sur les mentions légales"
               class="footer__downPart__legacy__link">Mentions légales</a>
        </small>
    </section>
</footer>
</body>
</html>