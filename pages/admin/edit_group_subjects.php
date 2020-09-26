<?php
if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); }

require_once './../../php/connection.php';

$idGroup = $_GET['id'];
$idSpec = mysqli_fetch_assoc(mysqli_query($link, "SELECT `id_specialization` FROM `groups` WHERE `groups`.`id_group` = '$idGroup'"))['id_specialization'];

$resultG = mysqli_query($link, 
"SELECT 
    `subjects`.`id_subject`, 
    `subjects`.`subject_name`, 
    `subjects`.`subject_desc`, 
    `subjects`.`subject_hours`,
    `profiles`.`profile_name` 
FROM 
    `group-subject`,
    `subjects`, 
    `profiles` 
WHERE 
    `subjects`.`id_subject` = `group-subject`.`id_subject`
AND
    `subjects`.`id_profile` = `profiles`.`id_profile`
AND
    `id_group` = '$idGroup';");

$resultS = mysqli_query($link, 
"SELECT
    `subjects`.`id_subject`,
    `subjects`.`subject_name`,
    `subjects`.`subject_desc`,
    `subjects`.`subject_hours`,
    `profiles`.`profile_name`
FROM
    `subjects`,
    `profiles`,
    `subject-specialization`
WHERE
    `subject-specialization`.`id_specialization` = '$idSpec'
AND

    `subjects`.`id_subject` = `subject-specialization`.`id_subject` 
AND 
    `subject-specialization`.`id_specialization` = '$idSpec'
AND

    `subjects`.`id_profile` = `profiles`.`id_profile` 
AND 
    `subjects`.`id_subject` NOT IN(
                                        SELECT
                                            `id_subject`
                                        FROM
                                            `group-subject`
                                        WHERE
                                            `id_group` = '$idGroup')
ORDER BY `subjects`.`subject_name`");

$groups = mysqli_fetch_all($resultG);
$subjects = mysqli_fetch_all($resultS);

$isEmpty = false;

if (count($groups) == 0)
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

    <title>Распределить предметы группы</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='./../../js/lib/Sortable.min.js' defer></script>
    <script src='./../../js/group-subjects.js' defer></script>
</head>
<body>

    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>

        <section>
            
            <div style="display: flex; flex-flow: row nowrap; justify-content: space-between; align-items: center">
                <h2>Вы редактируете группу <?=$idGroup?> </h2>
            </div>


            <div class="buttons">
                <a href="./../../php/delete_subjects.php?idGroupToDelete=<?=$idGroup?>" class="clear-subjects-group">Очистить</a>
                <button class="update-subjects-group"> Сохранить </button>
            </div>

            <form action="./../../php/search_subjects.php" method="POST">
                <input 
                    type="text" 
                    name="search_subjects" 
                    id="" 
                    class="update-subjects-group" 
                    style="
                        margin: 15px 0; 
                        width: 100%; 
                        letter-spacing: 1px; 
                        padding: 15px 20px; 
                        cursor: text; 
                        font-weight: normal;"
                    placeholder="Введите название предмета">
            </form>

            <div class="sort-subjects">
                <div class="sort-subjects__group">

                    

                    <h3 style="text-align: center; margin-bottom: 15px;" class="not-draggable"> Предметы у группы </h3>
                    <?
                        foreach ($groups as $value)
                        {
                            ?>
                                <p class="subject-name" data-subjectId="<?=$value[0]?>"> <?=$value[1]?> <span> (<?=$value[3]?>ч) </span> </p>
                            <?
                        }
                    ?>
                </div>

                <div class="sort-subjects__all">
                    <h3 style="text-align: center; margin-bottom: 15px;" class="not-draggable"> Все предметы </h3>
                    <?
                        foreach ($subjects as $value)
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