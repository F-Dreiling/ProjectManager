<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h1>Add New Client</h1>
<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Save</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>