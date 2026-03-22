<?php

namespace App\Controllers;

use Core\View;
use Core\CSRF;
use App\Models\Service;
use App\Models\Setting;

class PageController
{
    public function home(): void
    {
        try {
            $services = Service::active();
        } catch (\Throwable $e) {
            $services = [];
        }

        // Load homepage settings from DB with fallback to translation keys
        $lang = lang();
        $h = function(string $settingKey, string $translationKey) use ($lang) {
            $val = Setting::get($settingKey . '_' . $lang);
            return $val ?: __($translationKey);
        };

        // Also load language-independent values
        $hv = function(string $settingKey, string $default = '') {
            $val = Setting::get($settingKey);
            return $val ?: $default;
        };

        View::render('pages/home', [
            'title' => __('home_title'),
            'services' => $services,
            'h' => $h,
            'hv' => $hv,
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
