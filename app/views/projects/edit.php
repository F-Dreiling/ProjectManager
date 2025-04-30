<?php if (!$project) {
    $_SESSION['error'] = 'Project not found';
    header('Location: ' . BASE_PATH . '/projects');
    return;
} ?>

<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h1>Edit Project</h1>
<form method="POST">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($project['title']) ?>" required><br>
    Description: <input type="text" name="description" value="<?= htmlspecialchars($project['description']) ?>" required><br>
    <button type="submit">Update</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>