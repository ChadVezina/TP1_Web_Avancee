<?php
require_once 'Db.php';

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function create($user_id, $category_id, $title, $content)
    {
        $stmt = $this->db->prepare("INSERT INTO posts (user_id, category_id, title, content) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $category_id, $title, $content]);
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT posts.*, users.username, categories.name AS category FROM posts
                                        JOIN users ON posts.user_id=users.id
                                        LEFT JOIN categories ON posts.category_id=categories.id
                                        ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllWithDetails()
    {
        $stmt = $this->db->prepare("SELECT posts.*, users.username, categories.name AS category FROM posts 
                                        JOIN users ON posts.user_id = users.id 
                                        JOIN categories ON posts.category_id = categories.id 
                                        ORDER BY posts.created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT posts.*, users.username, categories.name AS category 
                               FROM posts 
                               JOIN users ON posts.user_id = users.id 
                               LEFT JOIN categories ON posts.category_id = categories.id 
                               WHERE posts.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content, $user_id, $category_id)
    {
        $stmt = $this->db->prepare("UPDATE posts SET title = ?, content = ?, user_id = ?, category_id = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $user_id, $category_id, $id]);
    }


    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM comments WHERE post_id = ?");
        $stmt->execute([$id]);

        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
