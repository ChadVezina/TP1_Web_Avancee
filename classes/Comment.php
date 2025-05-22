<?php
require_once 'Db.php';

class Comment {
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function create($post_id, $user_id, $content) {
        $stmt = $this->db->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
        return $stmt->execute([$post_id, $user_id, $content]);
    }

    public function getByPost($post_id) {
        $stmt = $this->db->prepare("SELECT comments.*, users.username FROM comments 
                                    LEFT JOIN users ON comments.user_id = users.id 
                                    WHERE post_id = ? ORDER BY created_at DESC");
        $stmt->execute([$post_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}