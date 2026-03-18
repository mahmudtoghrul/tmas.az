<section class="page-hero">
    <div class="container">
        <h1><?= __('portfolio_title') ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="portfolio-grid">
            <?php foreach (($items ?? []) as $item): ?>
                <a href="<?= url('/portfolio/' . ($item['slug_' . lang()] ?? '')) ?>" class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="/uploads/<?= e($item['image'] ?? '') ?>" alt="<?= e($item['title_' . lang()] ?? '') ?>">
                    </div>
                    <div class="portfolio-info">
                        <h3><?= e($item['title_' . lang()] ?? '') ?></h3>
                        <span class="portfolio-category"><?= e($item['category_' . lang()] ?? '') ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <?php if (($pagination['total_pages'] ?? 0) > 1): ?>
            <?php \Core\View::partial('pagination', ['pagination' => $pagination]) ?>
        <?php endif; ?>
    </div>
</section>
