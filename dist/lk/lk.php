<?
if (!isset($_COOKIE['id_user'])) {
    header('Location: ./../../../index.php');
}
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

    <title>Личный кабинет</title>

    <link rel='stylesheet' href='./../style.min.css'>

    <script src='' defer></script>
</head>
<body>

    <header>
        <div class="container">
            <a href="./../../index.php" style="display: block">
                <img src="./../../img/log_blog.png" alt="logo" class="header-logo">
            </a>
            
            <p><?=$_COOKIE['id_user'];?></p>

            <?
                if (isset($_COOKIE['id_user'])) {
                    
                    ?>
                        <form action="./../../dev/scripts/php/logout.php" method="GET">
                            <input type="submit" class="logout" value="ВЫХОД">
                        </form>
                    <?
                }
            ?>
        </div>
        
    </header>

    <div class='container'>
        
        <main>
            <aside class="menu">
                <nav>
                    <a href="./allsubjects.php">Все предметы</a>
                    <a href="./allsubjects.php">Все предметы</a>
                    <a href="./allsubjects.php">Все предметы</a>
                    <a href="./allsubjects.php">Все предметы</a>
                    <a href="./allsubjects.php">Все предметы</a>
                    <a href="./allsubjects.php">Все предметы</a>
                </nav>
            </aside>

            <section>
                <p>Добро пожаловать в личный кабинет</p>
            </section>
        </main>
        
    </div>
</body>
</html>