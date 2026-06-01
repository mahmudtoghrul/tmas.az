<?php
/** Helper: get value from DB or fallback to translation key */
function hval(array $data, string $key, string $lang = ''): string {
    $fullKey = $lang ? $key . '_' . $lang : $key;
    return e($data[$fullKey] ?? '');
}
?>

<div class="admin-page-header">
    <h1>Ana Səhifə Redaktəsi</h1>
</div>

<form method="POST" action="/admin/homepage" class="admin-form" style="max-width:100%" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- ============ HERO SLIDER ============ -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Hero Slider (3 slayd)</h3>
        </div>

        <?php for ($i = 1; $i <= 3; $i++): ?>
        <div style="background:var(--admin-bg);padding:16px;border-radius:8px;margin-bottom:16px">
            <h4 style="margin-bottom:12px;font-size:0.9rem">Slayd <?= $i ?></h4>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
                <div class="form-group">
                    <label>Desktop şəkli <small style="color:#888">Tövsiyə: 1920×600px</small></label>
                    <?php $slideImg = $data["home_slide{$i}_image"] ?? ''; ?>
                    <?php if ($slideImg): ?>
                        <div style="margin-bottom:8px"><img src="<?= e($slideImg) ?>" style="max-width:300px;max-height:120px;border-radius:6px;object-fit:cover"></div>
                    <?php endif; ?>
                    <input type="file" name="home_slide<?= $i ?>_image" accept="image/*" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mobil şəkli <small style="color:#888">Tövsiyə: 768×900px (ixtiyari)</small></label>
                    <?php $slideMobileImg = $data["home_slide{$i}_image_mobile"] ?? ''; ?>
                    <?php if ($slideMobileImg): ?>
                        <div style="margin-bottom:8px"><img src="<?= e($slideMobileImg) ?>" style="max-width:200px;max-height:120px;border-radius:6px;object-fit:cover"></div>
                    <?php endif; ?>
                    <input type="file" name="home_slide<?= $i ?>_image_mobile" accept="image/*" class="form-control">
                </div>
            </div>
            <div class="lang-tabs">
                <button type="button" class="lang-tab <?= $i === 1 ? 'active' : '' ?>" data-lang="az" onclick="switchLang(this,'slide<?= $i ?>')">AZ</button>
                <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'slide<?= $i ?>')">RU</button>
                <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'slide<?= $i ?>')">EN</button>
            </div>
            <?php foreach (['az','ru','en'] as $idx => $lang): ?>
            <div class="lang-panel-slide<?= $i ?> lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label>Etiket (<?= strtoupper($lang) ?>)</label>
                        <input type="text" name="home_slide<?= $i ?>_label_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_slide{$i}_label", $lang) ?>">
                    </div>
                    <div class="form-group">
                        <label>Başlıq (<?= strtoupper($lang) ?>)</label>
                        <input type="text" name="home_slide<?= $i ?>_title_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_slide{$i}_title", $lang) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mətn (<?= strtoupper($lang) ?>)</label>
                    <textarea name="home_slide<?= $i ?>_text_<?= $lang ?>" class="form-control" rows="2"><?= hval($data, "home_slide{$i}_text", $lang) ?></textarea>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endfor; ?>
    </div>

    <!-- ============ SERVICE TABS ============ -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Xidmət Tabları (5 tab)</h3>
        </div>

        <?php
        $tabNames = ['Performance Marketing', 'Growth Hacking', 'Analitika', 'Strategiya', 'Creative & Branding'];
        for ($i = 1; $i <= 5; $i++):
        ?>
        <details style="background:var(--admin-bg);padding:16px;border-radius:8px;margin-bottom:12px">
            <summary style="cursor:pointer;font-weight:600;font-size:0.9rem">Tab <?= $i ?>: <?= $tabNames[$i-1] ?></summary>
            <div style="margin-top:12px">
                <div class="form-group">
                    <label>Tab şəkli</label>
                    <?php $tabImg = $data["home_tab{$i}_image"] ?? ''; ?>
                    <?php if ($tabImg): ?>
                        <div style="margin-bottom:8px"><img src="<?= e($tabImg) ?>" style="max-width:200px;max-height:100px;border-radius:6px;object-fit:cover"></div>
                    <?php endif; ?>
                    <input type="file" name="home_tab<?= $i ?>_image" accept="image/*" class="form-control">
                </div>
                <div class="lang-tabs">
                    <button type="button" class="lang-tab active" data-lang="az" onclick="switchLang(this,'tab<?= $i ?>')">AZ</button>
                    <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'tab<?= $i ?>')">RU</button>
                    <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'tab<?= $i ?>')">EN</button>
                </div>
                <?php foreach (['az','ru','en'] as $idx => $lang): ?>
                <div class="lang-panel-tab<?= $i ?> lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Tab Adı (<?= strtoupper($lang) ?>)</label>
                            <input type="text" name="home_tab<?= $i ?>_name_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_tab{$i}_name", $lang) ?>">
                        </div>
                        <div class="form-group">
                            <label>Başlıq (<?= strtoupper($lang) ?>)</label>
                            <input type="text" name="home_tab<?= $i ?>_title_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_tab{$i}_title", $lang) ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Təsvir (<?= strtoupper($lang) ?>)</label>
                        <textarea name="home_tab<?= $i ?>_desc_<?= $lang ?>" class="form-control" rows="2"><?= hval($data, "home_tab{$i}_desc", $lang) ?></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Maddə 1</label>
                            <input type="text" name="home_tab<?= $i ?>_item1_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_tab{$i}_item1", $lang) ?>">
                        </div>
                        <div class="form-group">
                            <label>Maddə 2</label>
                            <input type="text" name="home_tab<?= $i ?>_item2_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_tab{$i}_item2", $lang) ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Maddə 3</label>
                            <input type="text" name="home_tab<?= $i ?>_item3_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_tab{$i}_item3", $lang) ?>">
                        </div>
                        <div class="form-group">
                            <label>Maddə 4</label>
                            <input type="text" name="home_tab<?= $i ?>_item4_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_tab{$i}_item4", $lang) ?>">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </details>
        <?php endfor; ?>
    </div>

    <!-- ============ PROCESS STEPS ============ -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Proses Addımları</h3>
        </div>

        <div class="lang-tabs">
            <button type="button" class="lang-tab active" data-lang="az" onclick="switchLang(this,'process')">AZ</button>
            <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'process')">RU</button>
            <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'process')">EN</button>
        </div>

        <?php foreach (['az','ru','en'] as $idx => $lang): ?>
        <div class="lang-panel-process lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
            <div class="form-row">
                <div class="form-group">
                    <label>Bölmə Etiketi (<?= strtoupper($lang) ?>)</label>
                    <input type="text" name="home_process_label_<?= $lang ?>" class="form-control" value="<?= hval($data, 'home_process_label', $lang) ?>">
                </div>
                <div class="form-group">
                    <label>Bölmə Başlığı (<?= strtoupper($lang) ?>)</label>
                    <input type="text" name="home_process_title_<?= $lang ?>" class="form-control" value="<?= hval($data, 'home_process_title', $lang) ?>">
                </div>
            </div>
            <?php for ($i = 1; $i <= 4; $i++): ?>
            <div class="form-row">
                <div class="form-group">
                    <label>Addım <?= $i ?> Başlıq</label>
                    <input type="text" name="home_process_step<?= $i ?>_title_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_process_step{$i}_title", $lang) ?>">
                </div>
                <div class="form-group">
                    <label>Addım <?= $i ?> Mətn</label>
                    <input type="text" name="home_process_step<?= $i ?>_text_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_process_step{$i}_text", $lang) ?>">
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- ============ CASES ============ -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Keyslar / Portfolio (3 kart)</h3>
        </div>

        <?php for ($i = 1; $i <= 3; $i++): ?>
        <details style="background:var(--admin-bg);padding:16px;border-radius:8px;margin-bottom:12px">
            <summary style="cursor:pointer;font-weight:600;font-size:0.9rem">Keys <?= $i ?></summary>
            <div style="margin-top:12px">
                <div class="form-group">
                    <label>Keys şəkli</label>
                    <?php $caseImg = $data["home_case{$i}_image"] ?? ''; ?>
                    <?php if ($caseImg): ?>
                        <div style="margin-bottom:8px"><img src="<?= e($caseImg) ?>" style="max-width:200px;max-height:100px;border-radius:6px;object-fit:cover"></div>
                    <?php endif; ?>
                    <input type="file" name="home_case<?= $i ?>_image" accept="image/*" class="form-control">
                </div>
                <div class="lang-tabs">
                    <button type="button" class="lang-tab active" data-lang="az" onclick="switchLang(this,'case<?= $i ?>')">AZ</button>
                    <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'case<?= $i ?>')">RU</button>
                    <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'case<?= $i ?>')">EN</button>
                </div>
                <?php foreach (['az','ru','en'] as $idx => $lang): ?>
                <div class="lang-panel-case<?= $i ?> lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Kateqoriya (<?= strtoupper($lang) ?>)</label>
                            <input type="text" name="home_case<?= $i ?>_category_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_case{$i}_category", $lang) ?>">
                        </div>
                        <div class="form-group">
                            <label>Başlıq (<?= strtoupper($lang) ?>)</label>
                            <input type="text" name="home_case<?= $i ?>_title_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_case{$i}_title", $lang) ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Təsvir (<?= strtoupper($lang) ?>)</label>
                        <textarea name="home_case<?= $i ?>_text_<?= $lang ?>" class="form-control" rows="2"><?= hval($data, "home_case{$i}_text", $lang) ?></textarea>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="form-row" style="margin-top:8px">
                    <div class="form-group">
                        <label>Stat 1 Dəyər (məs. +240%)</label>
                        <input type="text" name="home_case<?= $i ?>_stat1_value" class="form-control" value="<?= hval($data, "home_case{$i}_stat1_value") ?>">
                    </div>
                    <div class="form-group">
                        <label>Stat 1 Etiket (məs. ROI)</label>
                        <input type="text" name="home_case<?= $i ?>_stat1_label" class="form-control" value="<?= hval($data, "home_case{$i}_stat1_label") ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Stat 2 Dəyər</label>
                        <input type="text" name="home_case<?= $i ?>_stat2_value" class="form-control" value="<?= hval($data, "home_case{$i}_stat2_value") ?>">
                    </div>
                    <div class="form-group">
                        <label>Stat 2 Etiket</label>
                        <input type="text" name="home_case<?= $i ?>_stat2_label" class="form-control" value="<?= hval($data, "home_case{$i}_stat2_label") ?>">
                    </div>
                </div>
            </div>
        </details>
        <?php endfor; ?>
    </div>

    <!-- ============ TESTIMONIALS ============ -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Rəylər (3 rəy)</h3>
        </div>

        <?php for ($i = 1; $i <= 3; $i++): ?>
        <div style="background:var(--admin-bg);padding:16px;border-radius:8px;margin-bottom:12px">
            <h4 style="margin-bottom:12px;font-size:0.9rem">Rəy <?= $i ?></h4>
            <div class="form-row">
                <div class="form-group">
                    <label>İnisiallar (məs. RM)</label>
                    <input type="text" name="home_testimonial<?= $i ?>_initials" class="form-control" value="<?= hval($data, "home_testimonial{$i}_initials") ?>" style="max-width:100px">
                </div>
            </div>
            <div class="lang-tabs">
                <button type="button" class="lang-tab active" data-lang="az" onclick="switchLang(this,'test<?= $i ?>')">AZ</button>
                <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'test<?= $i ?>')">RU</button>
                <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'test<?= $i ?>')">EN</button>
            </div>
            <?php foreach (['az','ru','en'] as $idx => $lang): ?>
            <div class="lang-panel-test<?= $i ?> lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
                <div class="form-group">
                    <label>Rəy mətni (<?= strtoupper($lang) ?>)</label>
                    <textarea name="home_testimonial<?= $i ?>_text_<?= $lang ?>" class="form-control" rows="2"><?= hval($data, "home_testimonial{$i}_text", $lang) ?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Ad (<?= strtoupper($lang) ?>)</label>
                        <input type="text" name="home_testimonial<?= $i ?>_name_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_testimonial{$i}_name", $lang) ?>">
                    </div>
                    <div class="form-group">
                        <label>Vəzifə (<?= strtoupper($lang) ?>)</label>
                        <input type="text" name="home_testimonial<?= $i ?>_role_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_testimonial{$i}_role", $lang) ?>">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endfor; ?>
    </div>

    <!-- ============ ABOUT PREVIEW ============ -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>Haqqımızda Blok</h3>
        </div>

        <div class="lang-tabs">
            <button type="button" class="lang-tab active" data-lang="az" onclick="switchLang(this,'about')">AZ</button>
            <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'about')">RU</button>
            <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'about')">EN</button>
        </div>

        <?php foreach (['az','ru','en'] as $idx => $lang): ?>
        <div class="lang-panel-about lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
            <div class="form-group">
                <label>Başlıq (<?= strtoupper($lang) ?>)</label>
                <input type="text" name="home_about_title_<?= $lang ?>" class="form-control" value="<?= hval($data, 'home_about_title', $lang) ?>">
            </div>
            <div class="form-group">
                <label>Mətn (<?= strtoupper($lang) ?>)</label>
                <textarea name="home_about_text_<?= $lang ?>" class="form-control" rows="3"><?= hval($data, 'home_about_text', $lang) ?></textarea>
            </div>
        </div>
        <?php endforeach; ?>

        <h4 style="margin:16px 0 12px;font-size:0.85rem">Statistikalar</h4>
        <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="form-row">
            <div class="form-group">
                <label>Stat <?= $i ?> Dəyər (məs. 50+)</label>
                <input type="text" name="home_stat<?= $i ?>_value" class="form-control" value="<?= hval($data, "home_stat{$i}_value") ?>">
            </div>
            <div class="form-group">
                <label>Stat <?= $i ?> Etiket</label>
                <div class="lang-tabs">
                    <button type="button" class="lang-tab active" data-lang="az" onclick="switchLang(this,'stat<?= $i ?>')">AZ</button>
                    <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'stat<?= $i ?>')">RU</button>
                    <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'stat<?= $i ?>')">EN</button>
                </div>
                <?php foreach (['az','ru','en'] as $idx => $lang): ?>
                <div class="lang-panel-stat<?= $i ?> lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
                    <input type="text" name="home_stat<?= $i ?>_label_<?= $lang ?>" class="form-control" value="<?= hval($data, "home_stat{$i}_label", $lang) ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endfor; ?>
    </div>

    <!-- ============ CTA SECTION ============ -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3>CTA (Call to Action)</h3>
        </div>

        <div class="lang-tabs">
            <button type="button" class="lang-tab active" data-lang="az" onclick="switchLang(this,'cta')">AZ</button>
            <button type="button" class="lang-tab" data-lang="ru" onclick="switchLang(this,'cta')">RU</button>
            <button type="button" class="lang-tab" data-lang="en" onclick="switchLang(this,'cta')">EN</button>
        </div>

        <?php foreach (['az','ru','en'] as $idx => $lang): ?>
        <div class="lang-panel-cta lang-panel-<?= $lang ?>" style="<?= $idx > 0 ? 'display:none' : '' ?>">
            <div class="form-group">
                <label>Başlıq (<?= strtoupper($lang) ?>)</label>
                <input type="text" name="home_cta_title_<?= $lang ?>" class="form-control" value="<?= hval($data, 'home_cta_title', $lang) ?>">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Mətn (<?= strtoupper($lang) ?>)</label>
                    <input type="text" name="home_cta_text_<?= $lang ?>" class="form-control" value="<?= hval($data, 'home_cta_text', $lang) ?>">
                </div>
                <div class="form-group">
                    <label>Düymə Mətni (<?= strtoupper($lang) ?>)</label>
                    <input type="text" name="home_cta_button_<?= $lang ?>" class="form-control" value="<?= hval($data, 'home_cta_button', $lang) ?>">
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Yadda Saxla</button>
    </div>
</form>

<script>
function switchLang(btn, group) {
    const lang = btn.dataset.lang;
    const parent = btn.closest('.admin-card') || btn.closest('details') || btn.closest('[style*="background"]');
    // Deactivate tabs in this group
    btn.closest('.lang-tabs').querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    // Show/hide panels
    parent.querySelectorAll('.lang-panel-' + group.replace(/[0-9]/g, '') + ', .lang-panel-az, .lang-panel-ru, .lang-panel-en').forEach(p => {
        if (p.classList.contains('lang-panel-' + group)) {
            // these are scoped panels
        }
    });
    // Simple approach: find panels by class
    const panels = parent.querySelectorAll('.lang-panel-' + group);
    if (panels.length > 0) {
        panels.forEach(p => p.style.display = 'none');
        parent.querySelectorAll('.lang-panel-' + group + '.lang-panel-' + lang).forEach(p => p.style.display = '');
    }
}
</script>
