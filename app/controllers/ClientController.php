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
        $client = Client::find($id);
        if (!$client) {
            $_SESSION['error'] = 'Client not found';
            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        require_once __DIR__ . '/../views/clients/show.php';
    }

    public function edit($id)
    {
        $client = Client::find($id);
        if (!$client) {
            $_SESSION['error'] = 'Project not found';
            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];

            Client::update($id, $name, $email);
            $_SESSION['success'] = 'Client created successfully';
            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        require_once __DIR__ . '/../views/clients/edit.php';
    }

    public function delete($id)
    {
        Client::delete($id);
        $_SESSION['success'] = 'Client deleted successfully';
        header('Location: ' . BASE_PATH . '/clients');
        return;
    }
}

?>