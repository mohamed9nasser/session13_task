<?php
require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    header("Location: views/landing.php");
    exit();
} else {
    echo "Connection failed!";
}




