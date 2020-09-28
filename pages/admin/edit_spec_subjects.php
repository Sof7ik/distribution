<?php
if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); }

require_once './../../php/connection.php';

$idSpec = $_GET['id'];

$resultSbjc = mysqli_query($link, 
"SELECT
    `subjects`.`id_subject`,
    `subjects`.`subject_name`,
    `subjects`.`subject_desc`,
    `subjects`.`subject_hours`,
    `specializations`.`specialization_name`
FROM
    `subject-specialization`,
    `subjects`,
    `specializations`
WHERE
    `subjects`.`id_subject` = `subject-specialization`.`id_subject` 
AND 
    `subject-specialization`.`id_specialization` = `specializations`.`id_specialization` 
AND 
    `subject-specialization`.`id_specialization` = '$idSpec';");

$resultSpecs = mysqli_query($link, 
"SELECT 
`subjects`.`id_subject`,
`subjects`.`subject_name`,
`subjects`.`subject_desc`,
`subjects`.`subject_hours`
FROM
`subjects`
WHERE `subjects`.`id_subject` NOT IN(
SELECT
`id_subject`
FROM
`subject-specialization`
WHERE
`id_specialization` = '$idSpec')
ORDER BY `subject_name`;");

$subjects = mysqli_fetch_all($resultSbjc);
$specs = mysqli_fetch_all($resultSpecs);

$isEmpty = false;

if (count($specs) == 0)
{
    $isEmpty = true;
}

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

    <title> Распределить специальность </title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='./../../js/lib/Sortable.min.js' defer></script>
    <script src='./../../js/spec-subjects.js' defer></script>
    <script src='./../../js/search-subjects.js' defer></script>
</head>
<body>

    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>

        <section>
            
            <div style="display: flex; flex-flow: row nowrap; justify-content: space-between; align-items: center">
                <h2>Вы редактируете специальность <?=$idSpec?> </h2>
                
            </div>

            <div class="buttons">
                <a href="./../../php/delete_subjects.php?idSpecToDelete=<?=$idSpec?>" class="clear-subjects-group">Очистить</a>
                <button class="update-subjects-group"> Сохранить </button>
            </div>
            
            <form action="./../../php/search_subjects.php" method="POST">
                <input 
                    type="text" 
                    name="search_subjects" 
                    id="" 
                    class="search-subjects-group" 
                    style="
                        margin: 15px 0; 
                        width: 100%; 
                        letter-spacing: 1px; 
                        padding: 15px 20px; 
                        cursor: text; 
                        font-weight: normal;"
                    placeholder="Введите название предмета">
            </form>
                
            <div class="titles">
                <h3 style="text-align: center; margin-bottom: 15px;" class="not-draggable"> Предметы у группы </h3>
                <h3 style="text-align: center; margin-bottom: 15px;" class="not-draggable"> Все предметы </h3>
            </div>

            <div class="sort-subjects">
                <div class="sort-subjects__group">
                    <?
                        foreach ($subjects as $value)
                        {
                            ?>
                                <p class="subject-name" data-subjectId="<?=$value[0]?>"> <?=$value[1]?> <span> (<?=$value[3]?>ч) </span> </p>
                            <?
                        }
                    ?>
                </div>

                <div class="sort-subjects__all">
                    <?
                        foreach ($specs as $value)
                        {
                            ?>
                                <p class="subject-name" data-subjectId="<?=$value[0]?>" ><?=$value[1]?> <span> (<?=$value[3]?>ч) </span> </p>
                            <?
                        }
                    ?>
                </div>
            </div>

        </section>


            
    </main>
</body>
</html>