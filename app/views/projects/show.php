<?php if (!$project) {
    $_SESSION['error'] = 'Project not found';
    header('Location: ' . BASE_PATH . '/projects');
    return;
} ?>

<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1"><i class="fa fa-gear fa-fw me-1"></i>Project Details</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<div class="d-flex justify-content-center">
    <div class="card dr-shadow mb-4 w-50">
        <div class="card-header px-4 bg-success text-white">
            <h5 class="mb-0">#<?= htmlspecialchars($project['id']) ?> <?= htmlspecialchars($project['title']) ?></h5>
        </div>
        <div class="card-body">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th class="dr-border-top">Client</th>
                        <td class="dr-border-top">
                            <a href="<?= BASE_PATH ?>/clients/<?= $project['client_id'] ?>" class="text-decoration-none text-black">
                                #<?= htmlspecialchars($project['client_id'])." ".htmlspecialchars($client_name) ?>
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
                    <tr>
                        <th class="align-middle">Description</th>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item"><?= htmlspecialchars($project['description'] ?? 'N/A') ?></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Positions</th>
                        <td>
                            <?php if (count($positions) > 0): ?>
                                <ul class="list-group">
                                    <?php foreach ($positions as $position): ?>
                                        <li class="list-group-item">
                                            <i class="fa fa-wrench fa-fw"></i>
                                            <?= htmlspecialchars($position['title']." (".$position['hours']."h @ ".$position['rate']."€)").
                                                (!empty($position['description']) ? ":<br>".htmlspecialchars($position['description']) : "") ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <ul class="list-group">
                                    <li class="list-group-item text-muted">No positions found for this project.</li>
                                </ul>
                            <?php endif; ?>
                        </td>
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
    <a href="<?= BASE_PATH ?>/projects" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Back</a>
    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/edit" class="btn btn-primary dr-shadow mx-2">Edit</a>
    <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/delete" class="btn btn-danger dr-shadow ms-2">Delete</a>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>