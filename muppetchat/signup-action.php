<?php
include_once 'db.php';
include_once 'users.php';

$conn = connect();

$email = $_GET['email'];
$username = $_GET['username'];
$password = $_GET['password'];

$user = new User($conn, $email, $username, $password);

$user->add_to_db();

$user->authenticate();

header('Location: index.php');

?>