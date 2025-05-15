<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For Localhost add BASE_PATH to the href -->
    <link rel="stylesheet" href="/app/views/layout/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/base/jquery-ui.min.css" integrity="sha512-TFee0335YRJoyiqz8hA8KV3P0tXa5CpRBSoM0Wnkn7JoJx1kaq1yXL/rb8YFpWXkMOjRcv5txv+C6UluttluCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/jquery-ui.min.js" integrity="sha512-MSOo1aY+3pXCOCdGAYoBZ6YGI0aragoQsg1mKKBHXCYPIWxamwOE7Drh+N5CPgGI5SA9IEKJiPjdfqWFWmZtRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        href="<?= BASE_PATH ?>/clients">
                        <i class="fa fa-address-card fa-fw me-1"></i>Clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-white dr-navbar-item 
                        <?= isset($_SESSION['controller']) && $_SESSION['controller'] === 'ProjectController' ? 'bg-success' : '' ?>" 
                        href="<?= BASE_PATH ?>/projects">
                        <i class="fa fa-gear fa-fw me-1"></i>Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-white dr-navbar-item" 
                        href="<?= BASE_PATH ?>/logout">
                        <i class="fa fa-right-from-bracket fa-fw me-1"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">