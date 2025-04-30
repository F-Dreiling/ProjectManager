<?php

class Client
{
    public static function all($user_id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM clients WHERE user_id = ?');
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function latest($user_id, $limit = 5)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM clients WHERE user_id = ? ORDER BY created_at DESC LIMIT ?');
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($user_id, $name, $contact, $email, $phone, $company, $notes)
    {
        $db = Database::connect();
        $stmt = $db->prepare('INSERT INTO clients (user_id, name, email, phone, contact, company, notes, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())');
        $stmt->execute([$user_id, $name, $email, $phone, $contact, $company, $notes]);
    }

    public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM clients WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $name, $email)
    {
        $db = Database::connect();
        $stmt = $db->prepare('UPDATE clients SET name = ?, email = ?, updated_at = NOW() WHERE id = ?');
        $stmt->execute([$name, $email, $id]);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM clients WHERE id = ?');
        $stmt->execute([$id]);
    }
}

?>