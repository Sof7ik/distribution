<aside class="menu">

    <a href="./" style="display: flex">
        <img src="./../../img/log_blog.png" alt="logo" class="header-logo">
    </a>

    <nav>
        <a href="./allsubjects.php">Все предметы</a>
        <a href="./allteachers.php">Все преподаватели</a>
    </nav>
    
    <?php
        if (!empty($_COOKIE['id_user']) || !empty($_COOKIE['id_admin'])) {

            ?>
            <form action="./../../../php/logout.php" method="GET">
                <input type="submit" class="logout" value="ВЫХОД">
            </form>
            <?php
        }
    ?>


</aside>