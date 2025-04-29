<?php

class DashboardController
{
    public function index()
    {
        require_once __DIR__ . '/../models/Client.php';
        require_once __DIR__ . '/../models/Project.php';

        $latestClients = Client::latest($_SESSION['user']['id'], 5);
        $latestProjects = Project::latest($_SESSION['user']['id'], 5);

        require __DIR__ . '/../views/dashboard/index.php';
    }
}