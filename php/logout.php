<?php

setcookie(
    'id_user',
    '',
    time() - 60 * 60 * 24 * 5,
    '/',
    $_SERVER['SERVER_NAME'],
    false,
    true
);

setcookie(
    'id_admin',
    '',
    time() - 60 * 60 * 24 * 5,
    '/',
    $_SERVER['SERVER_NAME'],
    false,
    true
);
header('Location: ./../../index.php');