<?php
require_once 'classes/Post.php';
require_once 'classes/User.php';
require_once 'classes/Category.php';

$post = new Post();
$user = new User();
$category = new Category();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post->create($_POST['user_id'], $_POST['category_id'], $_POST['title'], $_POST['content']);
    header('Location: index.php');
    exit;
}

$users = $user->getAll();
$categories = $category->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer post</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn home">Retour à l'accueil</a>
        <h2>Créer un nouvel article</h2>
        <form method="POST">
            <label>Titre:</label><br>
            <input type="text" name="title" required><br>

            <label>Contenu:</label><br>
            <textarea name="content" required></textarea><br>

            <label>Auteur:</label><br>
            <select name="user_id" required>
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['username']) ?></option>
                <?php endforeach; ?>
            </select><br>

            <label>Catégorie:</label><br>
            <div class="category-selection">
                <select name="category_id" required>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <a href="create-category.php" class="btn category-btn">+</a>
            </div><br>

            <div class="form-actions">

                <input type="submit" value="Publier" class="send-btn">
            </div>

        </form>
    </div>
</body>

</html>