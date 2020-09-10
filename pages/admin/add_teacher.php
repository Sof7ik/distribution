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

    <title>Добавить преподавателя</title>

    <link rel='stylesheet' href='./../../styles/style.css'>

    <script src='' defer></script>
</head>
<body>

    <?php include './includes/header.php'; ?>

    <main>

        <?php include './includes/nav.php'; ?>

        <section>
            <h2>Добавить нового преподавателя</h2>

            <form action="./../../php/add_teacher.php" method="POST" class="add">
                
                <label for="">Фамилия Имя Отчество</label>
                <input type="text" name="teacherName" class="add_input" required>
                <br>

                <label for="">Email</label>
                <input type="email" name="teacherEmail" class="add_input" required>
                <br>

                <label for="">Пароль</label>
                <input type="text" name="teacherPassword" class="add_input" required>
                <br>

                <div class="subjectProfile">

                    <label for="">Выберите профиль преподавателя</label>

                    <select type="email" name="teacherProfile" class="add_input" required>
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

                <input type="submit" value="Добавить" class="add_button">

            </form>
        </section>
    </main>
</body>
</html>