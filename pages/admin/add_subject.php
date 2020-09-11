<?php
if (empty($_COOKIE['id_admin'])) { header('Location: ./../../../index.php'); }

require_once './../../php/connection.php';

$profiles = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM `profiles`;"));
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

    <title>Добавить предмет</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/nav.php'; ?>

    <main>

        <?php include './includes/header.php'; ?>

        <section>
            <h2>Добавить новый предмет</h2>

            <form action="./../../php/add_subject.php" method="POST" class="add">

                <div class="subjectNameDescWrapper">
                    <div class="subjectName">
                        <label for="">Введите название предмета</label>
                        <textarea name="subjectName" id="" class="add_input" required></textarea>
                    </div>
                    <div class="br"></div>

                    <div class="subjectDesc">
                        <label for="">Введите описание предмета</label>
                        <textarea name="subjectDesc" id="" class="add_input"></textarea>
                    </div>
                    <div class="br"></div>
                </div>

                
                <div class="subjectProfile">
                    <label for="">Выберите профиль предмета</label>
                    <select type="email" name="subjectProfile" class="add_input" required>
                        <option></option>
                        <?php
                            foreach ($profiles as $profile) {
                                ?>
                                    <option value="<?php echo $profile[0]; ?>"> <?php echo $profile[1]; ?> </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="br"></div>

                <div class="subjectHours">
                    <label for="">Введите часы предмета</label>
                    <input type="number" name="subjectHours" class="add_input" required>
                </div>

                <input type="submit" value="Добавить" class="add_button">

            </form>
        </section>
    </main>
</body>
</html>