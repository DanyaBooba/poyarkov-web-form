<?php
// На основе database.php

$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email) || empty($password)) {
    header("Location: /login.html");
    exit;
}

require 'database.php';
$result = LoginToAccount($email, $password);
//var_dump($result);

if ($result == true) {
    $url = "cabinet";

    setcookie("email", $email, 0, "/");
    setcookie("password", $password, 0, "/");
} else {
    $url = "login.html";
}

header("Location: /$url");
