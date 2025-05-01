<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Clients</h2>
<h5 class="mb-1">Total: <?= count($clients) ?></h5>
<h2 class="mb-4">&gt;&gt;</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<table class="table table-striped table-hover">
    <thead class="dr-header-warning">
        <tr>
            <th>ID</th><th>Name</th><th>Contact</th><th>Email</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
            <tr class="position-relative">
                <td>
                    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>" class="text-decoration-none text-black stretched-link">
                        <?= htmlspecialchars($client['id']) ?>
                    </a>
                </td>
                <td>
                        <?= htmlspecialchars($client['name']) ?>
                </td>
                <td>
                        <?= htmlspecialchars($client['contact']) ?>
                </td>
                <td>
                        <?= htmlspecialchars($client['email']) ?>
                </td>
                <td class="position-relative">
                    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/edit" class="btn btn-primary dr-btn-table me-2">Edit</a>|<a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/delete" class="btn btn-danger dr-btn-table ms-2">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Dashboard</a>
    |
    <a href="<?= BASE_PATH ?>/clients/create" class="btn btn-primary dr-shadow ms-2">Add Client</a>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>