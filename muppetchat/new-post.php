<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <?php include_once 'nav.php';?>

    <div class="new-post-content">
        <h1>Create Post</h1>
        <form class="new-post-form" action="new-post-action.php" method="get">
            <input name="post-title" class="post-title" type="text" placeholder="Title" required>
            <textarea name="post-content" id="post-content" required placeholder="Write your post here! You can use HTML to format how you want."></textarea>
            <input class="post-submit" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>