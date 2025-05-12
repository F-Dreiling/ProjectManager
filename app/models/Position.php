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
}

?>