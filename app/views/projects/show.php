<?php if (!$project) {
    $_SESSION['error'] = 'Project not found';
    header('Location: ' . BASE_PATH . '/projects');
    return;
} ?>

<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Project Details</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<div class="d-flex justify-content-center">
    <div class="card shadow mb-4 w-50">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">#<?= htmlspecialchars($project['id']) ?> <?= htmlspecialchars($project['title']) ?></h5>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Client</th>
                        <td>#<?= htmlspecialchars($project['client_id']) ?> <?= htmlspecialchars($client_name) ?></td>
                    </tr>
                    <tr>
                        <th>Due Date</th>
                        <td><?= htmlspecialchars($project['due_date'] ?? 'N/A') ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= htmlspecialchars($project['status']) ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?= htmlspecialchars($project['description'] ?? 'N/A') ?></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?= htmlspecialchars($project['created_at']) ?></td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td><?= htmlspecialchars($project['updated_at']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary shadow me-2">&lt;&lt; Dashboard</a>
    |
    <a href="<?= BASE_PATH ?>/projects" class="btn bg-success text-white shadow mx-2">Projects</a>
    |
    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/edit" class="btn btn-primary shadow mx-2">Edit</a>
    |
    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/delete" class="btn btn-danger shadow ms-2">Delete</a>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>