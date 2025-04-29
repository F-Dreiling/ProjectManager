<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Dashboard</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4 shadow">
            <div class="card-header bg-warning">
                <a class="text-white text-decoration-none fw-bold fs-5" href="<?= BASE_PATH ?>/clients">Latest Clients</a>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($latestClients as $client): ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>" class="text-black text-decoration-none">
                            <?= htmlspecialchars($client['name']) ?> (<?= htmlspecialchars($client['contact']) ?>)
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4 shadow">
            <div class="card-header bg-success">
                <a class="text-white text-decoration-none fw-bold fs-5" href="<?= BASE_PATH ?>/projects">Latest Projects</a>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($latestProjects as $project): ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>" class="text-black text-decoration-none">
                            <?= htmlspecialchars($project['title']) ?> (<?= htmlspecialchars($project['status']) ?>)
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>