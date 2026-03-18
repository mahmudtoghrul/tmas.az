<?php

namespace App\Controllers;

use Core\View;
use App\Models\Service;

class ServiceController
{
    public function index(): void
    {
        $services = Service::active();
        View::render('pages/services', [
            'title' => __('services_title'),
            'services' => $services,
        ]);
    }

    public function show(string $slug): void
    {
        $lang = lang();
        $service = Service::findBy("slug_$lang", $slug);

        if (!$service) {
            http_response_code(404);
            View::render('errors/404');
            return;
        }

        View::render('pages/service-detail', [
            'title' => $service["title_$lang"],
            'service' => $service,
        ]);
    }
}
