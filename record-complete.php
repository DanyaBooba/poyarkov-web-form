<?php

$email_cookie = $_COOKIE["email"];
$password_cookie = $_COOKIE["password"];

$idpage = $_GET["id"];

if (empty($email_cookie) || empty($password_cookie)) {
    header("Location: /cabinet");
    exit;
}

require 'database.php';
$result = CompletePage($email_cookie, $password_cookie, $idpage);

header("Location: /pages");
