<?php
require_once 'classes/Post.php';
require_once 'classes/User.php';
require_once 'classes/Category.php';

$post = new Post();
$user = new User();
$category = new Category();

$p = $post->getById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post->update($_POST['id'], $_POST['title'], $_POST['content'], $_POST['user_id'], $_POST['category_id']);
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
    <title>Modifier post</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn home">Retour à l'accueil</a>
        <h2>Modifier l'article</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">

            <label>Titre:</label><br>
            <input type="text" name="title" value="<?= htmlspecialchars($p['title']) ?>" required><br>

            <label>Contenu:</label><br>
            <textarea name="content" required><?= htmlspecialchars($p['content']) ?></textarea><br>

            <label>Auteur:</label><br>
            <select name="user_id" required>
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>" <?= $u['id'] == $p['user_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($u['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Catégorie:</label><br>
            <select name="category_id" required>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= $c['id'] ?>" <?= $c['id'] == $p['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <input type="submit" value="Mettre à jour" class="send-btn">
        </form>
    </div>
</body>

</html>