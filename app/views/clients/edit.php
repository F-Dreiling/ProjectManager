<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h1>Edit Client</h1>
<form method="POST">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($client['name']) ?>" required><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($client['email']) ?>" required><br>
    <button type="submit">Update</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>