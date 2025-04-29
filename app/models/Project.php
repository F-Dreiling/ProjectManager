<?php

class Project
{
    public static function all($user_id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM projects WHERE user_id = ?');
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function latest($user_id, $limit = 5)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM projects WHERE user_id = ? ORDER BY created_at DESC LIMIT ?');
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($title, $description)
    {
        $db = Database::connect();
        $stmt = $db->prepare('INSERT INTO projects (title, description, created_at, updated_at) VALUES (?, ?, NOW(), NOW())');
        $stmt->execute([$title, $description]);
    }

    public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM projects WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $title, $description)
    {
        $db = Database::connect();
        $stmt = $db->prepare('UPDATE projects SET title = ?, description = ?, updated_at = NOW() WHERE id = ?');
        $stmt->execute([$title, $description, $id]);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM projects WHERE id = ?');
        $stmt->execute([$id]);
    }
}

?>