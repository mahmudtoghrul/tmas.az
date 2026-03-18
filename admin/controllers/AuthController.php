<?php

namespace Admin;

use Core\Database;
use Core\View;

class AuthController
{
    public function loginForm(): void
    {
        View::render('pages/admin-login', [], '');
    }

    public function login(): void
    {
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            redirect('/admin/login');
        }

        $admin = Database::fetch("SELECT * FROM admins WHERE email = ?", [$email]);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            redirect('/admin');
        }

        $_SESSION['flash'] = ['error' => 'Yanlış e-poçt və ya şifrə'];
        redirect('/admin/login');
    }

    public function logout(): void
    {
        unset($_SESSION['admin_id'], $_SESSION['admin_name']);
        redirect('/admin/login');
    }
}
