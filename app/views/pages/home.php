<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?= __('hero_title') ?></h1>
            <p class="hero-subtitle"><?= __('hero_subtitle') ?></p>
            <div class="hero-actions">
                <a href="<?= url('/services') ?>" class="btn btn-primary"><?= __('hero_cta') ?></a>
                <a href="<?= url('/contact') ?>" class="btn btn-outline"><?= __('hero_contact') ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="section services-preview">
    <div class="container">
        <h2 class="section-title"><?= __('services_title') ?></h2>
        <div class="services-grid">
            <?php foreach (($services ?? []) as $service): ?>
                <div class="service-card">
                    <div class="service-icon">
                        <img src="/uploads/<?= e($service['icon'] ?? '') ?>" alt="">
                    </div>
                    <h3><?= e($service['title_' . lang()] ?? '') ?></h3>
                    <p><?= str_limit(e($service['description_' . lang()] ?? ''), 120) ?></p>
                    <a href="<?= url('/services/' . ($service['slug_' . lang()] ?? '')) ?>" class="link-arrow">
                        <?= __('learn_more') ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About Preview -->
<section class="section about-preview dark-bg">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <h2 class="section-title"><?= __('about_preview_title') ?></h2>
                <p><?= __('about_preview_text') ?></p>
                <a href="<?= url('/about') ?>" class="btn btn-primary"><?= __('about_more') ?></a>
            </div>
            <div class="about-stats">
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label"><?= __('stat_projects') ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">30+</span>
                    <span class="stat-label"><?= __('stat_clients') ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5+</span>
                    <span class="stat-label"><?= __('stat_years') ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-section">
    <div class="container">
        <h2><?= __('cta_title') ?></h2>
        <p><?= __('cta_text') ?></p>
        <a href="<?= url('/contact') ?>" class="btn btn-accent"><?= __('cta_button') ?></a>
    </div>
</section>
