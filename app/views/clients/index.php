<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Clients</h2>
<h5 class="mb-1">Total: <?= count($clients) ?></h5>
<h2 class="mb-4">&gt;&gt;</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Contact</th><th>Email</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= htmlspecialchars($client['id']) ?></td>
                <td>
                    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>" class="text-black text-decoration-none"><?= htmlspecialchars($client['name']) ?></a>
                </td>
                <td><?= htmlspecialchars($client['contact']) ?></td>
                <td><?= htmlspecialchars($client['email']) ?></td>
                <td>
                    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/edit" class="btn btn-info me-2">Edit</a>|<a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/delete" class="btn btn-danger ms-2">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary me-2">&lt;&lt; Dashboard</a>
    |
    <a href="<?= BASE_PATH ?>/clients/create" class="btn btn-secondary ms-2">Add Client</a>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>