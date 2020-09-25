<?php

require_once __DIR__ . './connection.php';

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

$total = [];
// $total =
// [
//     [
//         'fio' => '',
//         'subjects' => [
//         ],
//         'hours' => 00
//     ]
// ];

foreach ($subjects as $key => $subject)
{
    //echo "<br>";
    //echo "-----------Foreach subjects";

    foreach ($teachers as $index => $teacher)
    {
        // echo "<br>";
        // echo "--Foreach teachers";

        if($teacher['id_profile'] === $subject['id_profile'])
        {
            // echo "<br>";
            // echo "-----------Профили совпали";
            // echo "<br>";
            // echo "<br>";
            // echo "Предмет <b>" . $subject['subject_name'] . "</b> с профилем <b>" . $subject['profile_name'] . "</b> группы <b>" . $subject['id_group'] . "</b> достался <b>" . $teacher['fio'] . "</b> с профилем <b>" . $teacher['profile_name'] . "</b>";

            $isInArray = false;
            $teacherPosInArray = 0;

            foreach ($total as $k => $group)
            {
                // echo "<br>";
                // echo 'total index = ' . $k;
                // echo "<br>";
                if ($total[$k]['fio'] === $teacher['fio'])
                {
                    $isInArray = true;
                        $teacherPosInArray = $k;
                }
            }

            if ($isInArray)
            {
                // echo "Препод в массиве total совпал на " . $k . " итерации";

                array_push(
                    $total[$teacherPosInArray]['subjects'],
                    [$subject['subject_name'], $subject['id_group'], $subject['subject_hours']]
                );

                // echo "<br>";
                // echo "-_-_-_-_-_-_-_-_-_-";
                // echo "<br>";
                break;
            }
            else 
            {
                // echo "Препод в массиве total не совпал, суем новый супермассив";

                array_push(
                    $total,
                    [
                        'fio' => $teacher['fio'],
                        'subjects' => [
                            [$subject['subject_name'], $subject['id_group'], $subject['subject_hours']]
                        ]
                    ]
                );

                // echo "<br>";
                // echo "-_-_-_-_-_-_-_-_-_-";
                // echo "<br>";
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
