<?php
include_once 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Post {
    private $uploader_id;
    private $date_uploaded;
    private $title;
    private $content;
    private $tags;
    private $score;
    private $messages;

    function __construct($conn, $uploader_id, $title, $content, $tags) {
        $this->uploader_id = $uploader_id;
        $this->date_uploaded = time();
        $this->title = mysqli_real_escape_string($conn, $title);
        $this->content = mysqli_real_escape_string($conn, $content);
        $this->tags = mysqli_real_escape_string($conn, $tags);
        $this->score = 0;
        $this->messages = "";

        $this->connection = $conn;
    }

    function add_to_db() {
        $sql = "INSERT INTO posts 
        (`title`,
        `content`, 
        `unix time uploaded`, 
        `tags json`, 
        `uploader id`, 
        `score`, 
        `messages json`)
        VALUES
        ('{$this->title}',
        '{$this->content}',
        '{$this->date_uploaded}',
        '{$this->tags}',
        '{$this->uploader_id}',
        '{$this->score}',
        '{$this->messages}')";

        $query = $this->connection->query($sql);
    }
}

function vote_up() {}

?>