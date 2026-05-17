<!-- Hero Slider -->
<section class="hero-slider" id="heroSlider">
    <div class="hero-slides">
        <!-- Slide 1 -->
        <div class="hero-slide active" data-slide="0">
            <div class="slide-bg" <?php if ($img = $hv('home_slide1_image')): ?>style="background-image:url('<?= e($img) ?>')"<?php endif; ?>>
                <div class="slide-overlay"></div>
            </div>
            <div class="container">
                <div class="slide-content">
                    <span class="slide-label"><?= $h('home_slide1_label', 'slide1_label') ?></span>
                    <h1 class="slide-title"><?= $h('home_slide1_title', 'slide1_title') ?></h1>
                    <p class="slide-text"><?= $h('home_slide1_text', 'slide1_text') ?></p>
                    <div class="slide-actions">
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('hero_cta') ?></a>
                        <a href="<?= url('/about') ?>" class="btn btn-outline"><?= __('about_more') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide" data-slide="1">
            <div class="slide-bg slide-bg-2" <?php if ($img = $hv('home_slide2_image')): ?>style="background-image:url('<?= e($img) ?>')"<?php endif; ?>>
                <div class="slide-overlay"></div>
            </div>
            <div class="container">
                <div class="slide-content">
                    <span class="slide-label"><?= $h('home_slide2_label', 'slide2_label') ?></span>
                    <h1 class="slide-title"><?= $h('home_slide2_title', 'slide2_title') ?></h1>
                    <p class="slide-text"><?= $h('home_slide2_text', 'slide2_text') ?></p>
                    <div class="slide-actions">
                        <a href="<?= url('/portfolio') ?>" class="btn btn-accent"><?= __('nav_portfolio') ?></a>
                        <a href="<?= url('/contact') ?>" class="btn btn-outline"><?= __('hero_contact') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide" data-slide="2">
            <div class="slide-bg slide-bg-3" <?php if ($img = $hv('home_slide3_image')): ?>style="background-image:url('<?= e($img) ?>')"<?php endif; ?>>
                <div class="slide-overlay"></div>
            </div>
            <div class="container">
                <div class="slide-content">
                    <span class="slide-label"><?= $h('home_slide3_label', 'slide3_label') ?></span>
                    <h1 class="slide-title"><?= $h('home_slide3_title', 'slide3_title') ?></h1>
                    <p class="slide-text"><?= $h('home_slide3_text', 'slide3_text') ?></p>
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
        <span class="tab-btn-text"><?= $h('home_tab1_name', 'tab1_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-growth" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-rocket"></i></span>
        <span class="tab-btn-text"><?= $h('home_tab2_name', 'tab2_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-analytics" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-database"></i></span>
        <span class="tab-btn-text"><?= $h('home_tab3_name', 'tab3_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-strategy" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-chess-queen"></i></span>
        <span class="tab-btn-text"><?= $h('home_tab4_name', 'tab4_name') ?></span>
    </button>
    <button class="tab-btn" data-tab="tab-creative" role="tab" aria-selected="false">
        <span class="tab-btn-icon"><i class="fas fa-palette"></i></span>
        <span class="tab-btn-text"><?= $h('home_tab5_name', 'tab5_name') ?></span>
    </button>
</div>

<!-- Service Tabs -->
<section class="section service-tabs-section" id="serviceTabs">
    <div class="container">
        <!-- Tab Panels -->
        <div class="tabs-content">
            <?php
            $tabIds = ['tab-performance', 'tab-growth', 'tab-analytics', 'tab-strategy', 'tab-creative'];
            $tabIcons = ['fa-chart-line', 'fa-rocket', 'fa-database', 'fa-chess-queen', 'fa-palette'];
            for ($i = 1; $i <= 5; $i++):
            ?>
            <div class="tab-panel <?= $i === 1 ? 'active' : '' ?>" id="<?= $tabIds[$i-1] ?>" role="tabpanel">
                <div class="tab-panel-inner">
                    <div class="tab-image">
                        <?php if ($tabImg = $hv("home_tab{$i}_image")): ?>
                            <img src="<?= e($tabImg) ?>" alt="<?= $h("home_tab{$i}_title", "tab{$i}_title") ?>">
                        <?php else: ?>
                            <div class="tab-image-placeholder">
                                <i class="fas <?= $tabIcons[$i-1] ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="tab-image-accent"></div>
                    </div>
                    <div class="tab-info">
                        <h3 class="tab-info-title"><?= $h("home_tab{$i}_title", "tab{$i}_title") ?></h3>
                        <p class="tab-info-desc"><?= $h("home_tab{$i}_desc", "tab{$i}_desc") ?></p>
                        <ul class="tab-info-list">
                            <li><i class="fas fa-check"></i> <?= $h("home_tab{$i}_item1", "tab{$i}_item1") ?></li>
                            <li><i class="fas fa-check"></i> <?= $h("home_tab{$i}_item2", "tab{$i}_item2") ?></li>
                            <li><i class="fas fa-check"></i> <?= $h("home_tab{$i}_item3", "tab{$i}_item3") ?></li>
                            <li><i class="fas fa-check"></i> <?= $h("home_tab{$i}_item4", "tab{$i}_item4") ?></li>
                        </ul>
                        <a href="<?= url('/services') ?>" class="btn btn-accent"><?= __('learn_more') ?></a>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Process Steps -->
<section class="section process-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?= $h('home_process_label', 'process_label') ?></span>
            <h2 class="section-title"><?= $h('home_process_title', 'process_title') ?></h2>
        </div>
        <div class="process-steps">
            <?php for ($i = 1; $i <= 4; $i++): ?>
            <div class="process-step">
                <div class="process-step-number"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></div>
                <div class="process-step-content">
                    <h3><?= $h("home_process_step{$i}_title", "process_step{$i}_title") ?></h3>
                    <p><?= $h("home_process_step{$i}_text", "process_step{$i}_text") ?></p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Content Slider (Cases) -->
<section class="section cases-section dark-bg" id="casesSlider">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?= __('cases_label') ?></span>
            <h2 class="section-title"><?= __('cases_title') ?></h2>
        </div>
        <div class="cases-slider">
            <div class="cases-track">
                <?php
                $caseIcons = ['fa-store', 'fa-laptop-code', 'fa-chart-pie'];
                for ($i = 1; $i <= 3; $i++):
                ?>
                <div class="case-card">
                    <div class="case-image">
                        <?php if ($caseImg = $hv("home_case{$i}_image")): ?>
                            <img src="<?= e($caseImg) ?>" alt="<?= $h("home_case{$i}_title", "case{$i}_title") ?>">
                        <?php else: ?>
                            <div class="case-image-placeholder"><i class="fas <?= $caseIcons[$i-1] ?>"></i></div>
                        <?php endif; ?>
                    </div>
                    <div class="case-info">
                        <span class="case-category"><?= $h("home_case{$i}_category", "case{$i}_category") ?></span>
                        <h3><?= $h("home_case{$i}_title", "case{$i}_title") ?></h3>
                        <p><?= $h("home_case{$i}_text", "case{$i}_text") ?></p>
                        <div class="case-stats">
                            <div class="case-stat">
                                <span class="case-stat-value"><?= $hv("home_case{$i}_stat1_value", ($i === 1 ? '+240%' : ($i === 2 ? '+180%' : '+320%'))) ?></span>
                                <span class="case-stat-label"><?= $hv("home_case{$i}_stat1_label", ($i === 1 ? 'ROI' : ($i === 2 ? __('case_traffic') : 'ROAS'))) ?></span>
                            </div>
                            <div class="case-stat">
                                <span class="case-stat-value"><?= $hv("home_case{$i}_stat2_value", ($i === 1 ? '-35%' : ($i === 2 ? '3x' : '-50%'))) ?></span>
                                <span class="case-stat-label"><?= $hv("home_case{$i}_stat2_label", ($i === 1 ? 'CPA' : ($i === 2 ? __('case_leads') : 'CPC'))) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <div class="cases-controls">
                <button class="cases-arrow cases-prev" aria-label="Previous"><i class="fas fa-arrow-left"></i></button>
                <button class="cases-arrow cases-next" aria-label="Next"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="section testimonials-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?= __('testimonials_label') ?></span>
            <h2 class="section-title"><?= __('testimonials_title') ?></h2>
        </div>
        <div class="testimonials-grid">
            <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="testimonial-card">
                <div class="testimonial-quote">
                    <i class="fas fa-quote-left"></i>
                </div>
                <p class="testimonial-text"><?= $h("home_testimonial{$i}_text", "testimonial{$i}_text") ?></p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <span><?= $hv("home_testimonial{$i}_initials", __("testimonial{$i}_initials")) ?></span>
                    </div>
                    <div>
                        <strong><?= $h("home_testimonial{$i}_name", "testimonial{$i}_name") ?></strong>
                        <span><?= $h("home_testimonial{$i}_role", "testimonial{$i}_role") ?></span>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- About Preview -->
<section class="section about-preview dark-bg">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <h2 class="section-title"><?= $h('home_about_title', 'about_preview_title') ?></h2>
                <p><?= $h('home_about_text', 'about_preview_text') ?></p>
                <a href="<?= url('/about') ?>" class="btn btn-accent"><?= __('about_more') ?></a>
            </div>
            <div class="about-stats">
                <div class="stat-item">
                    <span class="stat-number"><?= $hv('home_stat1_value', '50+') ?></span>
                    <span class="stat-label"><?= $h('home_stat1_label', 'stat_projects') ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number"><?= $hv('home_stat2_value', '30+') ?></span>
                    <span class="stat-label"><?= $h('home_stat2_label', 'stat_clients') ?></span>
                </div>
                <div class="stat-item">
                    <span class="stat-number"><?= $hv('home_stat3_value', '5+') ?></span>
                    <span class="stat-label"><?= $h('home_stat3_label', 'stat_years') ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-section">
    <div class="container">
        <h2><?= $h('home_cta_title', 'cta_title') ?></h2>
        <p><?= $h('home_cta_text', 'cta_text') ?></p>
        <a href="<?= url('/contact') ?>" class="btn btn-accent"><?= $h('home_cta_button', 'cta_button') ?></a>
    </div>
</section>
