<?php
/**
 * Temporary admin password reset script.
 * DELETE THIS FILE after use!
 */

define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH . '/core/autoload.php';
new Core\App();

$newPassword = 'admin2025';
$hash = password_hash($newPassword, PASSWORD_BCRYPT);

Core\Database::query("UPDATE admins SET password = ? WHERE email = ?", [$hash, 'admin@tmas.az']);

$verify = Core\Database::fetch("SELECT password FROM admins WHERE email = ?", ['admin@tmas.az']);

echo "<h3>Admin password reset</h3>";
echo "<p>Email: <b>admin@tmas.az</b></p>";
echo "<p>Password: <b>{$newPassword}</b></p>";
echo "<p>Hash saved: <code>" . htmlspecialchars($verify['password']) . "</code></p>";
echo "<p>Verify: " . (password_verify($newPassword, $verify['password']) ? '<b style="color:green">OK</b>' : '<b style="color:red">FAIL</b>') . "</p>";
echo "<hr><p style='color:red'><b>DELETE this file immediately:</b> rm public/reset-admin.php</p>";
echo "<p><a href='/admin/login'>Go to login →</a></p>";
