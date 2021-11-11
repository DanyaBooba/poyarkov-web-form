<?php
// Тут подключение к базе данных


$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = 'root';
$dbdatabase = 'poyarkov';

$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

//$result = $mysqli->query("SELECT * FROM users");



function CreateAccount($email, $password)
{
    global $mysqli;

    $date = date("Y-m-d H:m:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    $names = "name, email, password, inputs, datetimelogin, iplastlogin";
    $values = '"default", "' . $email . '", "' . $password . '", "[]", "' . $date . '", "' . $ip . '"';
    $sql = 'INSERT INTO `users`(' . $names . ') VALUES (' . $values . ')';

    $result = $mysqli->query($sql);
    return $result;
}

function LoginToAccount($email, $password)
{
    global $mysqli;

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows <= 0) {
        return false;
    }

    $array = mysqli_fetch_array($result);

    if ($array["password"] != $password) {
        return false;
    }

    return true;
}

/*
foreach ($result as $row) {
    echo $row['name'] . "\n";
}
*/