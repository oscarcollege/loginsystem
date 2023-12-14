<?php
include_once 'db.php';

$conn = connect();

$post = get_post_by_id($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
</head>
<body>
    <?php include_once 'nav.php'?>

    <div class="content">
        <div class="big-post">
            <div class="big-post-title">
                <?=$post['title']?>
            </div>
            <div class="big-post-info">
            </div>
            <div class="big-post-content">
                <?=$post['content']?>
            </div>
        </div>
    </div>
</body>
</html>