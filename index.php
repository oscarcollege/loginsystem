<?php
include_once 'db.php';
include_once 'user.php';

session_start();

$logged_in = false;
if (isset($_SESSION['user'])) {
    $logged_in = true;
    $user = unserialize($_SESSION['user']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($logged_in): ?>
        <p>hello, <?=$user->email?></p>
        <p>
            <a href="log-out.php">Log out</a>
        </p>
    <?php else: ?>
        <p>
            <a href="log-in.php">log in</a>
        </p>
        <p>
            <a href="sign-up.php">sign up</a>
        </p>
    <?php endif; ?>
</body>
</html>