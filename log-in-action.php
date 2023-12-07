<?php

include_once 'db.php';
include_once 'user.php';

$user = new User($connection, $_POST['email'], $_POST['password']);
$user->authenticate();

if ($user->is_logged_in()) {
    session_start();
    $_SESSION['user'] = serialize($user);

    header('Location: index.php');
} else {
    echo "email or password is wrong";
}

?>