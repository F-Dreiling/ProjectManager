<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1">Project Details</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<form method="POST" action="<?= BASE_PATH ?>/projects/store">
    <div class="d-flex justify-content-center">
        <div class="card dr-shadow mb-4 w-50">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <input type="text" name="title" class="w-100" placeholder="Project Title" required>
                </h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Client</th>
                            <td>
                                <input type="text" name="client" class="auto_client w-75" placeholder="Client Name" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Due Date</th>
                            <td>
                                <input type="date" name="due_date" class="w-75" placeholder="Due Date">
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <select name="status" class="form-select w-75">
                                    <option value="open" selected>Open</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="on_hold" >On Hold</option>
                                    <option value="completed">Completed</option>
                                    <option value="finalized">Finalized</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>
                                <textarea name="description" class="form-control w-75" rows="4" placeholder="Project Description"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="<?= BASE_PATH ?>/projects" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Cancel</a>
        |
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