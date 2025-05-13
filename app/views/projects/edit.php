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
                        <tr>
                            <th class="align-middle">Positions</th>
                            <td>
                                <div id="position_fields" <?= count($positions) > 0 ? 'class="mb-3"' : '' ?>>
                                <?php 
                                    $isClassAdded = count($positions) > 0 ? true : false;
                                    $countPos = 0;
                                    foreach ($positions as $position) {
                                        $countPos++;
                                        echo '<div id="position'.$countPos.'">
                                            <input type="button" class="btn btn-secondary mb-2" value="-" onclick="removePosition('.$countPos.')"><br>
                                            <div class="w-75 mb-2">
                                                <label>Title:</label> 
                                                <input type="text" name="pos_title'.$countPos.'" class="form-control w-100" value="'.htmlspecialchars($position['title']).'" required />
                                            </div>
                                            <div class="d-flex justify-content-between w-75 gap-3 mb-2">
                                                <div class="d-inline-block">
                                                    <label>Hours:</label>
                                                    <input type="text" name="pos_hours'.$countPos.'" class="form-control w-100" value="'.htmlspecialchars($position['hours']).'" />
                                                </div>
                                                <div class="d-inline-block">
                                                    <label>Rate:</label>
                                                    <input type="text" name="pos_rate'.$countPos.'" class="form-control w-100" value="'.htmlspecialchars($position['rate']).'" />
                                                </div>
                                            </div>
                                            <div class="w-75 mb-3">
                                                <label>Description:</label>
                                                <textarea name="pos_description'.$countPos.'" class="form-control w-100" rows="2">'.
                                                    (!empty($position['description']) ? htmlspecialchars($position['description']) : "").
                                                '</textarea>
                                            </div>
                                        </div>';
                                    } 
                                ?>
                                </div>
                                <button type="button" id="addPos" class="btn btn-primary">+</button>
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
    var countPos = <?= $countPos ?>;
    var isClassAdded = <?= $isClassAdded ? 'true' : 'false' ?>;

    $(document).ready( function() {

        $('.auto_client').autocomplete({
            source: "<?= BASE_PATH ?>/clients/autocomplete",
            minLength: 1,
        });

        $('#addPos').click( function(event) {

            if ( countPos >= 15 ) {
                alert("Maximum of 15 position entries exceeded");
                return;
            }

            countPos++;

            // Add the "mb-3" class to #position_fields on the first click
            if (!isClassAdded) {
                $('#position_fields').addClass('mb-3');
                isClassAdded = true;
            }

            // Append a new position entry
            $('#position_fields').append(
                '<div id="position' + countPos + '"> \
                    <input type="button" class="btn btn-secondary mb-2" value="-" onclick="removePosition(' + countPos + ')"><br> \
                    <div class="w-75 mb-2"> \
                        <label>Title:</label> \
                        <input type="text" name="pos_title' + countPos + '" class="form-control w-100" value="" required /> \
                    </div> \
                    <div class="d-flex justify-content-between w-75 gap-3 mb-2"> \
                        <div class="d-inline-block"> \
                            <label>Hours:</label> \
                            <input type="text" name="pos_hours' + countPos + '" class="form-control w-100" value="0" /> \
                        </div> \
                        <div class="d-inline-block"> \
                            <label>Rate:</label> \
                            <input type="text" name="pos_rate' + countPos + '" class="form-control w-100" value="0" /> \
                        </div> \
                    </div> \
                    <div class="w-75 mb-3"> \
                        <label>Description:</label> \
                        <textarea name="pos_description' + countPos + '" class="form-control w-100" rows="2"></textarea> \
                    </div> \
                </div>'
            );
        });

    });

    // Function to remove a position entry
    function removePosition(id) {
        $('#position' + id).remove();
        countPos--;

        // Check if #position_fields is empty and remove the "mb-3" class
        if ($('#position_fields').children().length === 0) {
            $('#position_fields').removeClass('mb-3');
            isClassAdded = false;
        }
    }

</script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>