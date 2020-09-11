<?php 

require_once 'connection.php';


$resListSpec = mysqli_query($link, 
"SELECT `id_specialization`, `specialization_name` FROM `specializations`");

?>