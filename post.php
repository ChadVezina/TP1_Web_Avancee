<?php
require_once 'classes/Post.php';
require_once 'classes/Comment.php';
require_once 'classes/User.php';

$post = new Post();
$comment = new Comment();
$user = new User();

$p = $post->getById($_GET['id']);
$comments = $comment->getByPost($_GET['id']);
$users = $user->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment->create($_POST['post_id'], $_POST['user_id'], $_POST['content']);
    header("Location: post.php?id=" . $_POST['post_id']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article: <?= htmlspecialchars($p['title']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn home">Retour à l'accueil</a>
        <h2><?= htmlspecialchars($p['title']) ?></h2>
        <p><strong>Par <?= htmlspecialchars($p['username']) ?></strong> dans <em><?= htmlspecialchars($p['category']) ?></em> le <?= $p['created_at'] ?></p>
        <p><?= nl2br(htmlspecialchars($p['content'])) ?></p>

        <hr>
        <h3>Commentaires</h3>
        <?php foreach ($comments as $c): ?>
            <div>
                <p><strong><?= htmlspecialchars($c['username']) ?>:</strong> <?= htmlspecialchars($c['content']) ?></p>
                <small><?= $c['created_at'] ?></small>
            </div>
        <?php endforeach; ?>

        <hr>
        <h4>Ajouter un commentaire</h4>
        <form method="POST">
            <input type="hidden" name="post_id" value="<?= $p['id'] ?>">
            <label>Utilisateur:</label><br>
            <select name="user_id">
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['username']) ?></option>
                <?php endforeach; ?>
            </select><br>
            <label>Commentaire:</label><br>
            <textarea name="content" required></textarea><br>
            <input type="submit" value="Publier le commentaire" class="send-btn">
        </form>
    </div>

</body>

</html>