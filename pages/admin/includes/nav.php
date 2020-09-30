<aside class="menu">

    <a href="./" style="display: flex" class="logo-wrapper">
        <img src="./../../img/log_blog.png" alt="logo" class="header-logo">
    </a>

    <nav>
        <a href="./add_specialization.php">Добавить специальность</a>
        <a href="./add_group.php">Добавить группу</a>
        <a href="./add_profile.php">Добавить профиль</a> 
        <a href="./add_subject.php">Добавить предмет</a>
        <a href="./add_teacher.php">Добавить учителя</a>

        <br>
        <br>

        <a href="./all_specs.php">Распределить предметы по специальностям</a>
        <a href="./allgroups.php">Распределить предметы по группам</a>

        <br>
        <br>
        
        <a href="./create_table.php">Сформировать таблицу преподавательской нагрузки</a>

    </nav>

    <?php

        if (isset($_COOKIE['id_admin']))
        {
            echo "<a    style='text-align: center; padding-right: 25px; font-size: 14px; text-transform: uppercase' 
                        href='./../lk/index.php'>Режим просмотра</a>";
        }

        if (!empty($_COOKIE['id_user']) || !empty($_COOKIE['id_admin'])) {

            ?>
            <form action="./../../../php/logout.php" method="GET">
                <input type="submit" class="logout" value="ВЫХОД">
            </form>
            <?php
        }
    ?>

</aside>
