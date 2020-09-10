<?php

if (isset($_COOKIE['id_user'])) 
{
    header('Location: ./../pages/lk/index.php');
}
else if (isset($_COOKIE['id_admin']))
{
    header('Location: ./../pages/admin/index.php');
}
else
{
    header('Location: ./../authorization.php');
}
