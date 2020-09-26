<?php

require_once './connection.php';

$subjectName = $_POST['search_subjects'];

$subjects = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM `subjects` WHERE `subject_name` LIKE '%$subjectName%';"), MYSQLI_ASSOC);

echo "<pre>";
    print_r($subjects);
echo "</pre>";
?>