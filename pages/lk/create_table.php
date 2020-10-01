<?php

$id = (isset($_COOKIE['id_admin'])) ? $_COOKIE['id_admin'] : $_COOKIE['id_user'];

if (empty($id)) { header('Location: ./../../../index.php'); }
include_once('./../../php/generate_table.php');
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

    <title> Ваша нагрузка </title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='./../../js/downloadExel.js' defer></script>
</head>
<body>

    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>

        <section>
            <h2 style="padding: 15px 0;"> Ваша нагрузка </h2>

            <div class="workload_teacher">
                <p class="heading"> ФИО препода </p>
                <p class="heading"> Предмет </p>
                <p class="heading"> Группа </p>
                <p class="heading"> Часы </p>

                <p class="br"/><p class="br"/><p class="br"/><p class="br"/>

                <?php
                    foreach($total as $tchr)
                    {
                        if ($tchr['fio'] == $id)
                        {
                            $nameIsOut = false;
                            foreach($tchr['subjects'] as $subjs)
                            {
                                echo ($nameIsOut) ? '<p class="tchr"> </p>' : '<p class="tchr">'. $tchr['fio'] .'</p>';
                                $nameIsOut = true;
    
                                foreach($subjs as $s)
                                {
                                    echo '<p class="data">' . $s . '</p>';
                                }
                            }
                            echo '<p class="br"/><p class="br"/><p class="data"> Итого: </p> <p class="data">'.$tchr['hours'].'</p>';
                            echo '<p class="br"/><p class="br"/><p class="br"/><p class="br"/>';
                        }
                        
                    }
                ?>
            </div>

        </section>

    </main>

</body>
</html>