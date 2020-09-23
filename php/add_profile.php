<?php 

require_once './connection.php';

$profileName = $_POST['profileName'];

$checkProfile = mysqli_query($link,
"SELECT `id_profile` FROM `profiles` WHERE `id_profile` = '$profileName'");

if (mysqli_num_rows($checkProfile) == 0) {

    $query = mysqli_query($link, 
    "INSERT INTO `profiles` 
    (`id_profile`, `profile_name`) 
    VALUES 
    (NULL,'$profileName');");

} else {
    echo 'Такой профиль уже есть!';
}

if($query) {
    header('Location: ./../../pages/admin/add_profile.php');
}