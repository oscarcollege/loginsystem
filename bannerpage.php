<?php

include_once "banner.php";

$banner = new Banner('hello ');
$alert = new Alert('alert');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?=$banner?>
    <?=$alert?>
</body>
</html>