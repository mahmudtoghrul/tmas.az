<?php

namespace Admin;

use Core\View;

class DashboardController
{
    public function index(): void
    {
        View::adminRender('dashboard', [
            'title' => 'Dashboard',
        ]);
    }
}
