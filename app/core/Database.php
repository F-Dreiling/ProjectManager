<?php

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $config = require __DIR__ . '/../../config/config.php';
        $db = $config['db'];

        try {
            $dsn = "mysql:host={$db['host']};port={$db['port']};dbname={$db['database']};charset={$db['charset']}";
            
            $this->pdo = new PDO($dsn, $db['username'], $db['password'], 
                // Deactivate this when many users want to use the app or if DB server is on same host as the app
                [ PDO::ATTR_PERSISTENT => true ]
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public static function connect()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance->pdo;
    }
}

?>