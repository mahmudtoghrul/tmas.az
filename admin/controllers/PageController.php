<?php

namespace Admin;

use App\Models\Page;
use Core\CSRF;
use Core\View;

class PageController
{
    public function index(): void
    {
        $pages = Page::all('id DESC');

        View::adminRender('pages/index', [
            'title' => 'Səhifələr',
            'pages' => $pages,
        ]);
    }

    public function create(): void
    {
        View::adminRender('pages/form', [
            'title' => 'Yeni Səhifə',
            'page' => null,
        ]);
    }

    public function store(): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/pages');
        }

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'meta_description_az' => trim($_POST['meta_description_az'] ?? ''),
            'meta_description_ru' => trim($_POST['meta_description_ru'] ?? ''),
            'meta_description_en' => trim($_POST['meta_description_en'] ?? ''),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];

        Page::create($data);
        flash_set('success', 'Səhifə uğurla yaradıldı');
        redirect('/admin/pages');
    }

    public function edit(string $id): void
    {
        $page = Page::find((int)$id);
        if (!$page) {
            flash_set('error', 'Səhifə tapılmadı');
            redirect('/admin/pages');
        }

        View::adminRender('pages/form', [
            'title' => 'Səhifəni Redaktə Et',
            'page' => $page,
        ]);
    }

    public function update(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/pages');
        }

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'meta_description_az' => trim($_POST['meta_description_az'] ?? ''),
            'meta_description_ru' => trim($_POST['meta_description_ru'] ?? ''),
            'meta_description_en' => trim($_POST['meta_description_en'] ?? ''),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];

        Page::update((int)$id, $data);
        flash_set('success', 'Səhifə uğurla yeniləndi');
        redirect('/admin/pages');
    }

    public function destroy(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/pages');
        }

        Page::delete((int)$id);
        flash_set('success', 'Səhifə silindi');
        redirect('/admin/pages');
    }
}
