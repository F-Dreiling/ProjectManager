<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h1>Login</h1>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color:red;">
        <?= htmlspecialchars($_SESSION['error']) ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<form action="<?= BASE_PATH ?>/login" method="POST" class="w-50 mx-auto">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>