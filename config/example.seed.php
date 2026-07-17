<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = Database::connect();

$password = 'yourPassword'; 
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$stmt = $db->prepare('INSERT INTO pm_users (name, email, password_hash) VALUES (?, ?, ?)');
$stmt->execute(['Your Name', 'your@email.dev', $passwordHash]);

?>