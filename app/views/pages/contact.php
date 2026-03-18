<section class="page-hero">
    <div class="container">
        <h1><?= __('contact_title') ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if (!empty($_SESSION['flash']['success'])): ?>
            <div class="alert alert-success"><?= e($_SESSION['flash']['success']) ?></div>
            <?php unset($_SESSION['flash']); ?>
        <?php elseif (!empty($_SESSION['flash']['error'])): ?>
            <div class="alert alert-error"><?= e($_SESSION['flash']['error']) ?></div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>

        <div class="contact-grid">
            <form method="POST" action="<?= url('/contact') ?>" class="contact-form">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="name"><?= __('form_name') ?></label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email"><?= __('form_email') ?></label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone"><?= __('form_phone') ?></label>
                    <input type="tel" id="phone" name="phone">
                </div>

                <div class="form-group">
                    <label for="message"><?= __('form_message') ?></label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary"><?= __('form_submit') ?></button>
            </form>

            <div class="contact-info">
                <div class="info-item">
                    <h3><?= __('contact_email') ?></h3>
                    <p>info@tmas.az</p>
                </div>
                <div class="info-item">
                    <h3><?= __('contact_address') ?></h3>
                    <p>Baku, Azerbaijan</p>
                </div>
            </div>
        </div>
    </div>
</section>
