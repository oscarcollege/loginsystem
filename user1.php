<?php

class User {
    public $email = '';
    public $password = '';
    public $password_hash = '';
    public $token = '';
    public $authenticated = false;
    private $connection;

    // assuming the email and password are unsafe
    function __construct($connection, $email, $password) {
        $this->email = mysqli_real_escape_string($connection, $email);
        $this->password = mysqli_real_escape_string($connection, $password);

        $this->token = md5(rand().time());
        $this->password_hash = password_hash($password, PASSWORD_BCRYPT);

        $this->connection = $connection;
    }

    function authenticate() {
        $sql = "
            SELECT id, email, password, token, is_active
            FROM users
            WHERE email='{$this->email}';
        ";

        $result = $this->connection->query($sql);
        if ($row = $result->fetch_assoc()) {
            if (password_verify($this->password, $row['password'])) {
                $this->authenticated = true;
            }
        }
    }

    function is_logged_in() {
        return $this->authenticated;
    }

    function insert() {
        $sql = "
        INSERT INTO users (
            email,
            password,
            token,
            is_active
        ) VALUES (
            '{$this->email}',
            '{$this->password_hash}',
            '{$this->token}',
            '0'
        )
        ";

        $sqlQuery = $this->connection->query($sql);

        if (!$sqlQuery) {
            die('MySQL query failed' . mysqli_error($this->connection));
        }
    }
}

?>