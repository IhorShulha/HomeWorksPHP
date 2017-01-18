<?php
//Запускаем сессию
session_start();
$formEnable = 0;
// Переключатель для вывода строки "последние просмотренные новости"
$cookieForm = 0;
// Массив в котором будут две последние новости сохранынные в кукисах
$cookieUrl = array();
// Прописуем путь к файлу с новостями и открываем его
const FILE_NAME = "news.txt";
$news = unserialize(file_get_contents(FILE_NAME));

// Проверяем есть ли куки с просмотренными новостями
if (@isset($_COOKIE['lastUrl'])) {
    $data = explode("|", $_COOKIE['lastUrl']); // Разбиваем переменную в кукисах на массив
    $cookieUrl = array_splice($data, -2); // Считываем два последних элемента
    $cookieForm = 1;
}

// Подключаем файлик с авторизацией
require_once "auth.php";

?>
<html>
<head>
    <title>Новости нашего портала!</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
</head>
<body>

<div id="container">
    <div id="header">
<p>Тут будет шапка</p>
    </div>

    <div id="navigation">
<a href="index.php">Main</a> | <a href="#">Abaout US</a> | <a href="#">Contacts</a>
    </div>

    <div id="content">

        <?php
        // Выводим новости
        if ($formEnable != 0) {

            echo "<h2>Новости:</h2>";
            foreach ($news as $key) {
                echo "<ul>";
                echo "<li><a href='view.php?newsId=" . $key['id'] . "'>" . $key['title'] . "</a></li>";
                echo "</ul>";
            }
            // Выводим последние две страницы
            if ($cookieForm != 0) {
                echo "<br /><br /><br /><br />";
                echo "<strong>Последние просмотренные новости</strong>: <br />" . $cookieUrl[0] . "<br />" . $cookieUrl[1];
            }

        } else {

            ?>



            <?php

        }

        ?>
    </div>

    <div id="right-menu">

        <?php

        // Если авторизация не пройдена, выводим форму
        if ($formEnable == 0) {

            ?>
            <div id="auth">
                <b>Ввойти</b>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Введите Ваш логин:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="login"></td>
                        </tr>
                        <tr>
                            <td>Введите Ваш пароль:</td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="auth"><input type="submit" value="Войти"><br/><br/></td>
                        </tr>
                    </table>
                </form>
            </div>

            <?php

        } else {

                ?>

                <div>
                    Вы авторизованы как <strong><?= $_SESSION['login']; ?></strong>! <br/><br/>
                    <a href="addnews.php">Добавить новость</a> <br/>
                    <a href="index.php?exit">Выйти</a>
                </div>

                <?php

        }

        ?>

    </div>

    <div id="clear">
    </div>
</div>

</body>
</html>
