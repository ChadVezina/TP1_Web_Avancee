<?php
require_once 'classes/Post.php';

$post = new Post();
$post->delete($_GET['id']);
header('Location: index.php');
exit;