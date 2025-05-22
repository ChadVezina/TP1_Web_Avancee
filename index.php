<?php
require_once 'classes/Post.php';
require_once 'classes/User.php';
require_once 'classes/Category.php';

$post = new Post();
$posts = $post->getAllWithDetails();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1 - My-Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Bienvenue sur TP1 - My-Blog</h1>
        <div class="create-block">
            <a href="create-user.php" class="btn">Créer un utilisateur</a>
            <a href="create-post.php" class="btn">Créer un article</a>
            <a href="create-category.php" class="btn">Créer une catégorie</a>
        </div>
        <hr>

        <?php foreach ($posts as $p): ?>
            <div>
                <h3><?= htmlspecialchars($p['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars(substr($p['content'], 0, 100))) ?></p>
                <p>
                    Par <strong><?= htmlspecialchars($p['username']) ?></strong>
                    dans <em><?= htmlspecialchars($p['category']) ?></em>
                    le <?= $p['created_at'] ?>
                </p>
                <a href="post.php?id=<?= $p['id'] ?>" class="btn read">Lire</a> |
                <a href="edit-post.php?id=<?= $p['id'] ?>" class="btn edit">Modifier</a> |
                <a href="delete-post.php?id=<?= $p['id'] ?>" onclick="return confirm('Supprimer ?')" class="btn delete">Supprimer</a>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
</body>

</html>