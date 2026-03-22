<?php

namespace Admin;

use Core\Database;
use Core\View;

class DashboardController
{
    public function index(): void
    {
        $stats = [
            'pages' => Database::fetch("SELECT COUNT(*) as cnt FROM pages")['cnt'] ?? 0,
            'services' => Database::fetch("SELECT COUNT(*) as cnt FROM services")['cnt'] ?? 0,
            'portfolio' => Database::fetch("SELECT COUNT(*) as cnt FROM portfolio")['cnt'] ?? 0,
            'posts' => Database::fetch("SELECT COUNT(*) as cnt FROM posts")['cnt'] ?? 0,
            'contacts' => Database::fetch("SELECT COUNT(*) as cnt FROM contacts")['cnt'] ?? 0,
            'unread' => Database::fetch("SELECT COUNT(*) as cnt FROM contacts WHERE is_read = 0")['cnt'] ?? 0,
        ];

        $recentContacts = Database::fetchAll(
            "SELECT * FROM contacts ORDER BY created_at DESC LIMIT 5"
        );

        $recentPosts = Database::fetchAll(
            "SELECT * FROM posts ORDER BY created_at DESC LIMIT 5"
        );

        View::adminRender('dashboard', [
            'title' => 'Dashboard',
            'stats' => $stats,
            'recentContacts' => $recentContacts,
            'recentPosts' => $recentPosts,
        ]);
    }
}
