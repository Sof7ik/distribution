<?php 

require_once './connection.php';

$teacherName = $_POST['teacherName'];
$teacherEmail = $_POST['teacherEmail'];
$teacherPassword = $_POST['teacherPassword'];

$checkTeacher = mysqli_query($link, 
"SELECT `id_teacher` FROM `teachers` WHERE `fio` = '$teacherName'");

if (mysqli_num_rows($checkTeacher) == 0) {

    $pass = password_hash($teacherPassword, PASSWORD_DEFAULT);
    echo $pass;

    $query = mysqli_query($link, 
    "INSERT INTO `teachers`
    (`id_teacher`, 
    `fio`, 
    `email`, 
    `password`, 
    `id_role`) 
    VALUES (NULL, '$teacherName', '$teacherEmail', '$pass', 2)");
} else {
    echo 'Такой преподаватель уже есть! Проверьте правильность введенных данных!';
}

if($query) {
    // header('Location: ./../../../../dist/admin/add/add_teacher.php');
}

?>