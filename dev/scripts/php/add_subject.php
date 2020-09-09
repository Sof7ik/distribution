

<?php 

require_once './connection.php';

$subjectName = $_POST['subjectName'];
$subjectDesc = $_POST['subjectDesc'];
$subjectProfile = $_POST['subjectProfile'];
$subjectHours = $_POST['subjectHours'];

$checkSubject = mysqli_query($link, 
"SELECT `id_subject` FROM `subjects` WHERE `subject_name` = '$subjectName'");

if (mysqli_num_rows($checkSubject) == 0) {

    $query = mysqli_query($link, 
    "INSERT INTO `subjects`
    (`id_subject`, `id_profile`, `subject_name`, `subject_desc`, `subject_hours`) 
    
    VALUES 
    (NULL, $subjectProfile, '$subjectName', '$subjectDesc', $subjectHours)");
} else {
    echo 'Такой предмет уже есть! Проверьте правильность введенных данных!';
}

if($query) {
    header('Location: ./../../../../dist/admin/add/add_teacher.php');
}

?>