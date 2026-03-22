<?php

namespace Admin;

use App\Models\Setting;
use Core\CSRF;
use Core\Database;
use Core\View;

class SettingController
{
    private array $settingKeys = [
        'site_name',
        'site_description_az',
        'site_description_ru',
        'site_description_en',
        'contact_email',
        'contact_phone',
        'contact_address_az',
        'contact_address_ru',
        'contact_address_en',
        'social_facebook',
        'social_instagram',
        'social_linkedin',
        'social_twitter',
        'footer_text_az',
        'footer_text_ru',
        'footer_text_en',
        'google_analytics',
        'meta_keywords_az',
        'meta_keywords_ru',
        'meta_keywords_en',
    ];

    public function index(): void
    {
        $settings = [];
        foreach ($this->settingKeys as $key) {
            $settings[$key] = Setting::get($key);
        }

        View::adminRender('settings/index', [
            'title' => 'Ayarlar',
            'settings' => $settings,
        ]);
    }

    public function store(): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/settings');
        }

        foreach ($this->settingKeys as $key) {
            if (isset($_POST[$key])) {
                Setting::set($key, trim($_POST[$key]));
            }
        }

        flash_set('success', 'Ayarlar uğurla yadda saxlanıldı');
        redirect('/admin/settings');
    }

    // These are needed because Router::resource registers them
    public function create(): void { redirect('/admin/settings'); }
    public function edit(string $id): void { redirect('/admin/settings'); }
    public function update(string $id): void { $this->store(); }
    public function destroy(string $id): void { redirect('/admin/settings'); }
}
