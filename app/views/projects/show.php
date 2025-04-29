<?php if (!$project) {
    $_SESSION['error'] = 'Project not found';
    header('Location: ' . BASE_PATH . '/projects');
    return;
} ?>

<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-4 text-center">Project Details</h2>

<div class="d-flex justify-content-center">
    <div class="card shadow mb-4 w-50">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><?= htmlspecialchars($project['title']) ?></h5>
        </div>
        <div class="card-body">
            <p><strong>Client:</strong> <?= htmlspecialchars($project['client_id']) ?></p>
            <p><strong>Due Date:</strong> <?= htmlspecialchars($project['due_date'] ?? 'N/A') ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($project['status']) ?></p>
            <p><strong>Description:</strong> <?= htmlspecialchars($project['description'] ?? 'N/A') ?></p>
            <p><strong>Created At:</strong> <?= htmlspecialchars($project['created_at']) ?></p>
            <p><strong>Updated At:</strong> <?= htmlspecialchars($project['updated_at']) ?></p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/" class="btn btn-secondary me-2">&lt;&lt; Dashboard</a>
    |
    <a href="<?= BASE_PATH ?>/projects" class="btn btn-secondary mx-2">&lt; Projects</a>
    |
    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/edit" class="btn btn-info mx-2">Edit</a>
    |
    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/delete" class="btn btn-danger ms-2">Delete</a>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>