<?php

require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../models/Position.php';

class ProjectController
{
    public function index()
    {
        $projects = Project::all($_SESSION['user']['id']);

        $client_names = [];
        foreach ($projects as $project) {
            $client = Client::find($_SESSION['user']['id'], $project['client_id']);
            $client_names[$project['id']] = $client ? $client['name'] : 'N/A';
        }

        $statuses = Project::getStatuses();

        require_once __DIR__ . '/../views/projects/index.php';
    }

    public function create()
    {
        $statuses = Project::getStatuses();

        require_once __DIR__ . '/../views/projects/create.php';
    }

    public function store()
    {
        if (!isset($_POST['title']) || !isset($_POST['client'])) {
            $_SESSION['error'] = 'Title and Client are required';

            header('Location: ' . BASE_PATH . '/projects/create');
            return;
        }

        if (preg_match('/^\d+/', $_POST['client'], $matches)) {
            $client_id = $matches[0];
        }
        else {
            $_SESSION['error'] = 'Invalid client format';
    
            header('Location: ' . BASE_PATH . '/projects/create');
            return;
        }

        $client = Client::find($_SESSION['user']['id'], $client_id)['id'];
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

        $project_id = Project::getLastInsertId();

        // Store Positions
        for ($i = 1; $i <= 15; $i++) {
            
            if (!isset($_POST['pos_title' . $i])) continue;

            if (empty($_POST['pos_title' . $i])) {
                $_SESSION['error'] = 'Positions not saved. Title is required';
                
                header('Location: ' . BASE_PATH . '/projects');
                return;
            }

            if (!is_numeric($_POST['pos_hours' . $i])) {
                $_SESSION['error'] = 'Positions not saved. Hours must be numeric';

                header('Location: ' . BASE_PATH . '/projects');
                return;
            }

            if (!is_numeric($_POST['pos_rate' . $i])) {
                $_SESSION['error'] = 'Positions not saved. Rate must be numeric';

                header('Location: ' . BASE_PATH . '/projects');
                return;
            }

            $pos_title = $_POST['pos_title' . $i];
            $pos_description = $_POST['pos_description' . $i] ?? '';
            $pos_hours = $_POST['pos_hours' . $i] ?? 0;
            $pos_rate = $_POST['pos_rate' . $i] ?? 0;

            Position::create($project_id, $pos_title, $pos_description, $pos_hours, $pos_rate);
        }

        header('Location: ' . BASE_PATH . '/projects');
        return; 
    }

    public function show($id)
    {
        $project = Project::find($_SESSION['user']['id'], $id);
        if (!$project) {
            $_SESSION['error'] = 'Project not found';

            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        $client = Client::find($_SESSION['user']['id'], $project['client_id']);
        if (!$client ) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/projects/create');
            return;
        }
        else {
            $client_name = $client['name'] ?? 'N/A';
        }

        $positions = Position::all($id);

        $statuses = Project::getStatuses();

        require_once __DIR__ . '/../views/projects/show.php';
    }

    public function edit($id)
    {
        $project = Project::find($_SESSION['user']['id'], $id);
        if (!$project) {
            $_SESSION['error'] = 'Project not found';

            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        $client = Client::find($_SESSION['user']['id'], $project['client_id']);
        if (!$client) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/projects/create');
            return;
        }
        else {
            $client_name = $client['name'] ?? 'N/A';
        }

        $positions = Position::all($id);

        $statuses = Project::getStatuses();

        require_once __DIR__ . '/../views/projects/edit.php';
    }

    public function update($id)
    {
        if (!isset($_POST['title']) || !isset($_POST['client'])) {
            $_SESSION['error'] = 'Title and Client are required';

            header('Location: ' . BASE_PATH . '/projects/' . $id . '/edit');
            return;
        }

        $project = Project::find($_SESSION['user']['id'], $id);
        if (!$project || $project['user_id'] != $_SESSION['user']['id']) {
            $_SESSION['error'] = 'Project not found';

            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        if (preg_match('/^\d+/', $_POST['client'], $matches)) {
            $client_id = $matches[0];
        }
        else {
            $_SESSION['error'] = 'Invalid client format';
    
            header('Location: ' . BASE_PATH . '/projects/create');
            return;
        }

        $client = Client::find($_SESSION['user']['id'], $client_id)['id'];
        if (!$client) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/projects/' . $id . '/edit');
            return;
        }

        $title = $_POST['title'];
        $due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : date('Y-m-d');
        $status = !empty($_POST['status']) ? $_POST['status'] : 'open';
        $description = $_POST['description'];

        Project::update($id, $client, $title, $due_date, $status, $description);
        $_SESSION['success'] = 'Project updated successfully';

        // Check Position Titles
        $pos_count = 0;

        for ($i = 1; $i <= 15; $i++) {

            if (!isset($_POST['pos_title' . $i])) continue;

            if (empty($_POST['pos_title' . $i])) {
                $_SESSION['error'] = 'Positions not saved. All titles are required';

                header('Location: ' . BASE_PATH . '/projects/' . $id . '/edit');
                return;
            }

            if (!is_numeric($_POST['pos_hours' . $i])) {
                $_SESSION['error'] = 'Positions not saved. Hours must be numeric';

                header('Location: ' . BASE_PATH . '/projects/' . $id . '/edit');
                return;
            }

            if (!is_numeric($_POST['pos_rate' . $i])) {
                $_SESSION['error'] = 'Positions not saved. Rate must be numeric';

                header('Location: ' . BASE_PATH . '/projects/' . $id . '/edit');
                return;
            }

            $pos_count++;
        }

        // Delete existing positions
        Position::deleteByProject($id);

        // Store Positions
        for ($i = 1; $i <= $pos_count; $i++) {
            
            if (!isset($_POST['pos_title' . $i])) continue;

            $pos_title = $_POST['pos_title' . $i];
            $pos_description = $_POST['pos_description' . $i] ?? '';
            $pos_hours = $_POST['pos_hours' . $i] ?? 0;
            $pos_rate = $_POST['pos_rate' . $i] ?? 0;

            Position::create($id, $pos_title, $pos_description, $pos_hours, $pos_rate);
        }

        header('Location: ' . BASE_PATH . '/projects');
        return;
    }

    public function check($id)
    {
        $project = Project::find($_SESSION['user']['id'], $id);
        if (!$project || $project['user_id'] != $_SESSION['user']['id']) {
            $_SESSION['error'] = 'Project not found';

            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        $client_name = Client::find($_SESSION['user']['id'], $project['client_id'])['name'] ?? 'N/A';

        $statuses = Project::getStatuses();
        
        require_once __DIR__ . '/../views/projects/delete.php';
    }

    public function delete($id)
    {
        $project = Project::find($_SESSION['user']['id'], $id);
        if (!$project || $project['user_id'] != $_SESSION['user']['id']) {
            $_SESSION['error'] = 'Project not found';

            header('Location: ' . BASE_PATH . '/projects');
            return;
        }

        Project::delete($id);
        $_SESSION['success'] = 'Project deleted successfully';

        header('Location: ' . BASE_PATH . '/projects');
        return;
    }
}

?>