<?php
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $user->create($_POST['username'], $_POST['email'], $_POST['password']);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn home">Retour à l'accueil</a>
        <form method="POST">
            <label>Nom d'utilisateur:</label><br>
            <input type="text" name="username" required><br>
            <label>Email:</label><br>
            <input type="email" name="email" required><br>
            <label>Mot de passe:</label><br>
            <input type="password" name="password" required><br>
            <input type="submit" value="Créer l'utilisateur" class="send-btn">
        </form>
    </div>
</body>

</html>