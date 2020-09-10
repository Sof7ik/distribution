<?php if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); } ?>

<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='keywords' content=' '/>
    <meta name='description' content=' '/>
    <meta name='owner' content='bychkov.l47@mail.ru'/>
    <meta name='author' lang='ru' content='ItWebteam <bychkov.l47@mail.ru>'/>
    <meta http-equiv='content-type' content='text/html'; />
    <meta name='resource-type' content='Document'/>
    <meta name='robots' content='noindex,nofollow'/>
    <meta http-equiv='content-language' content='ru'/>
    <meta http-equiv='pragma' content='no-cache'/>

    <title>Добавить преподавателя</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/header.php'; ?>

    <main>

        <?php include './includes/nav.php'; ?>

        <section>
            <h2>Добавить нового преподавателя</h2>

            <form action="./../../php/add_teacher.php" method="POST" class="add">
                
                <label for="">Фамилия Имя Отчество</label>
                <br>
                <input type="text" name="teacherName" class="add_input" required>
                <br>

                <label for="">Email</label>
                <br>
                <input type="email" name="teacherEmail" class="add_input" required>
                <br>

                <label for="">Пароль</label>
                <br>
                <input type="text" name="teacherPassword" class="add_input" required>
                <br>

                <input type="submit" value="Добавить">

            </form>
        </section>
    </main>
</body>
</html>