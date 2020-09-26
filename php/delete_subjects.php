<?php
require_once './connection.php';

if(isset($_GET['idSpecToDelete']))
{
    $id = $_GET['idSpecToDelete'];
    $query = "DELETE FROM `subject-specialization` WHERE `id_specialization` = '$id';";
}
else if(isset($_GET['idGroupToDelete']))
{
    $id = $_GET['idGroupToDelete'];
    $query = "DELETE FROM `group-subject` WHERE `id_group` = '$id';";
}

$result = mysqli_query($link, $query);

if($result && isset($_GET['idSpecToDelete'])) 
{
    header('Location: ./../../pages/admin/edit_spec_subjects.php?id='. $id);
}
else if($result && isset($_GET['idGroupToDelete']))
{
    header('Location: ./../../pages/admin/edit_group_subjects.php?id='. $id);
}
else
{
    echo "Ошибка очистки предметов";
    echo mysqli_error($link);
}
?>
