<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h1>Add New Project</h1>
<form method="POST">
    Title: <input type="text" name="title" required><br>
    Description: <input type="text" name="description" required><br>
    <button type="submit">Save</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>