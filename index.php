<?php
require_once 'database.php';
require_once 'formGenerator.php';

$tableName = "";
$conn = getDbConnection();

generateForm($tableName, $conn);

$conn->close();

