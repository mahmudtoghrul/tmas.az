<?php $isEdit = !empty($post); ?>

<div class="admin-page-header">
    <h1><?= $isEdit ? 'Yazını Redaktə Et' : 'Yeni Yazı' ?></h1>
    <a href="/admin/blog" class="btn btn-secondary">&#8592; Geri</a>
</div>

<div class="admin-card">
    <form method="POST" action="<?= $isEdit ? '/admin/blog/' . $post['id'] : '/admin/blog' ?>" enctype="multipart/form-data" class="admin-form">
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
                <input type="text" name="title_az" class="form-control" value="<?= e($post['title_az'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Slug (AZ)</label>
                <input type="text" name="slug_az" class="form-control" value="<?= e($post['slug_az'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Qısa Təsvir (AZ)</label>
                <textarea name="excerpt_az" class="form-control" rows="3"><?= e($post['excerpt_az'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Kontent (AZ)</label>
                <textarea name="content_az" class="form-control" rows="10"><?= e($post['content_az'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- RU -->
        <div class="lang-content" data-lang="ru">
            <div class="form-group">
                <label>Заголовок (RU)</label>
                <input type="text" name="title_ru" class="form-control" value="<?= e($post['title_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Slug (RU)</label>
                <input type="text" name="slug_ru" class="form-control" value="<?= e($post['slug_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Краткое описание (RU)</label>
                <textarea name="excerpt_ru" class="form-control" rows="3"><?= e($post['excerpt_ru'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Контент (RU)</label>
                <textarea name="content_ru" class="form-control" rows="10"><?= e($post['content_ru'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- EN -->
        <div class="lang-content" data-lang="en">
            <div class="form-group">
                <label>Title (EN)</label>
                <input type="text" name="title_en" class="form-control" value="<?= e($post['title_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Slug (EN)</label>
                <input type="text" name="slug_en" class="form-control" value="<?= e($post['slug_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Excerpt (EN)</label>
                <textarea name="excerpt_en" class="form-control" rows="3"><?= e($post['excerpt_en'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Content (EN)</label>
                <textarea name="content_en" class="form-control" rows="10"><?= e($post['content_en'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Common Fields -->
        <div class="form-row">
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft" <?= ($post['status'] ?? 'draft') === 'draft' ? 'selected' : '' ?>>Qaralama</option>
                    <option value="published" <?= ($post['status'] ?? '') === 'published' ? 'selected' : '' ?>>Yayımla</option>
                </select>
            </div>
            <div class="form-group">
                <label>Şəkil</label>
                <div class="image-upload">
                    <input type="file" name="image" accept="image/*">
                    <div class="upload-text"><strong>Faylı seçin</strong> və ya buraya sürükləyin</div>
                    <?php if (!empty($post['image'])): ?>
                        <div class="image-preview">
                            <img src="<?= e($post['image']) ?>" alt="Current image">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Yadda Saxla' : 'Yarat' ?></button>
            <a href="/admin/blog" class="btn btn-secondary">Ləğv Et</a>
        </div>
    </form>
</div>
