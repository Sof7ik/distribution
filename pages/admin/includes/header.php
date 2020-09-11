<header>

    <div class="container">

        <p>
        <?php
            if (isset($_COOKIE['id_user'])) 
            {
                ?>
                <a href='./index.php'><?=$_COOKIE['id_user']?></a>
                <?php
            } else if (isset($_COOKIE['id_admin'])) 
            {
                ?>
                <a href='./index.php'><?=$_COOKIE['id_admin']?></a>
                <?php
            }
        ?>
        </p>

    </div>

    <hr>
    
</header>