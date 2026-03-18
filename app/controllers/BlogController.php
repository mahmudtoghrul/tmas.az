<?php

namespace App\Controllers;

use Core\View;
use App\Models\Post;

class BlogController
{
    public function index(): void
    {
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $result = Post::published($page);

        View::render('pages/blog', [
            'title' => __('blog_title'),
            'posts' => $result['items'],
            'pagination' => $result,
        ]);
    }

    public function show(string $slug): void
    {
        $lang = lang();
        $post = Post::findBy("slug_$lang", $slug);

        if (!$post || $post['status'] !== 'published') {
            http_response_code(404);
            View::render('errors/404');
            return;
        }

        View::render('pages/blog-detail', [
            'title' => $post["title_$lang"],
            'post' => $post,
        ]);
    }
}
