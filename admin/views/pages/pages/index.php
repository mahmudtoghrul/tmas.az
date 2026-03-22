<div class="admin-page-header">
    <h1>Səhifələr</h1>
    <a href="/admin/pages/create" class="btn btn-primary">+ Yeni Səhifə</a>
</div>

<div class="admin-card">
    <?php if (empty($pages)): ?>
        <div class="empty-state">
            <div class="empty-icon">&#9783;</div>
            <p>Hələ heç bir səhifə yaradılmayıb.</p>
            <a href="/admin/pages/create" class="btn btn-primary">İlk Səhifəni Yarat</a>
        </div>
    <?php else: ?>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlıq (AZ)</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Tarix</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?= $page['id'] ?></td>
                        <td><strong><?= e($page['title_az']) ?></strong></td>
                        <td><code><?= e($page['slug_az']) ?></code></td>
                        <td>
                            <?php if ($page['is_active']): ?>
                                <span class="badge badge-success">Aktiv</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Deaktiv</span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d.m.Y', strtotime($page['created_at'])) ?></td>
                        <td class="table-actions">
                            <a href="/admin/pages/<?= $page['id'] ?>/edit" class="btn btn-sm btn-secondary">Redaktə</a>
                            <form method="POST" action="/admin/pages/<?= $page['id'] ?>" class="delete-form">
                                <?= csrf_field() ?>
                                <?= method_field('DELETE') ?>
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
