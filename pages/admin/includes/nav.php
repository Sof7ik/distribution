<aside class="menu">

    <a href="./" style="display: flex">
        <img src="./../../img/log_blog.png" alt="logo" class="header-logo">
    </a>

    <nav>
        <a href="./add_group.php">Добавить группу</a>
        <a href="./add_profile.php">Добавить профиль, в котором ещё предметы там...</a>
        <a href="./add_specialization.php">Добавить специальность</a>
        <a href="./add_subject.php">Добавить предмет</a>
        <a href="./add_teacher.php">Добавить учителя</a>
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
