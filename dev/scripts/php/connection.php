<?php
$user = 'root';
$pass = '';
$host = 'localhost';
$dbname = 'distribution';

$link = mysqli_connect($host, $user, $pass, $dbname);

if (!$link) {
    throw new Exception('DB is not connected! Try again later or contact administrator');
}

?>