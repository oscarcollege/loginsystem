<?php
include_once 'db.php';

$conn = connect();

$post = get_post_by_id($_GET['id']);

add_post_view($_GET['id']);

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
                <span><?=$post['title']?></span>
            </div>
            <div class="big-post-info">
                <span>by: <?=id_to_username($post['uploader id'])?></span>
                <span><?=gmdate("d/m/Y", $post['unix time uploaded'])?></span>
                <!--<span>$post['tags json']?></span>-->
                <span><?=$post['views']?> views</span>
                <span>
                    <img src="https://cdn-icons-png.flaticon.com/512/8213/8213544.png" alt="vote up icon" height="10rem">
                    <span><?=$post['score']?></span>
                    <img src="https://cdn-icons-png.flaticon.com/512/8213/8213544.png" alt="vote down icon" height="10rem" style="transform: rotate(180deg);">
                </span>
            </div>
            <div class="big-post-content">
                <span><?=$post['content']?></span>
            </div>
        </div>
    </div>
</body>
</html>