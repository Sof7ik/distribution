<?
if (isset($_COOKIE['id_user'])) {
    header('Location: ./dist/lk/lk.php');
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

    <title>Штука какая-то</title>

    <link rel='stylesheet' href='./dist/style.min.css'>

    <script src='./dist/main.min.js' defer></script>
</head>
<body>
    <header>

        <div class="container">
            <a href="./" style="display: block">
                <img src="./img/log_blog.png" alt="logo" class="header-logo">
            </a>
            
            <?
                if (isset($_COOKIE['id_user'])) {
                    ?>
                        <button class="logout" id="logout-button">ВЫХОД</button>
                    <?
                }
            ?>
        </div>
        
    </header>
    <div class='container'>
        <form action="./dev/scripts/php/login.php" method="POST" id="login-form">

            <div class="login-wrapper">
                <label for="login-email" class="login-labels">Логин</label>
                <input type="email" placeholder="Введите свой E-mail" id="login-email" class="login-input" name="login">
            </div>
            
            <div class="login-wrapper">
                <label for="login-pass" class="login-labels">Пароль</label>
                <input type="text" placeholder="Введите свой пароль" id="login-pass" class="login-input" name="password">
            </div>

            <input type="submit" id="login" class="login" value="ВОЙТИ">

        </form>
        
    </div>
</body>
</html>