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
        <a class="nav-title" href="index.php">Mup Pet Chat</a>
        <?php if ($logged_in == true): ?>
            <a class="nav-element nav-button" href="profile.php"><?=$user->get_username();?></a>
            <a class="nav-button nav-element" href="signout.php">Sign Out</a>
            <a class="nav-button nav-element" href="new-post.php">Post</a>
        <?php else: ?>
            <a class="nav-button nav-element" href="signup.php">Sign Up</a>
            <a class="nav-button nav-element" href="signin.php">Sign In</a>
        <?php endif; ?>
        <a class="nav-element nav-button" href="tags-list.php">Tags</a>
        <a class="nav-element nav-button" href="posts-list.php">All Posts</a>
    </nav>
</body>
</html>