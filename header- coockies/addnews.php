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
// Подключаем файлик с авторизацией
require_once "auth.php";


if (isset($_POST['saveNews'])) {

    // Инициализация переменных для удобства
    $id = 1;
    $title = $_POST['title'];
    $author = $_SESSION['login'];
    $content = $_POST['content'];

    if (is_array($news)) {
        foreach ($news as $key) {
            if (isset($key['id'])) {
                $id = $key['id'] + 1;
            }
        }
    } else {
        $news = []; // Делаем массив
    }

    // Вставляем в наш массив данные полученные из формы
    array_push($news, ["id"=>$id, "author"=>$author, "title"=>$title, "date"=>$date, "content"=>$content]);
    file_put_contents(FILE_NAME, serialize($news)); // Сохраняем в файл наш сериализованный массив

    echo "Новость созданна";

}

?>
<html>
<head>
    <title>Добавление новости</title>
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

        // Если авторизация успешна - выводим форму добавления новостей
        if ($formEnable != 0) {

            if (!isset($_SESSION['login'])) {
                $_SESSION['login'] = $_SESSION['user']['last_name'] . " " . $_SESSION['user']['first_name'];
            }

            ?>

            <h2 name="top">Добавить новость</h2>
            <form action="addnews.php" method="post">
                <table>
                    <tr>
                        <td>Автор:</td><td><b><?=$_SESSION['login'];?></b></td>
                    </tr>
                    <tr>
                        <td>Название новости:</td><td><input type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td>Дата:</td><td><input type="text" disabled name="date" value="<?=$dt;?>"></td>
                    </tr>
                    <tr>
                        <td valign="top">Текст новости:</td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea rows="15" cols="100" required name="content" maxlength="1000"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Отправить"><input type="hidden" name="saveNews"></td>
                    </tr>
                </table>

            </form>

            <?php

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
                <b>Форма авторизации</b>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Ваш логин</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="login"></td>
                        </tr>
                        <tr>
                            <td>Ваш пароль</td>
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
                Вы авторизованы как <strong><?=$_SESSION['login'];?></strong>! <br /><br />
                <a href="addnews.php">Добавить новость</a> <br />
                <a href="index.php?exit">Выйти</a>
            </div>

            <?php

        }

        ?>

    </div>
</div>

</body>
</html>
