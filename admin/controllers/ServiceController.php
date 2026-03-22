<?php

namespace Admin;

use App\Models\Service;
use Core\CSRF;
use Core\View;

class ServiceController
{
    public function index(): void
    {
        $services = Service::all('sort_order ASC, id DESC');

        View::adminRender('services/index', [
            'title' => 'Xidmətlər',
            'services' => $services,
        ]);
    }

    public function create(): void
    {
        View::adminRender('services/form', [
            'title' => 'Yeni Xidmət',
            'service' => null,
        ]);
    }

    public function store(): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/services');
        }

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'description_az' => trim($_POST['description_az'] ?? ''),
            'description_ru' => trim($_POST['description_ru'] ?? ''),
            'description_en' => trim($_POST['description_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'icon' => trim($_POST['icon'] ?? ''),
            'sort_order' => (int)($_POST['sort_order'] ?? 0),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];

        if (!empty($_FILES['image']['name'])) {
            $path = upload_file($_FILES['image'], 'uploads/services');
            if ($path) $data['image'] = $path;
        }

        Service::create($data);
        flash_set('success', 'Xidmət uğurla yaradıldı');
        redirect('/admin/services');
    }

    public function edit(string $id): void
    {
        $service = Service::find((int)$id);
        if (!$service) {
            flash_set('error', 'Xidmət tapılmadı');
            redirect('/admin/services');
        }

        View::adminRender('services/form', [
            'title' => 'Xidməti Redaktə Et',
            'service' => $service,
        ]);
    }

    public function update(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/services');
        }

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'description_az' => trim($_POST['description_az'] ?? ''),
            'description_ru' => trim($_POST['description_ru'] ?? ''),
            'description_en' => trim($_POST['description_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'icon' => trim($_POST['icon'] ?? ''),
            'sort_order' => (int)($_POST['sort_order'] ?? 0),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];

        if (!empty($_FILES['image']['name'])) {
            $path = upload_file($_FILES['image'], 'uploads/services');
            if ($path) $data['image'] = $path;
        }

        Service::update((int)$id, $data);
        flash_set('success', 'Xidmət uğurla yeniləndi');
        redirect('/admin/services');
    }

    public function destroy(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/services');
        }

        Service::delete((int)$id);
        flash_set('success', 'Xidmət silindi');
        redirect('/admin/services');
    }
}
