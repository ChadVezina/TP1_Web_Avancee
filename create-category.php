<?php
require_once 'classes/Category.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = new Category();
    $category->create($_POST['name']);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer categorie</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn home">Retour à l'accueil</a>
        <form method="POST">
            <label>Nom de la catégorie:</label><br>
            <input type="text" name="name" required><br>
            <input type="submit" value="Créer la catégorie" class="send-btn">
        </form>
    </div>
</body>

</html>