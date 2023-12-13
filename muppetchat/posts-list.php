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
            <div class="post">
                <?=$row['content']?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>