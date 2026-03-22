<?php $isEdit = !empty($item); ?>

<div class="admin-page-header">
    <h1><?= $isEdit ? 'Portfolio Redaktə Et' : 'Yeni Portfolio' ?></h1>
    <a href="/admin/portfolio" class="btn btn-secondary">&#8592; Geri</a>
</div>

<div class="admin-card">
    <form method="POST" action="<?= $isEdit ? '/admin/portfolio/' . $item['id'] : '/admin/portfolio' ?>" enctype="multipart/form-data" class="admin-form">
        <?= csrf_field() ?>
        <?php if ($isEdit): ?>
            <?= method_field('PUT') ?>
        <?php endif; ?>

        <!-- Language Tabs -->
        <div class="lang-tabs">
            <button type="button" class="lang-tab active" data-lang="az">Azərbaycan</button>
            <button type="button" class="lang-tab" data-lang="ru">Русский</button>
            <button type="button" class="lang-tab" data-lang="en">English</button>
        </div>

        <!-- AZ -->
        <div class="lang-content active" data-lang="az">
            <div class="form-group">
                <label>Başlıq (AZ) <span class="required">*</span></label>
                <input type="text" name="title_az" class="form-control" value="<?= e($item['title_az'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Slug (AZ)</label>
                <input type="text" name="slug_az" class="form-control" value="<?= e($item['slug_az'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Kateqoriya (AZ)</label>
                <input type="text" name="category_az" class="form-control" value="<?= e($item['category_az'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Kontent (AZ)</label>
                <textarea name="content_az" class="form-control" rows="8"><?= e($item['content_az'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- RU -->
        <div class="lang-content" data-lang="ru">
            <div class="form-group">
                <label>Заголовок (RU)</label>
                <input type="text" name="title_ru" class="form-control" value="<?= e($item['title_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Slug (RU)</label>
                <input type="text" name="slug_ru" class="form-control" value="<?= e($item['slug_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Категория (RU)</label>
                <input type="text" name="category_ru" class="form-control" value="<?= e($item['category_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Контент (RU)</label>
                <textarea name="content_ru" class="form-control" rows="8"><?= e($item['content_ru'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- EN -->
        <div class="lang-content" data-lang="en">
            <div class="form-group">
                <label>Title (EN)</label>
                <input type="text" name="title_en" class="form-control" value="<?= e($item['title_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Slug (EN)</label>
                <input type="text" name="slug_en" class="form-control" value="<?= e($item['slug_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Category (EN)</label>
                <input type="text" name="category_en" class="form-control" value="<?= e($item['category_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Content (EN)</label>
                <textarea name="content_en" class="form-control" rows="8"><?= e($item['content_en'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Common Fields -->
        <div class="form-row">
            <div class="form-group">
                <label>Müştəri</label>
                <input type="text" name="client" class="form-control" value="<?= e($item['client'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>URL (Layihə linki)</label>
                <input type="url" name="url" class="form-control" value="<?= e($item['url'] ?? '') ?>" placeholder="https://">
            </div>
        </div>

        <div class="form-group">
            <label>Şəkil</label>
            <div class="image-upload">
                <input type="file" name="image" accept="image/*">
                <div class="upload-text"><strong>Faylı seçin</strong> və ya buraya sürükləyin</div>
                <?php if (!empty($item['image'])): ?>
                    <div class="image-preview">
                        <img src="<?= e($item['image']) ?>" alt="Current image">
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" <?= ($item['is_active'] ?? 1) ? 'checked' : '' ?>>
                Aktiv
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Yadda Saxla' : 'Yarat' ?></button>
            <a href="/admin/portfolio" class="btn btn-secondary">Ləğv Et</a>
        </div>
    </form>
</div>
