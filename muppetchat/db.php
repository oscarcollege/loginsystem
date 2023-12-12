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
    return $result;
}

?>