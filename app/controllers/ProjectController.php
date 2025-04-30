<?php

require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/Project.php';

class ProjectController
{
    public function index()
    {
        $projects = Project::all($_SESSION['user']['id']);

        $client_names = [];
        foreach ($projects as $project) {
            $client = Client::find($project['client_id']);
            $client_names[$project['id']] = $client ? $client['name'] : 'N/A';
        }

        require_once __DIR__ . '/../views/projects/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/projects/create.php';
    }

    public function store()
    {
        if (!isset($_POST['title']) || !isset($_POST['client'])) {
            $_SESSION['error'] = 'Title and Client are required';
            header('Location: ' . BASE_PATH . '/projects/create');
            return;
        }

        $client = Client::find($_POST['client'])['id'];

        if (!$client) {
            $_SESSION['error'] = 'Client not found';
            header('Location: ' . BASE_PATH . '/projects/create');
            return;
        }

        $title = $_POST['title'];
        $due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : date('Y-m-d');
        $status = !empty($_POST['status']) ? $_POST['status'] : 'open';
        $description = $_POST['description'];

        Project::create($_SESSION['user']['id'], $client, $title, $due_date, $status, $description);
        $_SESSION['success'] = 'Project created successfully';
        header('Location: ' . BASE_PATH . '/projects');
        return; 
    }

    public function show($id)
    {
        $project = Project::find($id);
        $client_name = Client::find($project['client_id'])['name'] ?? 'N/A';
        if (!$project) {
            $_SESSION['error'] = 'Project not found';
            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        require_once __DIR__ . '/../views/projects/show.php';
    }

    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            $_SESSION['error'] = 'Project not found';
            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            Project::update($id, $title, $description);
            $_SESSION['success'] = 'Project updated successfully';
            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        require_once __DIR__ . '/../views/projects/edit.php';
    }

    public function delete($id)
    {
        Project::delete($id);
        $_SESSION['success'] = 'Project deleted successfully';
        header('Location: ' . BASE_PATH . '/projects');
        return;
    }
}

?>