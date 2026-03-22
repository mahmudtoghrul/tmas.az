<!-- Top Bar -->
<div class="top-bar" id="topBar">
    <div class="container">
        <div class="top-bar-left">
            <a href="tel:+994501234567"><i class="fas fa-phone"></i> +994 50 123 45 67</a>
            <a href="mailto:info@tmas.az"><i class="fas fa-envelope"></i> info@tmas.az</a>
            <span class="top-bar-divider"></span>
            <span><i class="fas fa-map-marker-alt"></i> Baku, Azerbaijan</span>
        </div>
        <div class="top-bar-right">
            <div class="top-bar-social">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
            </div>
            <div class="lang-switcher">
                <?php $languages = config('languages'); ?>
                <?php foreach ($languages as $code => $l): ?>
                    <a href="<?= \Core\Language::switchUrl($code) ?>"
                       class="<?= $code === lang() ? 'active' : '' ?>">
                        <?= strtoupper($code) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="site-header" id="header">
    <div class="container">
        <a href="<?= url('/') ?>" class="logo">
            <span class="logo-text">TMAS</span>
            <span class="logo-sub">Analytics & Strategy</span>
        </a>

        <nav class="main-nav" id="mainNav">
            <ul>
                <li><a href="<?= url('/') ?>" <?= is_active('/') ? 'class="active"' : '' ?>><?= __('nav_home') ?></a></li>
                <li><a href="<?= url('/about') ?>" <?= is_active('/about') ? 'class="active"' : '' ?>><?= __('nav_about') ?></a></li>
                <li><a href="<?= url('/services') ?>" <?= is_active('/services') ? 'class="active"' : '' ?>><?= __('nav_services') ?></a></li>
                <li><a href="<?= url('/portfolio') ?>" <?= is_active('/portfolio') ? 'class="active"' : '' ?>><?= __('nav_portfolio') ?></a></li>
                <li><a href="<?= url('/blog') ?>" <?= is_active('/blog') ? 'class="active"' : '' ?>><?= __('nav_blog') ?></a></li>
                <li><a href="<?= url('/contact') ?>" <?= is_active('/contact') ? 'class="active"' : '' ?>><?= __('nav_contact') ?></a></li>
            </ul>
        </nav>

        <div class="header-right">
            <a href="<?= url('/contact') ?>" class="header-cta-btn"><?= __('hero_contact') ?></a>
            <button class="burger" id="burger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
