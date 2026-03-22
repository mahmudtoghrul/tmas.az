<!-- Hero Slider -->
<section class="hero-slider" id="heroSlider">
    <div class="hero-slides">
        <!-- Slide 1 -->
        <div class="hero-slide active" data-slide="0">
            <div class="slide-bg">
                <div class="slide-overlay"></div>
            </div>
            <div class="container">
                <div class="slide-content">
                    <span class="slide-label"><?= __('slide1_label') ?></span>
                    <h1 class="slide-title"><?= __('slide1_title') ?></h1>
                    <p class="slide-text"><?= __('slide1_text') ?></p>
                    <div class="slide-actions">
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('hero_cta') ?></a>
                        <a href="<?= url('/about') ?>" class="btn btn-outline"><?= __('about_more') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide" data-slide="1">
            <div class="slide-bg slide-bg-2">
                <div class="slide-overlay"></div>
            </div>
            <div class="container">
                <div class="slide-content">
                    <span class="slide-label"><?= __('slide2_label') ?></span>
                    <h1 class="slide-title"><?= __('slide2_title') ?></h1>
                    <p class="slide-text"><?= __('slide2_text') ?></p>
                    <div class="slide-actions">
                        <a href="<?= url('/portfolio') ?>" class="btn btn-accent"><?= __('nav_portfolio') ?></a>
                        <a href="<?= url('/contact') ?>" class="btn btn-outline"><?= __('hero_contact') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide" data-slide="2">
            <div class="slide-bg slide-bg-3">
                <div class="slide-overlay"></div>
            </div>
            <div class="container">
                <div class="slide-content">
                    <span class="slide-label"><?= __('slide3_label') ?></span>
                    <h1 class="slide-title"><?= __('slide3_title') ?></h1>
                    <p class="slide-text"><?= __('slide3_text') ?></p>
                    <div class="slide-actions">
                        <a href="<?= url('/contact') ?>" class="btn btn-accent"><?= __('cta_button') ?></a>
                        <a href="<?= url('/services') ?>" class="btn btn-outline"><?= __('hero_cta') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider Controls -->
    <div class="slider-controls">
        <button class="slider-arrow slider-prev" aria-label="Previous">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-arrow slider-next" aria-label="Next">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <!-- Slider Pagination -->
    <div class="slider-pagination">
        <button class="slider-dot active" data-slide="0"><span>01</span></button>
        <div class="slider-progress"><div class="slider-progress-bar"></div></div>
        <button class="slider-dot" data-slide="1"><span>02</span></button>
        <div class="slider-progress"><div class="slider-progress-bar"></div></div>
        <button class="slider-dot" data-slide="2"><span>03</span></button>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator">
        <div class="scroll-line"></div>
        <span>Scroll</span>
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
                        <?= __('learn_more') ?> <i class="fas fa-arrow-right"></i>
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
                <a href="<?= url('/about') ?>" class="btn btn-accent"><?= __('about_more') ?></a>
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
