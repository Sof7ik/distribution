<?php
if (empty($_COOKIE['id_admin'])) {
    header('Location: ./../../../../index.php');
}
require_once './../../../dev/scripts/php/list_specialization.php';

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

    <title>Добавить новую группу</title>

    <link rel='stylesheet' href='./../../style.min.css'>

    <script src='' defer></script>
</head>
<body>
    <header>
        <div class="container">
            <a href="./" style="display: block">
                <img src="./../../../img/log_blog.png" alt="logo" class="header-logo">
            </a>
            
            <p>
                <?php
                    if (isset($_COOKIE['id_user'])) {
                        ?>
                        <a href='./../../lk/index.php'><?=$_COOKIE['id_user']?></a>
                        <?php
                    } else if (isset($_COOKIE['id_admin'])) {
                        ?>
                        <a href='./../../admin/index.php'><?=$_COOKIE['id_admin']?></a>
                        <?php
                    }
                ?>
            </p>

            <?php
                if (!empty($_COOKIE['id_user']) || !empty($_COOKIE['id_admin'])) {
                    
                    ?>
                        <form action="./../../dev/scripts/php/logout.php" method="GET">
                            <input type="submit" class="logout" value="ВЫХОД">
                        </form>
                    <?php
                }
            ?>
        </div>
        
    </header>

    <main>
        <aside class="menu">
            <nav>
                <a href="./add_group.php">Добавить группу</a>
                <a href="./add_profile.php">Добавить профиль, в котором ещё предметы там...</a>
                <a href="./add_specialization.php">Добавить специальность</a>
                <a href="./add_subject.php">Добавить предмет</a>
                <a href="./add_teacher.php">Добавить учителя</a>
            </nav>
        </aside>

        <section>
            <p>Добавить новую группу</p>

            <form action="./../../../dev/scripts/php/add_group.php" method="POST">
                
                <label for="">Номер группы</label>
                <br>
                <input type="text" name="groupName" required>
                <br>

                <label for="">Название специальности</label>
                <br>
                    <select name="specCode">
                        <?php while ($listSpec = mysqli_fetch_assoc($resListSpec)) { 
                        ?>
                    <option  value="<?= $listSpec['id_specialization'];?>">
                    <?= $listSpec['id_specialization'];?> - <?= $listSpec['specialization_name'];?>
                    </option>
                        <?php } ?>
                <br>
                <br>
                <input type="submit" value="Добавить">

            </form>
        </section>
    </main>
</body>
</html>