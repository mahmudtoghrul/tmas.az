<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'Admin') ?> — TMAS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/admin.css') ?>">
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="admin-sidebar-header">
                <h2>TMAS Admin</h2>
                <small>Content Management</small>
            </div>
            <nav class="admin-nav">
                <div class="admin-nav-section">
                    <div class="admin-nav-label">Əsas</div>
                    <a href="/admin" class="<?= ($_SERVER['REQUEST_URI'] === '/admin' || $_SERVER['REQUEST_URI'] === '/admin/') ? 'active' : '' ?>">
                        <span class="nav-icon">&#9632;</span>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </div>
                <div class="admin-nav-section">
                    <div class="admin-nav-label">Kontent</div>
                    <a href="/admin/pages" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/admin/pages') ? 'active' : '' ?>">
                        <span class="nav-icon">&#9783;</span>
                        <span class="nav-text">Səhifələr</span>
                    </a>
                    <a href="/admin/services" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/admin/services') ? 'active' : '' ?>">
                        <span class="nav-icon">&#9881;</span>
                        <span class="nav-text">Xidmətlər</span>
                    </a>
                    <a href="/admin/portfolio" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/admin/portfolio') ? 'active' : '' ?>">
                        <span class="nav-icon">&#9733;</span>
                        <span class="nav-text">Portfolio</span>
                    </a>
                    <a href="/admin/blog" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/admin/blog') ? 'active' : '' ?>">
                        <span class="nav-icon">&#9998;</span>
                        <span class="nav-text">Bloq</span>
                    </a>
                </div>
                <div class="admin-nav-section">
                    <div class="admin-nav-label">Sistem</div>
                    <a href="/admin/contacts" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/admin/contacts') ? 'active' : '' ?>">
                        <span class="nav-icon">&#9993;</span>
                        <span class="nav-text">Müraciətlər</span>
                        <?php
                        $unread = \Core\Database::fetch("SELECT COUNT(*) as cnt FROM contacts WHERE is_read = 0");
                        if ($unread && $unread['cnt'] > 0): ?>
                            <span class="nav-badge"><?= $unread['cnt'] ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="/admin/settings" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/admin/settings') ? 'active' : '' ?>">
                        <span class="nav-icon">&#9881;</span>
                        <span class="nav-text">Ayarlar</span>
                    </a>
                    <a href="/admin/logout">
                        <span class="nav-icon">&#10140;</span>
                        <span class="nav-text">Çıxış</span>
                    </a>
                </div>
            </nav>
        </aside>
        <div class="admin-main">
            <div class="admin-topbar">
                <div class="admin-topbar-title"><?= e($title ?? 'Dashboard') ?></div>
                <div class="admin-topbar-user">
                    <?= e($_SESSION['admin_name'] ?? 'Admin') ?>
                </div>
            </div>
            <div class="admin-content">
                <?php $flash_success = flash('success'); if ($flash_success): ?>
                    <div class="flash-message flash-success"><?= e($flash_success) ?></div>
                <?php endif; ?>
                <?php $flash_error = flash('error'); if ($flash_error): ?>
                    <div class="flash-message flash-error"><?= e($flash_error) ?></div>
                <?php endif; ?>
                <?= $content ?>
            </div>
        </div>
    </div>
    <script>
    // Language tabs
    document.querySelectorAll('.lang-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            const lang = tab.dataset.lang;
            const group = tab.closest('.lang-tabs-group') || tab.closest('.admin-card') || document;
            group.querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));
            group.querySelectorAll('.lang-content').forEach(c => c.classList.remove('active'));
            tab.classList.add('active');
            const target = group.querySelector('.lang-content[data-lang="' + lang + '"]');
            if (target) target.classList.add('active');
        });
    });

    // Image preview
    document.querySelectorAll('.image-upload input[type="file"]').forEach(input => {
        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (ev) => {
                let preview = input.closest('.image-upload').querySelector('.image-preview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.className = 'image-preview';
                    input.closest('.image-upload').appendChild(preview);
                }
                preview.innerHTML = '<img src="' + ev.target.result + '" alt="Preview">';
            };
            reader.readAsDataURL(file);
        });
    });

    // Delete confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', (e) => {
            if (!confirm('Silmək istədiyinizdən əminsiniz?')) {
                e.preventDefault();
            }
        });
    });
    </script>
</body>
</html>
