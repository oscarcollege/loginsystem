<?php
include_once 'db.php';
include_once 'user-class.php';

$email = $_GET['email'];
$password = $_GET['password'];

$username = get_user_by_email($email, 'username')['username'];

$user = new User(connect(), $email, $username, $password);

$user->authenticate();

header('Location: index.php');
?>