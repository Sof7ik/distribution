<?php

if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); }

require_once './../../php/connection.php';

$subjects = mysqli_fetch_all(mysqli_query($link, 
"SELECT 
    `groups`.`id_group`, 
    `subjects`.`subject_name`, 
    `subjects`.`subject_hours`, 
    `profiles`.`profile_name`, 
    `profiles`.`id_profile` 
FROM 
    `groups`, 
    `subjects`, 
    `group-subject`, 
    `profiles` 
WHERE 
    `group-subject`.`id_group` = groups.`id_group` AND 
    `group-subject`.`id_subject`= subjects.`id_subject` AND 
    `subjects`.`id_profile`= profiles.id_profile
ORDER BY
    `groups`.`id_group`;
"));

$teachers = mysqli_fetch_all(mysqli_query($link, 
"SELECT
    `teachers`.`id_teacher`,
    `fio`,
    `profiles`.`id_profile`,
    `profile_name`
FROM
    `teachers`,
    `profiles`,
    `teacher-profile`
WHERE
    `teachers`.id_teacher = `teacher-profile`.`id_teacher` AND
    `teacher-profile`.`id_profile` = `profiles`.`id_profile`;"))

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

    <title>Сформировать таблицу нагрузки</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>

        <div style="display: flex; flex-flow: row nowrap;">

            <section>
                <?php
                
                    echo "<pre>";
                        print_r($subjects);
                    echo "</pre>";

                ?>
            </section>

            <section>
                <?php
                
                    echo "<pre>";
                        print_r($teachers);
                    echo "</pre>";

                ?>
            </section>

        </div>

        <?php
            $total = [ [ '', [] ] ];
            // $total = 
            // [
            //     [
            //         '3007', 
            //         [
            //             ['prepod', 'predmet', 'hours'],
            //             ['prepod', 'predmet', 'hours']
            //         ]
            //     ]
            // ];

            // array_push(
            //     $total[0][1], 
            //     ['Овсепян Вардуи Робертовна', 'Физика', 80]
            // );

            foreach ($subjects as $index => $subject) {
                foreach($teachers as $key => $teacher) {
                    if($subject[4] === $teacher[2])
                    {
                        if ($total[$index][0] == $subject[0])
                        {
                            echo "<br>";
                            echo "Группа совпала, запихиваем новую запись";
                            echo "<br>";
                            echo 'Предмет ' . $subjects[$index][1] . ' у группы ' . $subjects[$index][0];
                            echo "<br>";
                            // array_push(
                            //     $total[$index][2], 
                            //     [
                            //         $teacher[1], $subject[1], $subject[2]
                            //     ]
                            // );
                            
                        } 
                        else 
                        {
                            echo "<br>";
                            echo "Группа не совпала, запихиваем новую группу";
                            echo "<br>";
                            echo 'Предмет ' . $subjects[$index][1] . ' у группы ' . $subjects[$index][0];
                            echo "<br>";
                            // array_push(
                            //     $total, 
                            //     [
                            //         $subject[0],
                            //         [
                            //             $teacher[1], $subject[1], $subject[2]
                            //         ]
                            //     ]
                            // );
                        }
                        
                        // echo "<br>";
                        // echo "Группа " . $subject[0];
                        // echo "<br>";
                        // echo $teacher[1] . "; Профиль - " . $teacher[3] . "; Предмет достался - " . $subject[1] . " с профилем " . $subject[3];
                        // echo "<br>";
                    }
                }
            }

            echo "<pre>";
                print_r($total);
            echo "</pre>";

            
        ?>

    </main>

</body>
</html>