
<?php if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); } 

require_once './../../php/connection.php';

$profileNames = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM `profiles`;"));

?>

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

    <title>Добавить новый профиль</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    
    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>
        
        <section>
            <h2>Добавить новый профиль</h2>

            <form action="./../../php/add_profile.php" method="POST" class="add">
                
                <label for="">Название профиля</label>
                <input type="text" name="profileName" class="add_input" required>

                <input type="submit" value="Добавить профиль">

            </form>
        </section>
    </main>
</body>
</html>