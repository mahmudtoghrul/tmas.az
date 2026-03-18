<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <a href="<?= url('/') ?>" class="footer-logo">
                    <span class="logo-text">TMAS</span>
                    <span class="logo-sub">Analytics & Strategy</span>
                </a>
                <p class="footer-desc"><?= __('footer_description') ?></p>
            </div>

            <div class="footer-col">
                <h4><?= __('footer_nav') ?></h4>
                <ul>
                    <li><a href="<?= url('/about') ?>"><?= __('nav_about') ?></a></li>
                    <li><a href="<?= url('/services') ?>"><?= __('nav_services') ?></a></li>
                    <li><a href="<?= url('/portfolio') ?>"><?= __('nav_portfolio') ?></a></li>
                    <li><a href="<?= url('/blog') ?>"><?= __('nav_blog') ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?= __('footer_services') ?></h4>
                <ul>
                    <li><a href="<?= url('/services') ?>">Performance Marketing</a></li>
                    <li><a href="<?= url('/services') ?>">Growth Hacking</a></li>
                    <li><a href="<?= url('/services') ?>">Marketing Analytics</a></li>
                    <li><a href="<?= url('/services') ?>">Strategic Consulting</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?= __('footer_contact') ?></h4>
                <ul class="contact-list">
                    <li>info@tmas.az</li>
                    <li>Baku, Azerbaijan</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> TM Analytics & Strategy. <?= __('footer_rights') ?></p>
        </div>
    </div>
</footer>
