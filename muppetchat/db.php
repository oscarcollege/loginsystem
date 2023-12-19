<?php

function connect() {
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'test-login';

    $conn = new mysqli($hostname, $username, $password, $dbname) or die('database connection not established');

    return $conn;
}

function get_user_session() {
    $user = NULL;

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $logged_in = true;
    } else {
        $logged_in = false;
    }

    return array($user, $logged_in);
}

function get_user_by_email($email, $selection) {
    $conn = connect();

    $query = "SELECT {$selection} FROM users WHERE email = '{$email}'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        throw new Exception('either no account with email or more than 1 account with email');
    }
}

function get_all_posts() {
    $conn = connect();

    $query = "SELECT * FROM posts ORDER BY `unix time uploaded` DESC";
    $result = $conn->query($query);
    return $result;
}

function get_posts_from_user($uploader_id) {
    $conn = connect();

    $query = "SELECT * FROM posts WHERE `uploader id` = ? ORDER BY `unix time uploaded` DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $uploader_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_assoc();
}

function get_post_by_id($id) {
    $conn = connect();

    $query = "SELECT * FROM posts WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}

function id_to_username($id) {
    $conn = connect();

    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }
    $result = $stmt->get_result();

    return $result->fetch_assoc()['username'];
}

function add_post_view($id) {
    $conn = connect();

    $query = "SELECT * FROM posts WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $views = $row['views'];
    $new_views = $views + 1;

    $sql = "UPDATE posts SET views = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $new_views, $id);
    $stmt->execute();
}

?>