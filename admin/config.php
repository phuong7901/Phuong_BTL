<?php
//Create Constants to Store Non Repeating Values
define('HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_quanli');

$conn = mysqli_connect(HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error($conn)); //Database Connection
