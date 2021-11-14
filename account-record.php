<?php
// На основе database.php

$name = $_POST["title"];
$message = $_POST["message"];

$email = $_COOKIE["email"];
$password = $_COOKIE["password"];

if (empty($email) || empty($password)) {
    header("Location: /login.html");
    exit;
}

require 'database.php';
$result = SendPost($email, $password, $name, $message);

header("Location: /record");
