<div class="admin-page-header">
    <h1>Müraciətlər <small style="font-size:0.85rem;color:var(--admin-text-light)">(<?= $pagination['total'] ?> ümumi)</small></h1>
</div>

<div class="admin-card">
    <?php if (empty($contacts)): ?>
        <div class="empty-state">
            <div class="empty-icon">&#9993;</div>
            <p>Hələ heç bir müraciət yoxdur.</p>
        </div>
    <?php else: ?>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>E-poçt</th>
                        <th>Telefon</th>
                        <th>Mesaj</th>
                        <th>Tarix</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                    <tr style="<?= !$contact['is_read'] ? 'font-weight:600;background:#FAFFFE' : '' ?>">
                        <td><?= $contact['id'] ?></td>
                        <td><?= e($contact['name']) ?></td>
                        <td><a href="mailto:<?= e($contact['email']) ?>"><?= e($contact['email']) ?></a></td>
                        <td><?= e($contact['phone'] ?: '—') ?></td>
                        <td><?= e(str_limit($contact['message'], 50)) ?></td>
                        <td><?= date('d.m.Y H:i', strtotime($contact['created_at'])) ?></td>
                        <td>
                            <?php if ($contact['is_read']): ?>
                                <span class="badge badge-info">Oxunub</span>
                            <?php else: ?>
                                <span class="badge badge-warning">Yeni</span>
                            <?php endif; ?>
                        </td>
                        <td class="table-actions">
                            <a href="/admin/contacts/<?= $contact['id'] ?>" class="btn btn-sm btn-secondary">Bax</a>
                            <form method="POST" action="/admin/contacts/<?= $contact['id'] ?>" class="delete-form">
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
                        <a href="/admin/contacts?page=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
