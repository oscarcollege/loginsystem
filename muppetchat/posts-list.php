<?php
include_once "db.php";

$conn = connect();

$posts = get_all_posts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>
    <?php include_once 'nav.php'; ?>

    <div class="content">
        <?php while ($row=$posts->fetch_array(MYSQLI_ASSOC)): ?>
            <div class="post" onclick="window.location.href='view-post.php?id=<?=$row['id']?>'">
                <div class="post-header">
                    <span class="post-uploader"><?=id_to_username($row['uploader id'])?></span>
                    <span>views: <?=$row['views']?></span>
                    <span class="post-date"><?=gmdate("d/m/Y H:i", $row['unix time uploaded'])?></span>
                </div>
                <div class="post-body">
                    <?=$row['title']?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>