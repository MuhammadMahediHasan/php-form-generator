<?php
require_once 'database.php';
require_once 'formGenerator.php';

$tableName = "users";
$conn = getDbConnection();

generateForm($tableName, $conn);

$conn->close();

