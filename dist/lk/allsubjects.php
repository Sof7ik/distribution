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

    <title>Все предметы</title>

    <link rel='stylesheet' href='./../style.min.css'>

    <script src='' defer></script>
</head>
<body>

    <header>    
        <img src="./../../img/log_blog.png" alt="logo" class="header-logo">

        <button class="logout">ВЫХОД</button>
    </header>

    <div class='container'>

        <section class="all-subjects">

        <?php
            require_once './../../dev/scripts/php/connection.php';

            $result = mysqli_query($link, 
            "SELECT 
            id_subject, 
            `subject`.`name`, 
            `subject`.descripton, 
            `subject`.`hours`,
             `profile`.`name` 
             
             FROM 
             `subject`, 
             `profile`, 
             `specialization`

            WHERE `subject`.`id_profile` = `profile`.`id_profile` AND 
            `subject`.`id_specialization` = `specialization`.`id_specialization`");

            $subjects = mysqli_fetch_all($result);

            foreach ($subjects as $value)
            {
                ?>
                <div class="subject-wrapper" data-subjectId="<?=$value[0]?>">

                    <div>
                        <p class="subject-profile"><?=$value[4]?></p>

                        <p class="subject-name"><?=$value[1]?></p>

                        <p class="subject-desc"><?=$value[2]?></p>
                    </div>

                    <p class="subject-hours"><?=$value[3]?> ч.</p>

                </div>
                <?php
            }
        ?>

        </section>

    </div>
</body>
</html>