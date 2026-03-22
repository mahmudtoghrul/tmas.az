<div class="admin-page-header">
    <h1>Müraciət #<?= $contact['id'] ?></h1>
    <a href="/admin/contacts" class="btn btn-secondary">&#8592; Geri</a>
</div>

<div class="admin-card" style="max-width:700px">
    <div style="display:grid;grid-template-columns:120px 1fr;gap:12px 16px;font-size:0.9rem">
        <div style="font-weight:600;color:var(--admin-text-light)">Ad:</div>
        <div><?= e($contact['name']) ?></div>

        <div style="font-weight:600;color:var(--admin-text-light)">E-poçt:</div>
        <div><a href="mailto:<?= e($contact['email']) ?>"><?= e($contact['email']) ?></a></div>

        <div style="font-weight:600;color:var(--admin-text-light)">Telefon:</div>
        <div><?= e($contact['phone'] ?: '—') ?></div>

        <div style="font-weight:600;color:var(--admin-text-light)">Tarix:</div>
        <div><?= date('d.m.Y H:i:s', strtotime($contact['created_at'])) ?></div>

        <div style="font-weight:600;color:var(--admin-text-light)">Status:</div>
        <div>
            <?php if ($contact['is_read']): ?>
                <span class="badge badge-info">Oxunub</span>
            <?php else: ?>
                <span class="badge badge-warning">Yeni</span>
            <?php endif; ?>
        </div>

        <div style="font-weight:600;color:var(--admin-text-light)">Mesaj:</div>
        <div style="white-space:pre-wrap;line-height:1.6;background:var(--admin-bg);padding:12px;border-radius:6px"><?= e($contact['message']) ?></div>
    </div>

    <div style="margin-top:24px;display:flex;gap:10px">
        <a href="mailto:<?= e($contact['email']) ?>?subject=Re: TMAS Müraciət" class="btn btn-primary">Cavab Yaz</a>
        <form method="POST" action="/admin/contacts/<?= $contact['id'] ?>" class="delete-form">
            <?= csrf_field() ?>
            <?= method_field('DELETE') ?>
            <button type="submit" class="btn btn-danger">Sil</button>
        </form>
    </div>
</div>
