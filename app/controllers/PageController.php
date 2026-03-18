<?php

namespace App\Controllers;

use Core\View;
use Core\CSRF;
use App\Models\Service;

class PageController
{
    public function home(): void
    {
        $services = Service::active();
        View::render('pages/home', [
            'title' => __('home_title'),
            'services' => $services,
        ]);
    }

    public function about(): void
    {
        View::render('pages/about', [
            'title' => __('about_title'),
        ]);
    }

    public function contact(): void
    {
        View::render('pages/contact', [
            'title' => __('contact_title'),
        ]);
    }

    public function contactSubmit(): void
    {
        if (!CSRF::verify()) {
            redirect(url('/contact'));
        }

        $name = trim($_POST['name'] ?? '');
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $phone = trim($_POST['phone'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if (!$name || !$email || !$message) {
            $_SESSION['flash'] = ['error' => __('contact_error')];
            redirect(url('/contact'));
        }

        // Store in DB or send email
        $_SESSION['flash'] = ['success' => __('contact_success')];
        redirect(url('/contact'));
    }
}
