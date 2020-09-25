<?php
if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); }
    
require_once './../../php/connection.php';

$result = mysqli_query($link, 
"SELECT 
    * 
FROM 
    `specializations`");

$specs = mysqli_fetch_all($result);

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

    <title>Распределить предметы группы</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>

        <section style="padding-bottom: 0">
            <h2>Выберите специальность </h2>
        </section>
        

            <section class="all-groups">

           

            <?
                foreach ($specs as $value)
                {
                    ?>
                    <a href="./edit_spec_subjects.php?id=<?=$value[0]?>" class="groups-wrapper" data-subjectId="<?=$value[0]?>">

                        <div>

                            <p class="group-profile"><?=$value[1]?></p>

                            <p class="group-name"><?=$value[0]?></p>

                            <p class="group-desc"><?=$value[3]?></p>

                        </div>

                    </a>
                    <?
                }
            ?>

            </section>
            
    </main>

</body>
</html>