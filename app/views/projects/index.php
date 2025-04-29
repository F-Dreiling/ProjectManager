<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-4 text-center">Projects</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Title</th><th>Client</th><th>Due Date</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project): ?>
            <tr>
                <td>
                    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>" class="text-black text-decoration-none"><?= htmlspecialchars($project['title']) ?></a>
                </td>
                <td><?= htmlspecialchars($project['client_id']) ?></td>
                <td><?= htmlspecialchars($project['due_date']) ?></td>
                <td><?= htmlspecialchars($project['status']) ?></td>
                <td>
                    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/edit" class="btn btn-info me-2">Edit</a>|<a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/delete" class="btn btn-danger ms-2">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary me-2">&lt;&lt; Dashboard</a>
    |
    <a href="<?= BASE_PATH ?>/projects/create" class="btn btn-secondary ms-2">Add Project</a>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>