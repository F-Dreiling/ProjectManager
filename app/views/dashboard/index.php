<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Dashboard</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4 dr-shadow">
            <div class="card-header bg-warning">
                <a class="d-flex align-items-center text-white text-decoration-none fw-bold fs-5" href="<?= BASE_PATH ?>/clients">
                    <i class="fa fa-address-card fa-fw me-1"></i>Latest Clients
                </a>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($latestClients as $client): ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>" class="d-flex text-black text-decoration-none">
                            <?= htmlspecialchars($client['name']) ?> (<?= htmlspecialchars($client['contact']) ?>)
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4 dr-shadow">
            <div class="card-header bg-success">
                <a class="d-flex align-items-center text-white text-decoration-none fw-bold fs-5" href="<?= BASE_PATH ?>/projects">
                    <i class="fa fa-gear fa-fw me-1"></i>Latest Projects
                </a>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($latestProjects as $project): ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>" class="d-flex text-black text-decoration-none">
                            <?= htmlspecialchars($project['title']) ?> (<?= htmlspecialchars($project['status']) ?>)
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>