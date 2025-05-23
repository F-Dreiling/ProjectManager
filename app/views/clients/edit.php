<?php if (!$client) {
    $_SESSION['error'] = 'Client not found';
    header('Location: ' . BASE_PATH . '/clients');
    return;
} ?>

<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-1"><i class="fa fa-address-card fa-fw me-1"></i>Edit Client</h2>
<h2 class="mb-4">&gt;&gt;</h2>

<?php require_once __DIR__ . '/../layout/flash.php'; ?>

<form method="POST" action="<?= BASE_PATH ?>/clients/<?= $client['id'] ?>/update">
    <div class="d-flex justify-content-center">
        <div class="card dr-shadow mb-4 w-50">
            <div class="card-header d-flex align-items-center px-4 bg-warning text-white">
                <h5 class="mb-0 me-2">#<?= htmlspecialchars($client['id']) ?></h5>
                <input type="text" name="name" class="form-control w-100" placeholder="Client Name" value="<?= htmlspecialchars($client['name']) ?>" required>
            </div>
            <div class="card-body">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th class="align-middle">Contact</th>
                            <td>
                                <input type="text" name="contact" class="form-control" value="<?= htmlspecialchars($client['contact']) ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Email</th>
                            <td>
                                <input type="text" name="email" class="form-control" value="<?= htmlspecialchars($client['email']) ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Phone</th>
                            <td>
                                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($client['phone']) ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Company</th>
                            <td>
                                <input type="text" name="company" class="form-control" value="<?= htmlspecialchars($client['company']) ?>">
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Notes</th>
                            <td>
                                <textarea name="notes" class="form-control" rows="3"><?= htmlspecialchars($client['notes']) ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="<?= BASE_PATH ?>/clients" class="btn btn-secondary dr-shadow me-2">&lt;&lt; Cancel</a>
        <button type="submit" class="btn btn-primary dr-shadow ms-2">Save</button>
    </div>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>