<?php $isEdit = !empty($page); ?>

<div class="admin-page-header">
    <h1><?= $isEdit ? 'Səhifəni Redaktə Et' : 'Yeni Səhifə' ?></h1>
    <a href="/admin/pages" class="btn btn-secondary">&#8592; Geri</a>
</div>

<div class="admin-card">
    <form method="POST" action="<?= $isEdit ? '/admin/pages/' . $page['id'] : '/admin/pages' ?>" class="admin-form">
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
                <input type="text" name="title_az" class="form-control" value="<?= e($page['title_az'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Slug (AZ)</label>
                <input type="text" name="slug_az" class="form-control" value="<?= e($page['slug_az'] ?? '') ?>">
                <div class="form-hint">Boş buraxsanız, başlıqdan avtomatik yaradılacaq</div>
            </div>
            <div class="form-group">
                <label>Kontent (AZ)</label>
                <textarea name="content_az" class="form-control" rows="8"><?= e($page['content_az'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Meta Açıqlama (AZ)</label>
                <textarea name="meta_description_az" class="form-control" rows="2"><?= e($page['meta_description_az'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- RU -->
        <div class="lang-content" data-lang="ru">
            <div class="form-group">
                <label>Заголовок (RU) <span class="required">*</span></label>
                <input type="text" name="title_ru" class="form-control" value="<?= e($page['title_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Slug (RU)</label>
                <input type="text" name="slug_ru" class="form-control" value="<?= e($page['slug_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Контент (RU)</label>
                <textarea name="content_ru" class="form-control" rows="8"><?= e($page['content_ru'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Мета описание (RU)</label>
                <textarea name="meta_description_ru" class="form-control" rows="2"><?= e($page['meta_description_ru'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- EN -->
        <div class="lang-content" data-lang="en">
            <div class="form-group">
                <label>Title (EN) <span class="required">*</span></label>
                <input type="text" name="title_en" class="form-control" value="<?= e($page['title_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Slug (EN)</label>
                <input type="text" name="slug_en" class="form-control" value="<?= e($page['slug_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Content (EN)</label>
                <textarea name="content_en" class="form-control" rows="8"><?= e($page['content_en'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Meta Description (EN)</label>
                <textarea name="meta_description_en" class="form-control" rows="2"><?= e($page['meta_description_en'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Common Fields -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" <?= ($page['is_active'] ?? 1) ? 'checked' : '' ?>>
                Aktiv
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Yadda Saxla' : 'Yarat' ?></button>
            <a href="/admin/pages" class="btn btn-secondary">Ləğv Et</a>
        </div>
    </form>
</div>
