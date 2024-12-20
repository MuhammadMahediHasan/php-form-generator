<?php

$serverName = "127.0.0.1";
$userName = "root";
$password = "";
$dbName = "";

function getDbConnection() {
    global $serverName, $userName, $password, $dbName;
    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

