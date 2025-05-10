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

    public static function create($user_id, $client_id, $title, $due_date, $status, $description)
    {
        $db = Database::connect();
        $stmt = $db->prepare('INSERT INTO projects (client_id, user_id, title, description, status, due_date, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())');
        $stmt->execute([$client_id, $user_id, $title, $description, $status, $due_date]);
    }

    public static function find($user_id, $id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM projects WHERE id = ? AND user_id = ?');
        $stmt->execute([$id, $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $client, $title, $due_date, $status, $description)
    {
        $db = Database::connect();
        $stmt = $db->prepare('UPDATE projects SET client_id = ?, title = ?, due_date = ?, status = ?, description = ?, updated_at = NOW() WHERE id = ?');
        $stmt->execute([$client, $title, $due_date, $status, $description, $id]);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM projects WHERE id = ?');
        $stmt->execute([$id]);
    }

    public static function getStatuses()
    {
        return [
            'open' => 'Open',
            'in_progress' => 'In Progress',
            'on_hold' => 'On Hold',
            'completed' => 'Completed',
            'finalized' => 'Finalized',
            'cancelled' => 'Cancelled',
        ];
    }
}

?>