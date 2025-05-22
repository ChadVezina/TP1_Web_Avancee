<?php
require_once 'classes/Category.php';
$category = new Category();
$category->delete($_GET['id']);
header('Location: index.php');
exit;
