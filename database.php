<?php
// Тут подключение к базе данных


#Подключаем библиотеку и производим подключение
require 'rb-mysql.php';
R::setup('mysql:host=localhost;dbname=poyarkov', 'root', 'root');

#Прекращаем выполнение, если не подключились
if (!R::testConnection()) {
    return "404 connection";
    exit;
}

#Функция для базового входа
function _BaseLogin($email, $password)
{
    #Находим пользователя
    $find = R::findOne('users', 'email = ?', array($email));
    if (!isset($find)) return "404";

    #Работаем с паролем
    $db_password = $find->password;

    #Обрабатываем ошибки
    if ($db_password != $password) return "404";
    if (isset($find) && $db_password == $password) return $find;

    #В случае непонятности
    return "404";
}

#Функция для Регистрации
function CreateAccount($email, $password)
{
    #Обработка длины данных
    if (strlen($email) <= 0 || strlen($password) <= 0) return "404";

    #Обработка существования пользователя
    if (_BaseLogin($email, $password) != "404") return "404";

    #Задаем данные
    $user = R::dispense('users');
    $user->name = "default";
    $user->email = $email;
    $user->password = $password;
    $user->inputs = "[]";
    $user->datetimelogin = date("Y-m-d H:m:s");
    $user->iplastlogin = $_SERVER['REMOTE_ADDR'];

    #Загружаем данные и возвращаем информацию об успешном выполнении
    R::store($user);
    return $user;
}

#Функция для входа
function LoginToAccount($email, $password)
{
    #Ищем аккаунт
    $data = _BaseLogin($email, $password);

    #Если есть ошибка
    if ($data == "404") return "404";

    #Берем IP
    $ip = $_SERVER['REMOTE_ADDR'];

    #Изменяем некоторые параметры
    $data->iplastlogin = $ip;

    #Загружаем данные и возвращаем информацию об успешном выполнении
    R::store($data);
    return $data;
}
