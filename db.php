<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test-login';

$connection = mysqli_connect($hostname, $username, $password, $dbname) or die('database connection not established');

?>