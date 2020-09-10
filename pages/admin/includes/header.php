<header>
    
    <div class="container">
        <a href="./" style="display: block">
            <img src="./../../img/log_blog.png" alt="logo" class="header-logo">
        </a>
        
        <p>
            <a href='./index.php'><?=$_COOKIE['id_admin']?></a>
        </p>

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
