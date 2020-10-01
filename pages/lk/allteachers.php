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
    
    `teachers`.`id_category` = `categories`.`id_category`
    
    ORDER BY `teachers`.`id_teacher`

    ;");

    $teachers = mysqli_fetch_all($result);
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
</head>
<body>

    <?php include './includes/nav.php'; ?>
    
    <main>

        <?php include './includes/header.php'; ?>

        <?php
            if(!$teachers)
            {
                echo "<h3 class='empty'> Преподавателей нет </h3>";
            }
        ?>

        <?php
            if ($_COOKIE['id_admin'])
            {
                echo "<div class='buttons'>";
                echo "  <a href='./../admin/add_teacher.php' class='update-subjects-group' style='margin-left: 35px'> Добавить преподавателя </a>";
                echo "</div>";
            }
        ?>

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

                        <?php
                            if(isset($_COOKIE['id_admin']) && ($teacher[1] !== $_COOKIE['id_admin']))
                            {?>
                                <button class="removeSubject" id="removeTeacher">
                                    <span class="material-icons">
                                        person_remove
                                    </span>
                                </button>
                            <?}
                        ?>

                    </div>
                    <?
                }
            ?>

        </section>

    </main>
    <script defer>  
        document.querySelectorAll('button.removeSubject').forEach((elem, id, array) => {
            elem.addEventListener('click', (event) => {
                event.preventDefault();

                let teacherId = event.target.parentElement.parentElement.dataset.subjectid;
                console.log('teacherId: ', teacherId);
                let teacher = event.target.parentElement.parentElement.childNodes[1].childNodes[3].textContent;
                console.log('teacher: ', teacher);

                let confirmation = prompt(`Вы действительно хотите удалить преподавателя ${teacher}? 

Если да, введите 'Да'`);
                if(confirmation === 'Да')
                {
                    console.log('Совпало');
                    fetch(`./../../php/delete/deleteTeacher.php?teacherId="${teacherId}"`)
                    .then(res => res.text())
                    .then(res => {
                        console.log(res)
                        document.location.reload();
                    })
                    
                }
                
            })
        })
    </script>

</body>
</html>