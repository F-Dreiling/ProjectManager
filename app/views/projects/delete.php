<?php if (!$project) {
    $_SESSION['error'] = 'Project not found';
    header('Location: ' . BASE_PATH . '/projects');
    return;
} ?>

<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1"><i class="fa fa-gear fa-fw me-1"></i>Delete Project</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<div class="d-flex justify-content-center">
    <div class="card dr-shadow mb-4 w-50">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">#<?= htmlspecialchars($project['id']) ?> <?= htmlspecialchars($project['title']) ?></h5>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Client</th>
                        <td>
                            <a href="<?= BASE_PATH ?>/clients/<?= $project['client_id'] ?>" class="text-decoration-none text-black">
                                #<?= htmlspecialchars($project['client_id']) ?> <?= htmlspecialchars($client_name) ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Due Date</th>
                        <td><?= htmlspecialchars($project['due_date'] ?? 'N/A') ?></td>
                    </tr>
                    <tr>
                        <th class="align-middle">Status</th>
                        <td>
                            <div class="dr-tag dr-status-<?= htmlspecialchars($project['status']) ?>">
                                <?= htmlspecialchars($statuses[$project['status']]) ?>
                            </div>    
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <a href="<?= BASE_PATH ?>/projects" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Cancel</a>
    <form method="POST" action="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/delete" class="d-inline">
        <button type="submit" class="btn btn-danger dr-shadow ms-2">Delete</button>
    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>