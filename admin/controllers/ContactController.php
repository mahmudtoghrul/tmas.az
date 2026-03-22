<?php

namespace Admin;

use Core\Database;
use Core\View;

class ContactController
{
    public function index(): void
    {
        $page = max(1, (int)($_GET['page'] ?? 1));
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        $total = (int)Database::fetch("SELECT COUNT(*) as cnt FROM contacts")['cnt'];
        $contacts = Database::fetchAll(
            "SELECT * FROM contacts ORDER BY created_at DESC LIMIT $perPage OFFSET $offset"
        );

        View::adminRender('contacts/index', [
            'title' => 'Müraciətlər',
            'contacts' => $contacts,
            'pagination' => [
                'page' => $page,
                'total_pages' => (int)ceil($total / $perPage),
                'total' => $total,
            ],
        ]);
    }

    public function show(string $id): void
    {
        $contact = Database::fetch("SELECT * FROM contacts WHERE id = ?", [(int)$id]);
        if (!$contact) {
            flash_set('error', 'Müraciət tapılmadı');
            redirect('/admin/contacts');
        }

        // Mark as read
        if (!$contact['is_read']) {
            Database::query("UPDATE contacts SET is_read = 1 WHERE id = ?", [(int)$id]);
            $contact['is_read'] = 1;
        }

        View::adminRender('contacts/show', [
            'title' => 'Müraciət #' . $id,
            'contact' => $contact,
        ]);
    }

    public function destroy(string $id): void
    {
        if (!\Core\CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/contacts');
        }

        Database::query("DELETE FROM contacts WHERE id = ?", [(int)$id]);
        flash_set('success', 'Müraciət silindi');
        redirect('/admin/contacts');
    }
}
