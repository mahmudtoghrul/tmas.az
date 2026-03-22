<!DOCTYPE html>
<html lang="<?= lang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'TMAS') ?> — TM Analytics & Strategy</title>
    <meta name="description" content="<?= e($meta_description ?? __('site_description')) ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">

    <?php if (!empty($extra_css)): ?>
        <?= $extra_css ?>
    <?php endif; ?>
</head>
<body>
    <?php \Core\View::partial('header') ?>

    <main>
        <?= $content ?>
    </main>

    <?php \Core\View::partial('footer') ?>

    <script src="<?= asset('js/app.js') ?>"></script>

    <?php if (!empty($extra_js)): ?>
        <?= $extra_js ?>
    <?php endif; ?>
</body>
</html>
