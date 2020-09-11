<?php
require_once __DIR__ . './connection.php';

$profiles = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM `profiles`;"));
echo json_encode($profiles, JSON_UNESCAPED_UNICODE);
?>