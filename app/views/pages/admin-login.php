<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Giriş — TMAS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: #F7F8FA;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #2D3748;
        }
        .login-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        .login-card h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #1A2332;
        }
        .login-card p {
            font-size: 0.875rem;
            color: #718096;
            margin-bottom: 28px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            display: block;
            font-size: 0.825rem;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-size: 0.9rem;
            font-family: inherit;
            transition: 0.2s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #00BFA5;
            box-shadow: 0 0 0 3px rgba(0,191,165,0.1);
        }
        .btn-login {
            width: 100%;
            padding: 11px;
            background: #00BFA5;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            font-family: inherit;
        }
        .btn-login:hover {
            background: #00A08A;
        }
        .flash-error {
            background: #FFF5F5;
            color: #9B2C2C;
            border: 1px solid #FED7D7;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }
        .login-brand {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-brand span {
            font-size: 1.3rem;
            font-weight: 700;
            color: #00BFA5;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-brand">
            <span>TMAS Admin</span>
        </div>
        <h1>Giriş</h1>
        <p>Admin panelinə daxil olmaq üçün məlumatlarınızı daxil edin.</p>

        <?php if (!empty($_SESSION['flash']['error'])): ?>
            <div class="flash-error"><?= htmlspecialchars($_SESSION['flash']['error']) ?></div>
            <?php unset($_SESSION['flash']['error']); ?>
        <?php endif; ?>

        <form method="POST" action="/admin/login">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="email">E-poçt</label>
                <input type="email" id="email" name="email" required autofocus placeholder="admin@tmas.az">
            </div>
            <div class="form-group">
                <label for="password">Şifrə</label>
                <input type="password" id="password" name="password" required placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
            </div>
            <button type="submit" class="btn-login">Daxil Ol</button>
        </form>
    </div>
</body>
</html>
