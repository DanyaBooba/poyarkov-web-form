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

$id = $data["id"];
$name = $data["name"];
$email = $data["email"];

$datetimelogin = $data["datetimelogin"];
$iplastlogin = $data["iplastlogin"];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Сайт для Пояркова</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/components/index.css">
</head>

<body>
    <main class="main__block">
        <div id="info" class="text-center">
            <h1 class="fw-bold" style="margin-bottom: 0">
                Настройки Аккаунта
            </h1>
            <p style="margin-top: .3rem">
                Настройки
            </p>
        </div>

        <div id="form" class="text-center">
            <form action="account-settings.php" method="post">

                <div style="margin-bottom: .5rem;">
                    [id] <b><?php echo $id ?></b>
                </div>

                <div style="margin-bottom: .5rem;">
                    [datetimelogin] <b><?php echo $datetimelogin ?></b>
                </div>

                <div style="margin-bottom: .5rem;">
                    [iplastlogin] <b><?php echo $iplastlogin ?></b>
                </div>

                <div style="margin-bottom: .5rem;">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $data["name"] ?>">
                </div>

                <div style="margin-bottom: .5rem;">
                    <label for="name">Password</label>
                    <input type="password" id="password" name="password" value="<?php echo $data["password"] ?>">
                </div>

                <button type="submit">Confirm</button>
            </form>
        </div>

        <div id="links" class="text-center" style="margin-top: 2rem;">
            <a href="/cabinet">
                Вернуться в Аккаунт</a>
        </div>
    </main>
</body>

</html>