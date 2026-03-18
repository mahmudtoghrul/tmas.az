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
            <div class="lang-switcher">
                <?php $languages = config('languages'); ?>
                <?php foreach ($languages as $code => $l): ?>
                    <a href="<?= \Core\Language::switchUrl($code) ?>"
                       class="<?= $code === lang() ? 'active' : '' ?>">
                        <?= strtoupper($code) ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <button class="burger" id="burger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
