<div class="admin-page-header">
    <h1>Bloq Yazıları</h1>
    <a href="/admin/blog/create" class="btn btn-primary">+ Yeni Yazı</a>
</div>

<div class="admin-card">
    <?php if (empty($posts)): ?>
        <div class="empty-state">
            <div class="empty-icon">&#9998;</div>
            <p>Hələ heç bir yazı yaradılmayıb.</p>
            <a href="/admin/blog/create" class="btn btn-primary">İlk Yazını Yarat</a>
        </div>
    <?php else: ?>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Şəkil</th>
                        <th>Başlıq (AZ)</th>
                        <th>Status</th>
                        <th>Tarix</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td>
                            <?php if ($post['image']): ?>
                                <img src="<?= e($post['image']) ?>" class="table-thumb" alt="">
                            <?php else: ?>
                                <div class="table-thumb" style="background:var(--admin-bg);display:flex;align-items:center;justify-content:center;color:var(--admin-text-light);font-size:0.7rem">—</div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong><?= e($post['title_az']) ?></strong>
                            <?php if ($post['excerpt_az']): ?>
                                <br><small style="color:var(--admin-text-light)"><?= e(str_limit($post['excerpt_az'], 60)) ?></small>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($post['status'] === 'published'): ?>
                                <span class="badge badge-success">Yayımda</span>
                            <?php else: ?>
                                <span class="badge badge-warning">Qaralama</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= date('d.m.Y', strtotime($post['created_at'])) ?>
                            <?php if ($post['published_at']): ?>
                                <br><small style="color:var(--admin-text-light)">Yayım: <?= date('d.m.Y', strtotime($post['published_at'])) ?></small>
                            <?php endif; ?>
                        </td>
                        <td class="table-actions">
                            <a href="/admin/blog/<?= $post['id'] ?>/edit" class="btn btn-sm btn-secondary">Redaktə</a>
                            <form method="POST" action="/admin/blog/<?= $post['id'] ?>" class="delete-form">
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

        <?php if ($pagination['total_pages'] > 1): ?>
            <div class="admin-pagination">
                <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <?php if ($i === $pagination['page']): ?>
                        <span class="current"><?= $i ?></span>
                    <?php else: ?>
                        <a href="/admin/blog?page=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
