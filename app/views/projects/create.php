<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Project Details</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<form method="POST" action="<?= BASE_PATH ?>/projects/store">
    <div class="d-flex justify-content-center">
        <div class="card shadow mb-4 w-50">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <input type="text" name="title" placeholder="Project Title" required>
                </h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Client</th>
                            <td><input type="number" name="client" placeholder="Client ID" required></td>
                        </tr>
                        <tr>
                            <th>Due Date</th>
                            <td><input type="date" name="due_date" placeholder="Due Date"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><input type="text" name="status" placeholder="'open', 'in_progress', 'on_hold'"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><input type="text" name="description" placeholder="Project Description"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="<?= BASE_PATH ?>/projects" class="btn btn-secondary me-2">Cancel</a>
        |
        <button type="submit" class="btn btn-primary ms-2">Save</button>
    </div>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>