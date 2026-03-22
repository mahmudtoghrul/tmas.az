<?php

namespace Admin;

use App\Models\Post;
use Core\CSRF;
use Core\View;

class BlogController
{
    public function index(): void
    {
        $page = max(1, (int)($_GET['page'] ?? 1));
        $result = Post::paginate($page, 15);

        View::adminRender('blog/index', [
            'title' => 'Bloq Yazıları',
            'posts' => $result['items'],
            'pagination' => $result,
        ]);
    }

    public function create(): void
    {
        View::adminRender('blog/form', [
            'title' => 'Yeni Yazı',
            'post' => null,
        ]);
    }

    public function store(): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/blog');
        }

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'excerpt_az' => trim($_POST['excerpt_az'] ?? ''),
            'excerpt_ru' => trim($_POST['excerpt_ru'] ?? ''),
            'excerpt_en' => trim($_POST['excerpt_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'status' => $_POST['status'] ?? 'draft',
        ];

        if ($data['status'] === 'published') {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        if (!empty($_FILES['image']['name'])) {
            $path = upload_file($_FILES['image'], 'uploads/blog');
            if ($path) $data['image'] = $path;
        }

        Post::create($data);
        flash_set('success', 'Yazı uğurla yaradıldı');
        redirect('/admin/blog');
    }

    public function edit(string $id): void
    {
        $post = Post::find((int)$id);
        if (!$post) {
            flash_set('error', 'Yazı tapılmadı');
            redirect('/admin/blog');
        }

        View::adminRender('blog/form', [
            'title' => 'Yazını Redaktə Et',
            'post' => $post,
        ]);
    }

    public function update(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/blog');
        }

        $existing = Post::find((int)$id);

        $data = [
            'slug_az' => slugify($_POST['slug_az'] ?: $_POST['title_az']),
            'slug_ru' => slugify($_POST['slug_ru'] ?: $_POST['title_ru']),
            'slug_en' => slugify($_POST['slug_en'] ?: $_POST['title_en']),
            'title_az' => trim($_POST['title_az'] ?? ''),
            'title_ru' => trim($_POST['title_ru'] ?? ''),
            'title_en' => trim($_POST['title_en'] ?? ''),
            'excerpt_az' => trim($_POST['excerpt_az'] ?? ''),
            'excerpt_ru' => trim($_POST['excerpt_ru'] ?? ''),
            'excerpt_en' => trim($_POST['excerpt_en'] ?? ''),
            'content_az' => trim($_POST['content_az'] ?? ''),
            'content_ru' => trim($_POST['content_ru'] ?? ''),
            'content_en' => trim($_POST['content_en'] ?? ''),
            'status' => $_POST['status'] ?? 'draft',
        ];

        // Set published_at when first published
        if ($data['status'] === 'published' && $existing && $existing['status'] !== 'published') {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        if (!empty($_FILES['image']['name'])) {
            $path = upload_file($_FILES['image'], 'uploads/blog');
            if ($path) $data['image'] = $path;
        }

        Post::update((int)$id, $data);
        flash_set('success', 'Yazı uğurla yeniləndi');
        redirect('/admin/blog');
    }

    public function destroy(string $id): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/blog');
        }

        Post::delete((int)$id);
        flash_set('success', 'Yazı silindi');
        redirect('/admin/blog');
    }
}
