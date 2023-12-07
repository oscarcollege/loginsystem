<?php
include_once 'db.php';
include_once 'users.php';

$email = $_GET['email'];
$username = $_GET['username'];
$password = $_GET['password'];

$user = new User(connect(), $email, $username, $password);

$user->authenticate();

header('Location: index.php');
?>