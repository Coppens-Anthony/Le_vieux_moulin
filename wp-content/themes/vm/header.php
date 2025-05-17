<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Anthony Coppens">
    <meta name="keywords"
          content="asbl, foyers, maisons, jeunes, vieux, moulin, association, soutenir, dons, confiance, respect, juridique, famille, entraide">
    <meta name="description"
          content="<?= get_bloginfo('description') ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="/wp-content/themes/vm/resources/svg/little_logo.svg">
    <link rel="stylesheet" href="/wp-content/themes/vm/public/css/style.css">
    <script src="/wp-content/themes/vm/resources/js/main.js"></script>
    <title><?= get_bloginfo('title') ?> - <?= get_the_title() ?></title>
</head>
<body>
<header class="header">
    <h1 class="sro">Le Vieux Moulin</h1>
    <div class="header__brand">
        <input type="checkbox" id="menuToggle">
        <div class="header__brand__logo" itemtype="https://schema.org/Organization" itemscope>
            <a href="<?= home_url() ?>" title="Retour &agrave; l&apos;accueil"
               class="header__brand__logo__link">Accueil</a>
            <svg width="236" height="129" viewBox="0 0 236 129" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="150.47" y="9.50195" width="10.5577" height="21.1154" rx="2" transform="rotate(7.2433 150.47 9.50195)" fill="#FFB240"/>
                <rect x="153.899" y="38.3065" width="8.75072" height="16.2681" rx="2" transform="rotate(12.945 153.899 38.3065)" fill="#FFB240"/>
                <rect x="155.043" y="59.9115" width="6.89124" height="11.3648" rx="2" transform="rotate(32.0045 155.043 59.9115)" fill="#FFB240"/>
                <rect x="153.673" y="77.071" width="5.26372" height="9.07445" rx="2" transform="rotate(32.0045 153.673 77.071)" fill="#FFB240"/>
                <rect x="160.972" y="82.4718" width="5.26372" height="9.07445" rx="2" transform="rotate(42.6392 160.972 82.4718)" fill="#FFB240"/>
                <rect x="167.302" y="87.6287" width="5.26372" height="9.07445" rx="2" transform="rotate(48.7816 167.302 87.6287)" fill="#FFB240"/>
                <rect x="174.536" y="97.1306" width="5.26372" height="9.07445" rx="2" transform="rotate(75.3696 174.536 97.1306)" fill="#FFB240"/>
                <rect x="176.931" y="106.633" width="5.26372" height="9.07445" rx="2" transform="rotate(87.2557 176.931 106.633)" fill="#FFB240"/>
                <rect x="177" y="114" width="6" height="9" rx="2" transform="rotate(90 177 114)" fill="#FFB240"/>
                <rect x="165.444" y="66.5134" width="6.89124" height="11.3648" rx="2" transform="rotate(32.0045 165.444 66.5134)" fill="#FFB240"/>
                <rect x="175.764" y="73.9037" width="6.89124" height="11.3648" rx="2" transform="rotate(44.0183 175.764 73.9037)" fill="#FFB240"/>
                <rect x="183.404" y="83.4056" width="6.89124" height="11.3648" rx="2" transform="rotate(54.0715 183.404 83.4056)" fill="#FFB240"/>
                <rect x="189.63" y="97.1306" width="6.89124" height="11.3648" rx="2" transform="rotate(80.3957 189.63 97.1306)" fill="#FFB240"/>
                <rect x="192.962" y="109.809" width="6.89124" height="11.3648" rx="2" transform="rotate(90.045 192.962 109.809)" fill="#FFB240"/>
                <rect x="172.888" y="45.398" width="8.75072" height="16.2681" rx="2" transform="rotate(34.6281 172.888 45.398)" fill="#FFB240"/>
                <rect x="186.583" y="54.8999" width="8.75072" height="16.2681" rx="2" transform="rotate(44.1225 186.583 54.8999)" fill="#FFB240"/>
                <rect x="198.038" y="66.5134" width="8.75072" height="16.2681" rx="2" transform="rotate(54.7099 198.038 66.5134)" fill="#FFB240"/>
                <rect x="207.805" y="83.4056" width="8.75072" height="16.2681" rx="2" transform="rotate(74.2282 207.805 83.4056)" fill="#FFB240"/>
                <rect x="212.735" y="101.531" width="8.75072" height="16.2681" rx="2" transform="rotate(90.6255 212.735 101.531)" fill="#FFB240"/>
                <rect x="173.806" y="15.8365" width="10.5577" height="21.1154" rx="2" transform="rotate(25.5477 173.806 15.8365)" fill="#FFB240"/>
                <rect x="194.6" y="27.45" width="10.5577" height="21.1154" rx="2" transform="rotate(41.7622 194.6 27.45)" fill="#FFB240"/>
                <rect x="211.323" y="43.2865" width="10.5577" height="21.1154" rx="2" transform="rotate(49.2886 211.323 43.2865)" fill="#FFB240"/>
                <rect x="226.721" y="62.2903" width="10.5577" height="21.1154" rx="2" transform="rotate(62.5284 226.721 62.2903)" fill="#FFB240"/>
                <rect x="232.397" y="85.3481" width="10.5577" height="21.1154" rx="2" transform="rotate(72.3371 232.397 85.3481)" fill="#FFB240"/>
                <path class="blue" d="M18.0579 129H0L18.0579 0H28.5916L72 98L123.897 0H137.942L156 129H127.408L118.881 43L77.7492 123H66.2122L27.0868 44.5L18.0579 129Z" fill="<?= is_front_page() ? '#FFFFF0' : '#1A0051'; ?>"/>
                <path class="blue" d="M48.1543 0H35.1125L72 84.5L116 0H102.83L72 59.5L48.1543 0Z" fill="<?= is_front_page() ? '#FFFFF0' : '#1A0051'; ?>"/>
                <path d="M69 109.136C39.4 109.936 15.3333 121.803 7 127.636C22.3333 121.136 43.5 110.5 81 123.636C105.163 132.101 135.667 128.136 149 122.636C142.833 122.97 126.2 122.037 109 115.637C91.8 109.237 75.1667 108.637 69 109.136Z" fill="#8AF5E1"/>
            </svg>
        </div>
        <label for="menuToggle">
            <span class="<?= is_front_page() ? '' : 'span_home_page'; ?>"></span>
            <span class="<?= is_front_page() ? '' : 'span_home_page'; ?>"></span>
            <span class="<?= is_front_page() ? '' : 'span_home_page'; ?>"></span>
        </label>
        <nav class="header__brand__nav">
            <h2 class="sro">
                Navigation principale
            </h2>
            <ul class="header__brand__nav__list">
                <?php foreach (dw_get_navigation_links('header') as $link):
                    $is_active = ($_SERVER['REQUEST_URI'] == parse_url($link->href, PHP_URL_PATH)) ? 'current_page' : ''; ?>
                    <li class="header__brand__nav__list__item">
                        <a href="<?= $link->href; ?>"
                           title="Vers la page <?= $link->label ?>"
                           class="<?= $is_active ?> <?= is_front_page() ? 'home_page' : ''; ?> hover_animation"
                        >
                            <?= $link->label; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
