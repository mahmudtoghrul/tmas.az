<div class="admin-stats">
    <div class="stat-card">
        <div class="stat-icon blue">&#9783;</div>
        <div class="stat-info">
            <h4>Səhifələr</h4>
            <div class="stat-number"><?= $stats['pages'] ?></div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon teal">&#9881;</div>
        <div class="stat-info">
            <h4>Xidmətlər</h4>
            <div class="stat-number"><?= $stats['services'] ?></div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">&#9733;</div>
        <div class="stat-info">
            <h4>Portfolio</h4>
            <div class="stat-number"><?= $stats['portfolio'] ?></div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon orange">&#9998;</div>
        <div class="stat-info">
            <h4>Bloq Yazıları</h4>
            <div class="stat-number"><?= $stats['posts'] ?></div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon red">&#9993;</div>
        <div class="stat-info">
            <h4>Müraciətlər</h4>
            <div class="stat-number"><?= $stats['contacts'] ?> <small style="font-size:0.7rem;color:var(--admin-text-light)">(<?= $stats['unread'] ?> yeni)</small></div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">
    <!-- Recent Contacts -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Son Müraciətlər</h3>
            <a href="/admin/contacts" class="btn btn-sm btn-secondary">Hamısı</a>
        </div>
        <?php if (empty($recentContacts)): ?>
            <p style="color:var(--admin-text-light);font-size:0.875rem">Hələ müraciət yoxdur.</p>
        <?php else: ?>
            <table class="recent-table" style="width:100%">
                <?php foreach ($recentContacts as $c): ?>
                <tr>
                    <td>
                        <strong><?= e($c['name']) ?></strong><br>
                        <small style="color:var(--admin-text-light)"><?= e($c['email']) ?></small>
                    </td>
                    <td style="text-align:right">
                        <small style="color:var(--admin-text-light)"><?= date('d.m.Y', strtotime($c['created_at'])) ?></small>
                        <?php if (!$c['is_read']): ?>
                            <span class="badge badge-warning">Yeni</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <!-- Recent Posts -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Son Bloq Yazıları</h3>
            <a href="/admin/blog" class="btn btn-sm btn-secondary">Hamısı</a>
        </div>
        <?php if (empty($recentPosts)): ?>
            <p style="color:var(--admin-text-light);font-size:0.875rem">Hələ yazı yoxdur.</p>
        <?php else: ?>
            <table class="recent-table" style="width:100%">
                <?php foreach ($recentPosts as $p): ?>
                <tr>
                    <td>
                        <strong><?= e($p['title_az']) ?></strong>
                    </td>
                    <td style="text-align:right">
                        <?php if ($p['status'] === 'published'): ?>
                            <span class="badge badge-success">Yayımda</span>
                        <?php else: ?>
                            <span class="badge badge-warning">Qaralama</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
