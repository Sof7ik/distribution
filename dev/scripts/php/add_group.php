<?php 

require_once './connection.php';

$groupCode = $_POST['groupCode'];
$specName = $_POST['specName'];


$checkGroup = mysqli_query($link, 
"SELECT `id_group` FROM `groups` WHERE `id_group` = '$specName'");

if (mysqli_num_rows($checkGroup) == 0) {

    $query = mysqli_query($link, 
    "INSERT INTO `groups` 
    (`id_group`, `id_specialization`) 
    VALUES 
    ('$groupCode', '$specName');");
} else {
    echo 'Такая группа уже есть! Проверьте правильность введенных данных!'; //не повляется
}

if($query) {
    header('Location: ./../../../../dist/admin/add/add_group.php');
}



?>