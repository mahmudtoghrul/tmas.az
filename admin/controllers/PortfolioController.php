<?php

namespace Admin;

use App\Models\Portfolio;
use Core\CSRF;
use Core\View;

class PortfolioController
{
    public function index(): void
    {
        $items = Portfolio::all('id DESC');

        View::adminRender('portfolio/index', [
            'title' => 'Portfolio',
            'items' => $items,
        ]);
    }

    public function create(): void
    {
        View::adminRender('portfolio/form', [
            'title' => 'Yeni Portfolio',
            'item' => null,
        ]);
    }

    public function store(): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/portfolio');
        }

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'category_az' => trim($_POST['category_az'] ?? ''),
            'category_ru' => trim($_POST['category_ru'] ?? ''),
            'category_en' => trim($_POST['category_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'client' => trim($_POST['client'] ?? ''),
            'url' => trim($_POST['url'] ?? ''),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];

        if (!empty($_FILES['image']['name'])) {
            $path = upload_file($_FILES['image'], 'uploads/portfolio');
            if ($path) $data['image'] = $path;
        }

        Portfolio::create($data);
        flash_set('success', 'Portfolio uğurla yaradıldı');
        redirect('/admin/portfolio');
    }

    public function edit(string $id): void
    {
        $item = Portfolio::find((int)$id);
        if (!$item) {
            flash_set('error', 'Portfolio tapılmadı');
            redirect('/admin/portfolio');
        }

        View::adminRender('portfolio/form', [
            'title' => 'Portfolio Redaktə Et',
            'item' => $item,
        ]);
    }

    public function update(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/portfolio');
        }

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'category_az' => trim($_POST['category_az'] ?? ''),
            'category_ru' => trim($_POST['category_ru'] ?? ''),
            'category_en' => trim($_POST['category_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'client' => trim($_POST['client'] ?? ''),
            'url' => trim($_POST['url'] ?? ''),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];

        if (!empty($_FILES['image']['name'])) {
            $path = upload_file($_FILES['image'], 'uploads/portfolio');
            if ($path) $data['image'] = $path;
        }

        Portfolio::update((int)$id, $data);
        flash_set('success', 'Portfolio uğurla yeniləndi');
        redirect('/admin/portfolio');
    }

    public function destroy(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/portfolio');
        }

        Portfolio::delete((int)$id);
        flash_set('success', 'Portfolio silindi');
        redirect('/admin/portfolio');
    }
}
