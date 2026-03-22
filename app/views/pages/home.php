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

<!-- Tab Navigation (attached to slider bottom) -->
<div class="tabs-nav" role="tablist">
    <button class="tab-btn active" data-tab="tab-performance" role="tab" aria-selected="true">
        <span class="tab-btn-icon"><i class="fas fa-chart-line"></i></span>
        <span class="tab-btn-text"><?= __('tab1_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-growth" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-rocket"></i></span>
        <span class="tab-btn-text"><?= __('tab2_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-analytics" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-database"></i></span>
        <span class="tab-btn-text"><?= __('tab3_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-strategy" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-chess-queen"></i></span>
        <span class="tab-btn-text"><?= __('tab4_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-creative" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-palette"></i></span>
        <span class="tab-btn-text"><?= __('tab5_name') ?></span>
    </button>
</div>

<!-- Service Tabs -->
<section class="section service-tabs-section" id="serviceTabs">
    <div class="container">
        <!-- Tab Panels -->
        <div class="tabs-content">
            <!-- Tab 1: Performance Marketing -->
            <div class="tab-panel active" id="tab-performance" role="tabpanel">
                <div class="tab-panel-inner">
                    <div class="tab-image">
                        <div class="tab-image-placeholder">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="tab-image-accent"></div>
                    </div>
                    <div class="tab-info">
                        <h3 class="tab-info-title"><?= __('tab1_title') ?></h3>
                        <p class="tab-info-desc"><?= __('tab1_desc') ?></p>
                        <ul class="tab-info-list">
                            <li><i class="fas fa-check"></i> <?= __('tab1_item1') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab1_item2') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab1_item3') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab1_item4') ?></li>
                        </ul>
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('learn_more') ?></a>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Growth Hacking -->
            <div class="tab-panel" id="tab-growth" role="tabpanel">
                <div class="tab-panel-inner">
                    <div class="tab-image">
                        <div class="tab-image-placeholder">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="tab-image-accent"></div>
                    </div>
                    <div class="tab-info">
                        <h3 class="tab-info-title"><?= __('tab2_title') ?></h3>
                        <p class="tab-info-desc"><?= __('tab2_desc') ?></p>
                        <ul class="tab-info-list">
                            <li><i class="fas fa-check"></i> <?= __('tab2_item1') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab2_item2') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab2_item3') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab2_item4') ?></li>
                        </ul>
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('learn_more') ?></a>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Marketing Analytics -->
            <div class="tab-panel" id="tab-analytics" role="tabpanel">
                <div class="tab-panel-inner">
                    <div class="tab-image">
                        <div class="tab-image-placeholder">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="tab-image-accent"></div>
                    </div>
                    <div class="tab-info">
                        <h3 class="tab-info-title"><?= __('tab3_title') ?></h3>
                        <p class="tab-info-desc"><?= __('tab3_desc') ?></p>
                        <ul class="tab-info-list">
                            <li><i class="fas fa-check"></i> <?= __('tab3_item1') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab3_item2') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab3_item3') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab3_item4') ?></li>
                        </ul>
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('learn_more') ?></a>
                    </div>
                </div>
            </div>

            <!-- Tab 4: Strategic Consulting -->
            <div class="tab-panel" id="tab-strategy" role="tabpanel">
                <div class="tab-panel-inner">
                    <div class="tab-image">
                        <div class="tab-image-placeholder">
                            <i class="fas fa-chess-queen"></i>
                        </div>
                        <div class="tab-image-accent"></div>
                    </div>
                    <div class="tab-info">
                        <h3 class="tab-info-title"><?= __('tab4_title') ?></h3>
                        <p class="tab-info-desc"><?= __('tab4_desc') ?></p>
                        <ul class="tab-info-list">
                            <li><i class="fas fa-check"></i> <?= __('tab4_item1') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab4_item2') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab4_item3') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab4_item4') ?></li>
                        </ul>
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('learn_more') ?></a>
                    </div>
                </div>
            </div>

            <!-- Tab 5: Creative & Branding -->
            <div class="tab-panel" id="tab-creative" role="tabpanel">
                <div class="tab-panel-inner">
                    <div class="tab-image">
                        <div class="tab-image-placeholder">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="tab-image-accent"></div>
                    </div>
                    <div class="tab-info">
                        <h3 class="tab-info-title"><?= __('tab5_title') ?></h3>
                        <p class="tab-info-desc"><?= __('tab5_desc') ?></p>
                        <ul class="tab-info-list">
                            <li><i class="fas fa-check"></i> <?= __('tab5_item1') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab5_item2') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab5_item3') ?></li>
                            <li><i class="fas fa-check"></i> <?= __('tab5_item4') ?></li>
                        </ul>
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('learn_more') ?></a>
                    </div>
                </div>
            </div>
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
