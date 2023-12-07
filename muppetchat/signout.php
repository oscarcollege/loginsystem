<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include_once 'users.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <p>are you sure you want to sign out as <?=$_SESSION['user']->get_username();?>?</p>

    <a href="signout-action.php">yes</a>
    <a href="index.php">no</a>
</body>
</html>