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

    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>

        <section>
            <h2>Добавить новую группу</h2>

            <form action="./../../php/add_group.php" method="POST" class="add">

                <label for="">Название специальности</label>
                <select name="specName" class="add_input" id="selectSpec" required>
                    <option></option> 
                    <?php
                            
                        foreach ($specNames as $specName) {
                            if(strlen($specName[2]) == 1)
                            {
                                $specCode = "0" . $specName[2];
                            }
                            else if (strlen($specName[2]) == 2)
                            {
                                $specCode = $specName[2];
                            }
                            else
                            {
                                $specCode = $specName[2];
                            }
                            
                            ?>
                                <option 
                                    data-id="<?=$specCode; ?>" value="<?= $specName[0]; ?>"> <?= $specName[0]; ?> - <?= $specName[1]; ?> </option>
                            <?php
                        }
                    ?>
                </select>

                <div class="br"></div>

                <label for="">Номер группы</label>
                <input type="text" name="groupCode" class="add_input" value="" id="groupCode" required >

                <input type="submit" value="Добавить">

                <!-- pattern="[0-9]{4}" -->

            </form>
        </section>
    </main>

    <script>
            function renderGroupNumber (e) {
                console.log('changed');
                let numberSp = 3;//первая цифра
                let year = String(new Date().getFullYear());
                let lastCharYear=year.charAt(year.length-1); //вторая цифра
                let numberSpec = e.target.options[e.target.options.selectedIndex].dataset.id

                document.getElementById('groupCode').value = numberSp + lastCharYear + numberSpec;
            }

            document.querySelector('#selectSpec').addEventListener('input', renderGroupNumber);    
    </script>   
</body>
</html>

<!-- const numberSp = 3;//первая цифра

                let year = String(new Date().getFullYear());
                let lastCharYear=strYear.charAt(strYear.length-1); //вторая цифра

                let numberSpec = 1; //надо взять список спец

                let numberGroup = numberSp + lastCharYear + numberSpec;
                
                document.getElementById('groupCode').value = numberGroup; -->