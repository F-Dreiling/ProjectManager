<?php
class LoginController
{
    public function index()
    {
        require_once __DIR__ . '/../views/login/index.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = Database::connect();
            $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                Auth::login($user);
                header('Location: ' . BASE_PATH . '/');
                exit;
            } 
            else {
                $_SESSION['error'] = 'Invalid credentials';
                header('Location: ' . BASE_PATH . '/login');
                exit;
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        header('Location: ' . BASE_PATH . '/login');
        exit;
    }
}

?>