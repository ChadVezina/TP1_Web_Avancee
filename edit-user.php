<?php
require_once 'classes/User.php';
$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->update($_POST['id'], $_POST['username'], $_POST['email']);
    header('Location: index.php');
    exit;
}

$u = $user->getById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form method="POST">
            <input type="hidden" name="id" value="<?= $u['id'] ?>">
            <label>Nom d'utilisateur:</label><br>
            <input type="text" name="username" value="<?= htmlspecialchars($u['username']) ?>" required><br>
            <label>Email:</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($u['email']) ?>" required><br>
            <input type="submit" value="Mettre à jour l'utilisateur">
        </form>
    </div>
</body>

</html>