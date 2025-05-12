<?php if (!$project) {
    $_SESSION['error'] = 'Project not found';
    header('Location: ' . BASE_PATH . '/projects');
    return;
} ?>

<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1"><i class="fa fa-gear fa-fw me-1"></i>Project Details</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<form method="POST" action="<?= BASE_PATH ?>/projects/<?= $project['id'] ?>/update">
    <div class="d-flex justify-content-center">
        <div class="card dr-shadow mb-4 w-50">
            <div class="card-header d-flex align-items-center bg-success text-white">
                <h5 class="mb-0 me-2">#<?= htmlspecialchars($project['id']) ?></h5>
                <input type="text" name="title" class="form-control w-100" value="<?= htmlspecialchars($project['title']) ?>" required>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="align-middle">Client</th>
                            <td>
                                <input type="text" name="client" class="auto_client form-control w-75" value="<?= htmlspecialchars($project['client_id']." ".$client_name) ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Due Date</th>
                            <td>
                                <input type="date" name="due_date" class="form-control w-75" value="<?= htmlspecialchars($project['due_date']) ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Status</th>
                            <td>
                                <select name="status" class="form-select w-75">
                                    <?php foreach ($statuses as $value => $display): ?>
                                        <option value="<?= htmlspecialchars($value) ?>" <?= $value === $project['status'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($display) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Description</th>
                            <td>
                                <textarea name="description" class="form-control w-75" rows="4"><?= htmlspecialchars($project['description']) ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="<?= BASE_PATH ?>/projects" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Cancel</a>
        <button type="submit" class="btn btn-primary dr-shadow ms-2">Save</button>
    </div>
</form>

<script type="text/javascript">

    $(document).ready( function() {

        $('.auto_client').autocomplete({
            source: "<?= BASE_PATH ?>/clients/autocomplete",
            minLength: 1,
        });

    });

</script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>