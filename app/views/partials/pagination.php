<?php
$page = $pagination['page'] ?? 1;
$totalPages = $pagination['total_pages'] ?? 1;
if ($totalPages <= 1) return;
?>
<nav class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" class="pagination-prev">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>" class="pagination-next">&raquo;</a>
    <?php endif; ?>
</nav>
