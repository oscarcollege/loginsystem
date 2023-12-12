<?php
include_once "user-class.php";
include_once "db.php";
include_once "post-class.php";

$conn = connect();

$user = $_SESSION['user'];
$user_id = $user->get_id();

$content = $_GET['post-content'];

$post = new Post($conn, $user_id, $content, '');

$post->add_to_db();

header('Location: posts-list.php');

?>