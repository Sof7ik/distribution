<?php

require_once __DIR__ . './connection.php';

$id = $_POST['id'];
$subjects = json_decode($_POST['subjects']);

$query = "DELETE FROM `group-subject` WHERE `group-subject`.`id_group` = $id;";

foreach ($subjects as $subject)
{
    $query .= "INSERT INTO `group-subject` (`id_group`, `id_subject`) VALUES ('$id', '$subject');";
}


if (mysqli_multi_query($link, $query)) 
{
    do 
    {
        if ($result = mysqli_store_result($link)) 
        {
            while ($row = mysqli_fetch_row($result)) 
            {
                
            }
            mysqli_free_result($result);
        }
        
        if (mysqli_more_results($link)) 
        {
            
        }
    } 
    while (mysqli_next_result($link));
}
else
{
    echo json_encode('error');
}

mysqli_close($link);
echo json_encode('done');