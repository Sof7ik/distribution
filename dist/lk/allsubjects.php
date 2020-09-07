<?php

    if (!isset($_COOKIE['user'])) {
        header('Location: ./../../../index.php');
    }
    require_once './../../dev/scripts/php/connection.php';

    $result = mysqli_query($link, 
    "SELECT 
    `subjects`.`id_subject`, 
    `subjects`.`subject_name`, 
    `subjects`.`subject_desc`, 
    `subjects`.`subject_hours`,
    `profiles`.`profile_name`
        
        FROM 
        `subjects`, 
        `profiles` 

    WHERE `subjects`.`id_profile` = `profiles`.`id_profile`;");

    $subjects = mysqli_fetch_all($result);

    // echo "<pre>";
    // print_r($subjects);
    // echo "</pre>";
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

    <title>Все предметы</title>

    <link rel='stylesheet' href='./../style.min.css'>

    <script src='' defer></script>
</head>
<body>

    <header>    
        <img src="./../../img/log_blog.png" alt="logo" class="header-logo">

        <p>
            <?
                echo json_decode($_COOKIE['user']);
            ?>
        </p>
        <?
            if (isset($_COOKIE['user'])) {
                
                ?>
                    <button class="logout">ВЫХОД</button>
                <?
            }
        ?>
    </header>

    <div class='container'>

        <section class="all-subjects">

        <?
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
                <?
            }
        ?>

        </section>

    </div>
</body>
</html>

