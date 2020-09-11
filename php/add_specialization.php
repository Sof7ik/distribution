<?php 

require_once './connection.php';

$specCode = $_POST['specCode'];
$specName = $_POST['specName'];

$checkSpec = mysqli_query($link, 
"SELECT 
`id_specialization` 

FROM `specializations`

WHERE 

`id_specialization` = '$specCode'");

if (mysqli_num_rows($checkSpec) == 0) {
    $query = mysqli_query($link, "INSERT INTO `specializations`(`id_specialization`, `specialization_name`) VALUES ('$specCode', '$specName')");
} else {
    echo 'Такой код специальности уже есть! Проверьте правильность введенных данных!';
}

if($query) {
    header('Location: ./../../pages/admin/add_specialization.php');
}
