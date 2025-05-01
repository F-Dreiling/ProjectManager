<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= BASE_PATH ?>/app/views/layout/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 dr-shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center dr-navbar-head" href="<?= BASE_PATH ?>/">ProjectManager</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-white dr-navbar-item 
                        <?= isset($_SESSION['controller']) && $_SESSION['controller'] === 'ClientController' ? 'bg-warning' : '' ?>" 
                        href="<?= BASE_PATH ?>/clients">Clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-white dr-navbar-item 
                        <?= isset($_SESSION['controller']) && $_SESSION['controller'] === 'ProjectController' ? 'bg-success' : '' ?>" 
                        href="<?= BASE_PATH ?>/projects">Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-white dr-navbar-item" 
                        href="<?= BASE_PATH ?>/logout">Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">