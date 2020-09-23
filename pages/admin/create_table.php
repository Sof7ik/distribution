<?php

if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); }

require_once './../../php/connection.php';

$subjects = mysqli_fetch_all(
    mysqli_query(
        $link,
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
            `group-subject`.`id_group` = `groups`.`id_group` AND 
            `group-subject`.`id_subject`= `subjects`.`id_subject` AND 
            `subjects`.`id_profile`= `profiles`.`id_profile`
        ORDER BY
            `groups`.`id_group`;"
    ),
    MYSQLI_ASSOC
);

$teachers = mysqli_fetch_all(
    mysqli_query(
        $link,
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
            `teacher-profile`.`id_profile` = `profiles`.`id_profile`;"
    ),
    MYSQLI_ASSOC
);

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
            $total =
            [
                [
                    'fio' => '',
                    'subjects' => [
                    ],
                    'hours' => 00
                ]
            ];

            foreach ($subjects as $key => $subject)
            {
                echo "<br>";
                echo "-----------Foreach subjects";

                foreach ($teachers as $index => $teacher)
                {
                    echo "<br>";
                    echo "--Foreach teachers";

                    if($teacher['id_profile'] === $subject['id_profile'])
                    {
                        echo "<br>";
                        echo "-----------Профили совпали";
                        echo "<br>";
                        echo "<br>";
                        echo "Предмет <b>" . $subject['subject_name'] . "</b> с профилем <b>" . $subject['profile_name'] . "</b> группы <b>" . $subject['id_group'] . "</b> достался <b>" . $teacher['fio'] . "</b> с профилем <b>" . $teacher['profile_name'] . "</b>";

                        $isInArray = false;
                        $teacherPosInArray = 0;

                        foreach ($total as $k => $group)
                        {
                            echo "<br>";
                            echo 'total index = ' . $k;
                            echo "<br>";
                            if ($total[$k]['fio'] === $teacher['fio'])
                            {
                                $isInArray = true;
                                    $teacherPosInArray = $k;
                            }
                        }

                        if ($isInArray)
                        {
                            echo "Препод в массиве total совпал на " . $k . " итерации";

                            array_push(
                                $total[$teacherPosInArray]['subjects'],
                                [$subject['subject_name'], $subject['id_group'], $subject['subject_hours']]
                            );

                            echo "<br>";
                            echo "-_-_-_-_-_-_-_-_-_-";
                            echo "<br>";
                            break;
                        }
                        else 
                        {
                            echo "Препод в массиве total не совпал, суем новый супермассив";

                            array_push(
                                $total,
                                [
                                    'fio' => $teacher['fio'],
                                    'subjects' => [
                                        [$subject['subject_name'], $subject['id_group'], $subject['subject_hours']]
                                    ]
                                ]
                            );

                            echo "<br>";
                            echo "-_-_-_-_-_-_-_-_-_-";
                            echo "<br>";
                            break;
                        }
                        
                        break;
                    }
                }
            }

            foreach($total as $n => $prepod)
            {
                $sum = 0;
                foreach($prepod['subjects'] as $j => $subject)
                {
                    $sum += $subject[2];
                }
                $total[$n]['hours'] = $sum;
            }

            echo "<pre>";
                print_r($total);
            echo "</pre>";
 
        ?>

    </main>

</body>
</html>