<?php
require_once 'classes/Comment.php';
$comment = new Comment();
$comment->delete($_GET['id']);
header('Location: post.php?id=' . $_GET['post_id']);
exit;
