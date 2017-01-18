<?php

if (!isset($_SESSION['userId'])) {
    if (isset($_POST['auth'])) {
        if (!empty($_POST['login']) OR !empty($_POST['password'])) {
            $_SESSION['login'] = $_POST['login']; // Логин
            $_SESSION['password'] = $_POST['password']; // Пароль
            $_SESSION['host'] = 1;
            $formEnable = 1;
        } else {
            echo "Вы не ввели логин либо пароль";
        }
    }
} else {
    $_SESSION['host']++;
    $hostsCount = $_SESSION['host'];
    $formEnable = 1;
}

// Если пользователь вышел из системы, удаляем сохраненные данные:
if (isset($_GET['exit'])) {
    unset($_SESSION['userId']);
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    unset($_SESSION['host']);
    unset($_SESSION['user']);
    setcookie("lastUrl");
    session_destroy();
    $formEnable = 0;
}

if (isset($_SESSION['user'])) {
    $formEnable = 1;
}

?>