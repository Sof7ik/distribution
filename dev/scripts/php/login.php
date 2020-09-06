<?php 

require_once './connection.php';

$login = $_POST['login'];
$pass = $_POST['password'];

$query = mysqli_query($link, "SELECT * from `teacher` WHERE 'email' = $login AND 'password' = $pass;");
if ($query) 
{
    $count = mysqli_num_rows($query);
    if ($count == 1) {
        $user = mysqli_fetch_assoc($query);
        echo json_encode($user);
    }
}

?>