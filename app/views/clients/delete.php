<?php if (!$client) {
    $_SESSION['error'] = 'Client not found';
    header('Location: ' . BASE_PATH . '/clients');
    return;
} ?>

<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1"><i class="fa fa-address-card fa-fw me-1"></i>Delete Client</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<div class="d-flex justify-content-center">
    <div class="card dr-shadow mb-4 w-50">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">#<?= htmlspecialchars($client['id']) ?> <?= htmlspecialchars($client['name']) ?></h5>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Contact</th>
                        <td><?= htmlspecialchars($client['contact'] ?? 'N/A') ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= htmlspecialchars($client['email'] ?? 'N/A') ?></td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td><?= htmlspecialchars($client['company'] ?? 'N/A') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/clients" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Cancel</a>
    <form method="POST" action="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/delete" class="d-inline">
        <button type="submit" class="btn btn-danger dr-shadow ms-2">Delete</button>
    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>