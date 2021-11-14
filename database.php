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
    if (strlen($email) <= 0 || strlen($password) <= 0) return false;

    #Обработка существования пользователя
    if (_BaseLogin($email, $password) != "404") return false;

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
    return true;
}

#Функция для входа
function LoginToAccount($email, $password)
{
    #Ищем аккаунт
    $data = _BaseLogin($email, $password);

    #Если есть ошибка
    if ($data == "404") return false;

    #Берем IP
    $ip = $_SERVER['REMOTE_ADDR'];

    #Изменяем некоторые параметры
    $data->iplastlogin = $ip;

    #Загружаем данные и возвращаем информацию об успешном выполнении
    R::store($data);
    return true;
}

#Редактирование данных
function ChangeAccount($email, $password, $name, $new_pass)
{
    #Ищем аккаунт
    $data = _BaseLogin($email, $password);

    #Если есть ошибка
    if ($data == "404") return false;

    #Изменяем некоторые параметры
    $data->name = $name;
    $data->password = $new_pass;

    #Загружаем данные и возвращаем информацию об успешном выполнении
    R::store($data);
    return true;
}

#Публикуем Запись
function SendPost($email, $password, $postname, $postmess)
{
    $data = _BaseLogin($email, $password);

    #Errors
    if ($data == "404") return false;
    if ((strlen($postname) < 3 || strlen($postmess) < 3) || (strlen($postname) > 350 || strlen($postmess) > 30000)) return false;

    $page = R::dispense('pages');
    $page->name = strip_tags($postname);
    $page->message = strip_tags($postmess);
    $page->idauthor = $data->id;
    $page->datetime = date("Y-m-d H:i:s");
    $page->iscomplete = 0;

    R::store($page);
    return "200";
}
