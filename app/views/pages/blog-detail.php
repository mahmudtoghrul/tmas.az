<section class="page-hero">
    <div class="container">
        <h1><?= e($post['title_' . lang()] ?? '') ?></h1>
        <time datetime="<?= $post['published_at'] ?? '' ?>">
            <?= date('d.m.Y', strtotime($post['published_at'] ?? 'now')) ?>
        </time>
    </div>
</section>

<section class="section">
    <div class="container content-narrow">
        <?php if (!empty($post['image'])): ?>
            <div class="featured-image">
                <img src="/uploads/<?= e($post['image']) ?>" alt="">
            </div>
        <?php endif; ?>

        <div class="content-block">
            <?= $post['content_' . lang()] ?? '' ?>
        </div>
    </div>
</section>
