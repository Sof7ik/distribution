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

    <title>Админ-панель</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/header.php'; ?>

    <!-- <div class='container'> -->
        
        <main>

            <?php include './includes/nav.php'; ?>

            <section>
                <p>Добро пожаловать в админку</p>
            </section>
        </main>
        
    <!-- </div> -->

</body>
</html>