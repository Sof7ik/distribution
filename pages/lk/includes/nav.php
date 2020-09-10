<aside class="menu">

    <a href="./" style="display: flex">
        <img src="./../../img/log_blog.png" alt="logo" class="header-logo">
    </a>

    <nav>
        <a href="./allsubjects.php">Все предметы</a>
        <a href="./allteachers.php">Все преподаватели</a>
    </nav>
    
    <?php

        if (isset($_COOKIE['id_admin']))
        {
            echo "<a    style='text-align: center; padding-right: 25px; font-size: 14px; text-transform: uppercase' 
                        href='./../admin/index.php'>Режим редактирования</a>";
        }

        if (isset($_COOKIE['id_user']) || isset($_COOKIE['id_admin'])) {

            ?>
            <form action="./../../../php/logout.php" method="GET">
                <input type="submit" class="logout" value="ВЫХОД">
            </form>
            <?php
        }
    ?>


</aside>