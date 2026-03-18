<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — TMAS</title>
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
    <style>
        .admin-layout { display: flex; min-height: 100vh; padding-top: 0; }
        .admin-sidebar { width: 240px; background: var(--primary-dark); color: var(--white); padding: 20px; }
        .admin-sidebar h2 { font-size: 1.1rem; color: var(--accent); margin-bottom: 24px; }
        .admin-sidebar a { display: block; padding: 10px 12px; color: var(--gray-300); border-radius: 4px; font-size: 0.9rem; margin-bottom: 4px; }
        .admin-sidebar a:hover { background: rgba(255,255,255,0.1); color: var(--white); }
        .admin-main { flex: 1; padding: 30px; background: var(--gray-50); }
        .admin-main h1 { font-size: 1.5rem; margin-bottom: 24px; }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <h2>TMAS Admin</h2>
            <nav>
                <a href="/admin">Dashboard</a>
                <a href="/admin/pages">Səhifələr</a>
                <a href="/admin/services">Xidmətlər</a>
                <a href="/admin/portfolio">Portfolio</a>
                <a href="/admin/blog">Bloq</a>
                <a href="/admin/settings">Ayarlar</a>
                <a href="/admin/logout">Çıxış</a>
            </nav>
        </aside>
        <main class="admin-main">
            <?= $content ?>
        </main>
    </div>
</body>
</html>
