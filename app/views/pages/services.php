<section class="page-hero">
    <div class="container">
        <h1><?= __('services_title') ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="services-grid">
            <?php foreach (($services ?? []) as $service): ?>
                <div class="service-card">
                    <div class="service-icon">
                        <img src="/uploads/<?= e($service['icon'] ?? '') ?>" alt="">
                    </div>
                    <h3><?= e($service['title_' . lang()] ?? '') ?></h3>
                    <p><?= e($service['description_' . lang()] ?? '') ?></p>
                    <a href="<?= url('/services/' . ($service['slug_' . lang()] ?? '')) ?>" class="btn btn-outline">
                        <?= __('learn_more') ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
