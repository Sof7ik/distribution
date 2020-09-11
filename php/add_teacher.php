<?php 

require_once './connection.php';

$teacherName = $_POST['teacherName'];
$teacherEmail = $_POST['teacherEmail'];
$teacherPassword = $_POST['teacherPassword'];
$teacherProfiles = $_POST['teacherProfile'];
$teacherCategory = $_POST['teacherCategory'];

$checkTeacher = mysqli_query($link, 
"SELECT `id_teacher` FROM `teachers` WHERE `fio` = '$teacherName'");

if (mysqli_num_rows($checkTeacher) == 0) {

    $pass = password_hash($teacherPassword, PASSWORD_DEFAULT);

    $query = mysqli_query($link, 
    "INSERT INTO `teachers`
    (`id_teacher`, 
    `fio`, 
    `id_category`,
    `email`, 
    `password`, 
    `id_role`) 
    VALUES (NULL, '$teacherName', $teacherCategory, '$teacherEmail', '$pass', 2)");

    foreach ($teacherProfiles as $index => $profile) {
        mysqli_query(
            $link, 
            "INSERT INTO `teacher-profile`
            VALUES (
                (SELECT id_teacher FROM teachers ORDER BY id_teacher DESC LIMIT 1), 
                $profile)"
        );
    }

} else {
    echo 'Такой преподаватель уже есть! Проверьте правильность введенных данных!';
}

if($query) {
    header('Location: ./../../pages/admin/add_teacher.php');
} else {
    echo "Ошибка добавления пользователя " . mysqli_error($link);
}

?>