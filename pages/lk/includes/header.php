<header>

    <div class="container">

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

    </div>

    <hr>
    
</header>