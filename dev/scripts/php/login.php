<?php 

require_once './connection.php';

$email = $_POST['login'];
$password = $_POST['password'];

$query = mysqli_query($link, "SELECT * FROM `teachers` WHERE `email` = '$email' AND `password` = '$password'");

$count = mysqli_num_rows($query);

if ($count == 1) {
    $user = mysqli_fetch_assoc($query);
    setcookie(
        'id_user',
        $user['id_teacher'],
        time() + 60 * 60 * 24 * 5,
        '/',
        $_SERVER['SERVER_NAME'],
        false,
        true
    );
    echo json_encode($user, JSON_UNESCAPED_UNICODE);
}
