<?php

$email = $_COOKIE["email"];
$password = $_COOKIE["password"];

if (empty($email) || empty($password)) {
    header("Location: /");
    exit;
}

require 'database.php';
$data = _BaseLogin($email, $password);
if ($data == "404") {
    header("Location: /");
    exit;
}
