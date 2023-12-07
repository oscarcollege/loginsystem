<?php

include_once "db.php";
include_once "user.php";

if (! isset($_POST['email'])) {
    header('Location: /');
    exit;
}

$user = new User($connection, $_POST['email'], $_POST['password']);
$user->insert();
var_dump($_POST);

?>