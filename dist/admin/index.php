<?php
if (empty($_COOKIE['id_admin'])) {
    header('Location: ./../../../index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
</head>
<body>
    <a href="/">Добавить группу</a>
    <a href="/">Добавить профиль, в котором ещё предметы там...</a>
    <a href="/">Добавить специальность</a>
    <a href="/">Добавить предмет</a>
    <a href="/">Добавить учителя</a>

    <br>
    <br>
    <br>
    <br>

    <a href="./../lk/lk.php">В личный кабинет</a>
</body>
</html>