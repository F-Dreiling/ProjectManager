<?php if (!$client) {
    $_SESSION['error'] = 'Client not found';
    header('Location: ' . BASE_PATH . '/clients');
    return;
} ?>

<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-4 text-center">Client Details</h2>

<div class="d-flex justify-content-center">
    <div class="card shadow mb-4 w-50">
        <div class="card-header bg-warning text-white">
                <h5 class="mb-0"><?= htmlspecialchars($client['name']) ?></h5>
        </div>
        <div class="card-body">
            <p><strong>Contact Person:</strong> <?= htmlspecialchars($client['contact'] ?? 'N/A') ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($client['email'] ?? 'N/A') ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($client['phone'] ?? 'N/A') ?></p>
            <p><strong>Company Name:</strong> <?= htmlspecialchars($client['company'] ?? 'N/A') ?></p>
            <p><strong>Notes:</strong> <?= htmlspecialchars($client['notes'] ?? 'N/A') ?></p>
            <p><strong>Created At:</strong> <?= htmlspecialchars($client['created_at']) ?></p>
            <p><strong>Updated At:</strong> <?= htmlspecialchars($client['updated_at']) ?></p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary me-2">&lt;&lt; Dashboard</a>
    |
    <a href="<?= BASE_PATH ?>/clients" class="btn btn-secondary mx-2">&lt; Clients</a>
    |
    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/edit" class="btn btn-info mx-2">Edit</a>
    |
    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/delete" class="btn btn-danger ms-2">Delete</a>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>