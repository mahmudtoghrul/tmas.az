<div class="admin-page-header">
    <h1>Sayt Ayarları</h1>
</div>

<form method="POST" action="/admin/settings" class="admin-form">
    <?= csrf_field() ?>

    <!-- General Settings -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Ümumi Ayarlar</h3>
        </div>
        <div class="form-group">
            <label>Sayt Adı</label>
            <input type="text" name="site_name" class="form-control" value="<?= e($settings['site_name'] ?? '') ?>">
        </div>

        <div class="lang-tabs">
            <button type="button" class="lang-tab active" data-lang="az">Azərbaycan</button>
            <button type="button" class="lang-tab" data-lang="ru">Русский</button>
            <button type="button" class="lang-tab" data-lang="en">English</button>
        </div>

        <div class="lang-content active" data-lang="az">
            <div class="form-group">
                <label>Sayt Təsviri (AZ)</label>
                <textarea name="site_description_az" class="form-control" rows="2"><?= e($settings['site_description_az'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Meta Açar Sözlər (AZ)</label>
                <input type="text" name="meta_keywords_az" class="form-control" value="<?= e($settings['meta_keywords_az'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Footer Mətni (AZ)</label>
                <input type="text" name="footer_text_az" class="form-control" value="<?= e($settings['footer_text_az'] ?? '') ?>">
            </div>
        </div>

        <div class="lang-content" data-lang="ru">
            <div class="form-group">
                <label>Описание сайта (RU)</label>
                <textarea name="site_description_ru" class="form-control" rows="2"><?= e($settings['site_description_ru'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Мета ключевые слова (RU)</label>
                <input type="text" name="meta_keywords_ru" class="form-control" value="<?= e($settings['meta_keywords_ru'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Текст футера (RU)</label>
                <input type="text" name="footer_text_ru" class="form-control" value="<?= e($settings['footer_text_ru'] ?? '') ?>">
            </div>
        </div>

        <div class="lang-content" data-lang="en">
            <div class="form-group">
                <label>Site Description (EN)</label>
                <textarea name="site_description_en" class="form-control" rows="2"><?= e($settings['site_description_en'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Meta Keywords (EN)</label>
                <input type="text" name="meta_keywords_en" class="form-control" value="<?= e($settings['meta_keywords_en'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Footer Text (EN)</label>
                <input type="text" name="footer_text_en" class="form-control" value="<?= e($settings['footer_text_en'] ?? '') ?>">
            </div>
        </div>
    </div>

    <!-- Contact Settings -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Əlaqə Məlumatları</h3>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>E-poçt</label>
                <input type="email" name="contact_email" class="form-control" value="<?= e($settings['contact_email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Telefon</label>
                <input type="text" name="contact_phone" class="form-control" value="<?= e($settings['contact_phone'] ?? '') ?>">
            </div>
        </div>

        <div class="lang-tabs">
            <button type="button" class="lang-tab active" data-lang="az">AZ</button>
            <button type="button" class="lang-tab" data-lang="ru">RU</button>
            <button type="button" class="lang-tab" data-lang="en">EN</button>
        </div>

        <div class="lang-content active" data-lang="az">
            <div class="form-group">
                <label>Ünvan (AZ)</label>
                <input type="text" name="contact_address_az" class="form-control" value="<?= e($settings['contact_address_az'] ?? '') ?>">
            </div>
        </div>
        <div class="lang-content" data-lang="ru">
            <div class="form-group">
                <label>Адрес (RU)</label>
                <input type="text" name="contact_address_ru" class="form-control" value="<?= e($settings['contact_address_ru'] ?? '') ?>">
            </div>
        </div>
        <div class="lang-content" data-lang="en">
            <div class="form-group">
                <label>Address (EN)</label>
                <input type="text" name="contact_address_en" class="form-control" value="<?= e($settings['contact_address_en'] ?? '') ?>">
            </div>
        </div>
    </div>

    <!-- Social Media -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Sosial Şəbəkələr</h3>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Facebook</label>
                <input type="url" name="social_facebook" class="form-control" value="<?= e($settings['social_facebook'] ?? '') ?>" placeholder="https://facebook.com/...">
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input type="url" name="social_instagram" class="form-control" value="<?= e($settings['social_instagram'] ?? '') ?>" placeholder="https://instagram.com/...">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>LinkedIn</label>
                <input type="url" name="social_linkedin" class="form-control" value="<?= e($settings['social_linkedin'] ?? '') ?>" placeholder="https://linkedin.com/...">
            </div>
            <div class="form-group">
                <label>Twitter / X</label>
                <input type="url" name="social_twitter" class="form-control" value="<?= e($settings['social_twitter'] ?? '') ?>" placeholder="https://x.com/...">
            </div>
        </div>
    </div>

    <!-- Analytics -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Analitika</h3>
        </div>
        <div class="form-group">
            <label>Google Analytics ID</label>
            <input type="text" name="google_analytics" class="form-control" value="<?= e($settings['google_analytics'] ?? '') ?>" placeholder="G-XXXXXXXXXX">
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Yadda Saxla</button>
    </div>
</form>
