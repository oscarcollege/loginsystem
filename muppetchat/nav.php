<?php
include_once 'users.php';
include_once 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$output = get_user_session();
$user = $output[0];
$logged_in = $output[1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <nav>
        <?php if ($logged_in == true): ?>
            <div><?=$user->get_username();?></div>
            <div><a href="signout.php">Sign Out</a></div>
        <?php else: ?>
            <div><a href="signup.php">Sign Up</a></div>
            <div><a href="signin.php">Sign In</a></div>
        <?php endif; ?>
    </nav>
</body>
</html>