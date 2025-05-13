<?php

class Position
{
    public static function all($project_id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM positions WHERE project_id = ?');
        $stmt->execute([$project_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($project_id, $title, $description, $hours, $rate)
    {
        $db = Database::connect();
        $stmt = $db->prepare('INSERT INTO positions (project_id, title, description, hours, rate) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$project_id, $title, $description, $hours, $rate]);
    }

    public static function deleteByProject($project_id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM positions WHERE project_id = ?');
        $stmt->execute([$project_id]);
    }
}

?>