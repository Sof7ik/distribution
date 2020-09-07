<?

setcookie(
    'id_user',
    $user['id_teacher'],
    time() - 60 * 60 * 24 * 5,
    '/',
    $_SERVER['SERVER_NAME'],
    false,
    true
);

header('Location: ./../../../../index.php');
?>