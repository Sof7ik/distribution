<?php 

    require_once './../connection.php';

    $teacherID = $_GET['teacherId'];

    echo $teacherID;

    $delete = mysqli_query($link,
    "DELETE FROM `teachers` WHERE `id_teacher` = $teacherID");
?>