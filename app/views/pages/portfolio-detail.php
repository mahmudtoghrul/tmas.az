<section class="page-hero">
    <div class="container">
        <h1><?= e($item['title_' . lang()] ?? '') ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if (!empty($item['image'])): ?>
            <div class="featured-image">
                <img src="/uploads/<?= e($item['image']) ?>" alt="<?= e($item['title_' . lang()] ?? '') ?>">
            </div>
        <?php endif; ?>

        <div class="content-block">
            <?= $item['content_' . lang()] ?? '' ?>
        </div>
    </div>
</section>
