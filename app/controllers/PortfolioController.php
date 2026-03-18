<?php

namespace App\Controllers;

use Core\View;
use App\Models\Portfolio;

class PortfolioController
{
    public function index(): void
    {
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $result = Portfolio::paginate($page, 12, 'is_active = ?', [1]);

        View::render('pages/portfolio', [
            'title' => __('portfolio_title'),
            'items' => $result['items'],
            'pagination' => $result,
        ]);
    }

    public function show(string $slug): void
    {
        $lang = lang();
        $item = Portfolio::findBy("slug_$lang", $slug);

        if (!$item) {
            http_response_code(404);
            View::render('errors/404');
            return;
        }

        View::render('pages/portfolio-detail', [
            'title' => $item["title_$lang"],
            'item' => $item,
        ]);
    }
}
