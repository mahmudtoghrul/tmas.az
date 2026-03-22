<div class="admin-page-header">
    <h1>Portfolio</h1>
    <a href="/admin/portfolio/create" class="btn btn-primary">+ Yeni Portfolio</a>
</div>

<div class="admin-card">
    <?php if (empty($items)): ?>
        <div class="empty-state">
            <div class="empty-icon">&#9733;</div>
            <p>Hələ heç bir portfolio əlavə edilməyib.</p>
            <a href="/admin/portfolio/create" class="btn btn-primary">İlk Portfolio Yarat</a>
        </div>
    <?php else: ?>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Şəkil</th>
                        <th>Başlıq (AZ)</th>
                        <th>Kateqoriya</th>
                        <th>Müştəri</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td>
                            <?php if ($item['image']): ?>
                                <img src="<?= e($item['image']) ?>" class="table-thumb" alt="">
                            <?php else: ?>
                                <div class="table-thumb" style="background:var(--admin-bg);display:flex;align-items:center;justify-content:center;color:var(--admin-text-light);font-size:0.7rem">—</div>
                            <?php endif; ?>
                        </td>
                        <td><strong><?= e($item['title_az']) ?></strong></td>
                        <td><?= e($item['category_az'] ?: '—') ?></td>
                        <td><?= e($item['client'] ?: '—') ?></td>
                        <td>
                            <?php if ($item['is_active']): ?>
                                <span class="badge badge-success">Aktiv</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Deaktiv</span>
                            <?php endif; ?>
                        </td>
                        <td class="table-actions">
                            <a href="/admin/portfolio/<?= $item['id'] ?>/edit" class="btn btn-sm btn-secondary">Redaktə</a>
                            <form method="POST" action="/admin/portfolio/<?= $item['id'] ?>" class="delete-form">
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
