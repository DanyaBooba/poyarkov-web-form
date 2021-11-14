<?php
// На основе database.php

$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email) || empty($password)) {
    header("Location: /create.html");
    exit;
}

//echo $email . " " . $password;
require 'database.php';
$result = CreateAccount($email, $password);
//var_dump($result);
if ($result == true) {
    $url = "cabinet";

    setcookie("email", $email, 0, "/");
    setcookie("password", $password, 0, "/");
} else {
    $url = "create.html";
}

header("Location: /$url");
