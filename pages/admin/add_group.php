<?php
if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); }
    
require_once './../../php/connection.php';

$specNames = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM `specializations`;"));

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

    <title>Добавить новую группу</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/header.php'; ?>

    <main>

        <?php include './includes/nav.php'; ?>

        <section>
            <h2>Добавить новую группу</h2>

            <form action="./../../php/add_group.php" method="POST" class="add">

                <label for="">Номер группы</label>
                <br>
                <input type="text" name="groupCode" class="add_input" value="" id="groupCode" pattern="[0-9]{4}" required >
                <br>

                <label for="">Название специальности</label>
                <br>


                <select name="specName" class="add_input" required>
                <option></option>
                <?php
                            
                    foreach ($specNames as $specName) {
                        ?>
                            <option value="<?= $specName[0]; ?>"> <?= $specName[0]; ?> - <?= $specName[1]; ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                <br>

                <input type="submit" value="Добавить">

            </form>
        </section>
    </main>

    <script>
                var numberSp = 3;//первая цифра

                var today = new Date();
                var year = today.getFullYear();
                var strYear = String(year);
                var lastCharYear=strYear.charAt(strYear.length-1); //вторая цифра

                var numberSpec = 19; //надо взять список спец

                var numberGroup = numberSp + lastCharYear + numberSpec;
                var Group = Number(numberGroup) //номер группы
                document.querySelector('#groupCode').value = Group
                </script>   
</body>
</html>