<header>

    <div class="container">
        <a href="./" style="display: block">
            <img src="./../../img/log_blog.png" alt="logo" class="header-logo">
        </a>

        <div class="center">
            <p>
                <a href='./index.php'> <?
                if(isset($_COOKIE['id_user'])) {
                    echo $_COOKIE['id_user'];
                }
                else if(isset($_COOKIE['id_admin'])){
                    echo $_COOKIE['id_admin'];
                };
                ?> </a>
            </p>
        </div>
        


        <?php
        if (!empty($_COOKIE['id_user']) || !empty($_COOKIE['id_admin'])) {

            ?>
            <form action="./../../../php/logout.php" method="GET">
                <input type="submit" class="logout" value="ВЫХОД">
            </form>
            <?php
        }
        ?>
    </div>

</header>