<section class="page-hero">
    <div class="container">
        <h1><?= e($service['title_' . lang()] ?? '') ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="content-block">
            <?= $service['content_' . lang()] ?? '' ?>
        </div>
    </div>
</section>
