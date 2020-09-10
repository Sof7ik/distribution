<?php

    if (empty($_COOKIE['id_user']) && empty($_COOKIE['id_admin'])) {
        header('Location: ./../../../index.php');
    }
    require_once './../../php/connection.php';

    $result = mysqli_query($link, 
    "SELECT 
    `teachers`.`id_teacher`, 
    `teachers`.`fio`, 
    `categories`.`category_name`

    FROM 
    
    `teachers`, 
    `categories`
    
    WHERE 
    
    `teachers`.`id_category` = `categories`.`id_category`;");

    $teachers = mysqli_fetch_all($result);

    // echo "<pre>";
    // print_r($teachers);
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

    <title>Все преподаватели</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/nav.php'; ?>
    
    <main>

        <?php include './includes/header.php'; ?>

        <section class="all-subjects">

            <?
                foreach ($teachers as $teacher)
                {

                    $profiles = mysqli_fetch_all(mysqli_query($link, "SELECT
                    `profile_name`

                    FROM
                    `profiles`,
                    `teacher-profile`,
                    `teachers`

                    WHERE
                    `teachers`.`id_teacher` = $teacher[0] AND
                    `teacher-profile`.`id_teacher` = `teachers`.`id_teacher` AND 
                    `teacher-profile`.`id_profile` = `profiles`.`id_profile`;"));

                    ?>
                    <div class="subject-wrapper" data-subjectId="<?=$teacher[0]?>">

                        <div>
                            <p class="subject-profile">
                                <?

                                    foreach ($profiles as $index => $profile) {

                                        if ($index !== count($profiles) - 1) {
                                            echo $profile[0] . ', ';
                                        }
                                        else {
                                            echo $profile[0];
                                        }

                                    }

                                ?>
                            </p>

                            <p class="subject-name"><?=$teacher[1]?></p>

                            <p class="subject-desc"><?=$teacher[2]?></p>
                        </div>

                    </div>
                    <?
                }
            ?>

        </section>

    </main>
    
</body>
</html>