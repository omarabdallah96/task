<?php

$username = "root";
$password = "";
$host = "localhost";

$database = "task";

$mysqli = new mysqli("localhost", $username, $password, $database);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
