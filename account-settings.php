<?php

$email_cookie = $_COOKIE["email"];
$password_cookie = $_COOKIE["password"];

$name = $_POST["name"];
$password = $_POST["password"];

if (empty($name) || empty($password)) {
    header("Location: /cabinet");
    exit;
}

require 'database.php';
$result = ChangeAccount($email_cookie, $password_cookie, $name, $password);
//var_dump($result);

header("Location: /settings");
