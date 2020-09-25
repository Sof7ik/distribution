<?php 

require_once './connection.php';

$email = $_POST['login'];
$password = $_POST['password'];

$query = mysqli_query($link, "SELECT * FROM `teachers` WHERE `email` = '$email';");

$count = mysqli_num_rows($query);

if ($count == 1) {

    $user = mysqli_fetch_assoc($query);

    if (password_verify($password, $user['password'])) {
        if ($user['id_role'] == 1) {
            setcookie(
                'id_admin',
                $user['fio'],
                time() + 60 * 60 * 24 * 5,
                '/',
                $_SERVER['SERVER_NAME'],
                false,
                true
            );
            header('Location: ./../../pages/admin/index.php');
        } else if ($user['id_role'] == 2) {
            setcookie(
                'id_user',
                $user['fio'],
                time() + 60 * 60 * 24 * 5,
                '/',
                $_SERVER['SERVER_NAME'],
                false,
                true
            );
            header('Location: ./../../pages/lk/index.php');
        }
    }

    else {
        echo "Пароли не совпадают";
    }

}
