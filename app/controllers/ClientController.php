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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];

            Client::create($name, $email);
            $_SESSION['success'] = 'Client created successfully';
            header('Location: ' . BASE_PATH . '/clients');
            return;
        }

        require_once __DIR__ . '/../views/clients/create.php';
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
        header('Location: ' . BASE_PATH . '/clients');
        return;
    }
}

?>