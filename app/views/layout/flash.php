<?php if (isset($_SESSION['success'])): ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="alert alert-warning alert-dismissible fade show mx-auto text-center bg-success text-white mb-4" role="alert">
            <strong><?= htmlentities($_SESSION['success']); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php unset($_SESSION['success']); endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="alert alert-warning alert-dismissible fade show mx-auto text-center bg-danger text-white mb-4" role="alert">
            <strong><?= htmlentities($_SESSION['error']); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php unset($_SESSION['error']); endif; ?>