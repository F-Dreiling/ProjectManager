<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1"><i class="fa fa-address-card fa-fw me-1"></i>Clients</h2>
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
                <td class="align-middle">
                    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>" class="text-decoration-none text-black stretched-link">
                        <?= htmlspecialchars($client['id']) ?>
                    </a>
                </td>
                <td class="align-middle">
                        <?= htmlspecialchars($client['name']) ?>
                </td>
                <td class="align-middle">
                        <?= htmlspecialchars($client['contact']) ?>
                </td>
                <td class="align-middle">
                        <?= htmlspecialchars($client['email']) ?>
                </td>
                <td>
                    <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/edit" class="btn btn-primary dr-btn-table me-2">Edit</a><a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/delete" class="btn btn-danger dr-btn-table ms-2">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Dashboard</a>
    <a href="<?= BASE_PATH ?>/clients/create" class="btn btn-primary dr-shadow ms-2">Add Client</a>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>