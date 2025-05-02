<?php

require_once __DIR__ . '/../models/Client.php';

class ClientController
{
    public function index()
    {
        $clients = Client::all($_SESSION['user']['id']);

        require_once __DIR__ . '/../views/clients/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/clients/create.php';
    }

    public function store()
    {
        if (!isset($_POST['name'])) {
            $_SESSION['error'] = 'Name is required';

            header('Location: ' . BASE_PATH . '/clients/create');
            return;
        }

        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $company = $_POST['company'];
        $notes = $_POST['notes'];

        Client::create($_SESSION['user']['id'], $name, $contact, $email, $phone, $company, $notes);
        $_SESSION['success'] = 'Client created successfully';

        header('Location: ' . BASE_PATH . '/clients');
        return;
    }

    public function show($id)
    {
        $client = Client::find($_SESSION['user']['id'], $id);
        if (!$client) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        require_once __DIR__ . '/../views/clients/show.php';
    }

    public function edit($id)
    {
        $client = Client::find($_SESSION['user']['id'], $id);
        if (!$client) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        require_once __DIR__ . '/../views/clients/edit.php';
    }

    public function update($id)
    {
        if (!isset($_POST['name'])) {
            $_SESSION['error'] = 'Name is required';

            header('Location: ' . BASE_PATH . '/clients/' . $id . '/edit');
            return;
        }

        $client = Client::find($_SESSION['user']['id'], $id);
        if (!$client) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $company = $_POST['company'];
        $notes = $_POST['notes'];

        Client::update($id, $name, $contact, $email, $phone, $company, $notes);
        $_SESSION['success'] = 'Client updated successfully';

        header('Location: ' . BASE_PATH . '/clients');
        return;
    }

    public function check($id)
    {
        $client = Client::find($_SESSION['user']['id'], $id);
        if (!$client) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/clients');
            return;
        }
        
        require_once __DIR__ . '/../views/clients/delete.php';
    }

    public function delete($id)
    {
        $client = Client::find($_SESSION['user']['id'], $id);
        if (!$client) {
            $_SESSION['error'] = 'Client not found';

            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        Client::delete($id);
        $_SESSION['success'] = 'Client deleted successfully';

        header('Location: ' . BASE_PATH . '/clients');
        return;
    }

    public function autocomplete()
    {
        $term = $_GET['term'] ?? '';
        if (empty($term)) {
            echo json_encode([]);
            return;
        }

        $clients = Client::findByName($_SESSION['user']['id'], $term);

        $results = array_map(function ($client) {
            return $client['id']." ".$client['name'];
        }, $clients);

        echo json_encode($results);
    }
}

?>