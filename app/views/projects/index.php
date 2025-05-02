<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Projects</h2>
<h5 class="mb-1">Total: <?= count($projects) ?></h5>
<h2 class="mb-4">&gt;&gt;</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<table class="table table-striped table-hover">
    <thead class="dr-header-success">
        <tr>
            <th>ID</th><th>Title</th><th>Client</th><th>Due Date</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project): ?>
            <tr class="position-relative">
                <td>
                    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>" class="text-black text-decoration-none stretched-link">
                        <?= htmlspecialchars($project['id']) ?>
                    </a>
                </td>
                <td>
                        <?= htmlspecialchars($project['title']) ?>
                </td>
                <td>
                        <?= htmlspecialchars($client_names[$project['id']]) ?>
                </td>
                <td>
                        <?= htmlspecialchars($project['due_date']) ?>
                </td>
                <td>
                    <div class="dr-tag">
                        <?= htmlspecialchars($project['status']) ?>
                    </div>
                </td>
                <td class="position-relative">
                    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/edit" class="btn btn-primary dr-btn-table me-2">Edit</a>|<a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/delete" class="btn btn-danger dr-btn-table ms-2">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Dashboard</a>
    |
    <a href="<?= BASE_PATH ?>/projects/create" class="btn btn-primary dr-shadow ms-2">Add Project</a>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>