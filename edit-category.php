<?php
require_once 'classes/Category.php';
$category = new Category();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category->update($_POST['id'], $_POST['name']);
    header('Location: index.php');
    exit;
}

$c = $category->getById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier categorie</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form method="POST">
            <input type="hidden" name="id" value="<?= $c['id'] ?>">
            <label>Nom de la catégorie:</label><br>
            <input type="text" name="name" value="<?= htmlspecialchars($c['name']) ?>" required><br>
            <input type="submit" value="Mettre à jour la catégorie">
        </form>
    </div>
</body>

</html>