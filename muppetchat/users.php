<?php
include_once 'db.php';

#$conn = connect();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class User {
    private $email;
    private $username;
    private $password;
    private $password_hash;
    private $token;
    private $authenticated = false;

    function __construct($conn, $email, $username, $password) {
        $this->email = mysqli_real_escape_string($conn, $email);
        $this->username = mysqli_real_escape_string($conn, $username);
        $this->password = mysqli_real_escape_string($conn, $password);

        $this->token = md5(rand().time());
        $this->password_hash = password_hash($password, PASSWORD_BCRYPT);

        $this->connection = $conn;
    }

    function authenticate() {
        $db_entry = get_user_by_email($this->email);

        if (password_verify($this->password, $db_entry['password'])) {
            $_SESSION['user'] = $this;
        } else {
            throw new Exception('passwords dont match');
        }
    }

    function add_to_db() {
        $sql = "INSERT INTO users (email, username, password, token, is_active) VALUES ('{$this->email}', '{$this->username}', '{$this->password_hash}', '{$this->token}', '0')";
        $query = $this->connection->query($sql);
    }

    function get_username() {
        return $this->username;
    }
}

?>