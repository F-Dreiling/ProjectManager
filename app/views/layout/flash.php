<?php if (isset($_SESSION['error'])) : ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-warning alert-dismissible fade show w-50 mb-3 text-danger" role="alert">
            <strong><?= htmlentities($_SESSION['error']); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php unset($_SESSION['error']); endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-warning alert-dismissible fade show w-50 mb-3 text-success" role="alert">
            <strong><?= htmlentities($_SESSION['success']); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php unset($_SESSION['success']); endif; ?>