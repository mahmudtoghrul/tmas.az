<div class="admin-page-header">
    <h1>Xidmətlər</h1>
    <a href="/admin/services/create" class="btn btn-primary">+ Yeni Xidmət</a>
</div>

<div class="admin-card">
    <?php if (empty($services)): ?>
        <div class="empty-state">
            <div class="empty-icon">&#9881;</div>
            <p>Hələ heç bir xidmət yaradılmayıb.</p>
            <a href="/admin/services/create" class="btn btn-primary">İlk Xidməti Yarat</a>
        </div>
    <?php else: ?>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Şəkil</th>
                        <th>Başlıq (AZ)</th>
                        <th>İkon</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= $service['sort_order'] ?></td>
                        <td>
                            <?php if ($service['image']): ?>
                                <img src="<?= e($service['image']) ?>" class="table-thumb" alt="">
                            <?php else: ?>
                                <div class="table-thumb" style="background:var(--admin-bg);display:flex;align-items:center;justify-content:center;color:var(--admin-text-light);font-size:0.7rem">—</div>
                            <?php endif; ?>
                        </td>
                        <td><strong><?= e($service['title_az']) ?></strong></td>
                        <td><code><?= e($service['icon'] ?: '—') ?></code></td>
                        <td>
                            <?php if ($service['is_active']): ?>
                                <span class="badge badge-success">Aktiv</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Deaktiv</span>
                            <?php endif; ?>
                        </td>
                        <td class="table-actions">
                            <a href="/admin/services/<?= $service['id'] ?>/edit" class="btn btn-sm btn-secondary">Redaktə</a>
                            <form method="POST" action="/admin/services/<?= $service['id'] ?>" class="delete-form">
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
