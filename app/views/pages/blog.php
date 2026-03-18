<section class="page-hero">
    <div class="container">
        <h1><?= __('blog_title') ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="blog-grid">
            <?php foreach (($posts ?? []) as $post): ?>
                <article class="blog-card">
                    <?php if (!empty($post['image'])): ?>
                        <div class="blog-image">
                            <img src="/uploads/<?= e($post['image']) ?>" alt="<?= e($post['title_' . lang()] ?? '') ?>">
                        </div>
                    <?php endif; ?>
                    <div class="blog-body">
                        <time datetime="<?= $post['published_at'] ?? '' ?>">
                            <?= date('d.m.Y', strtotime($post['published_at'] ?? 'now')) ?>
                        </time>
                        <h3><a href="<?= url('/blog/' . ($post['slug_' . lang()] ?? '')) ?>"><?= e($post['title_' . lang()] ?? '') ?></a></h3>
                        <p><?= str_limit(e($post['excerpt_' . lang()] ?? ''), 150) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (($pagination['total_pages'] ?? 0) > 1): ?>
            <?php \Core\View::partial('pagination', ['pagination' => $pagination]) ?>
        <?php endif; ?>
    </div>
</section>
