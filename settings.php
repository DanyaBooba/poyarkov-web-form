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
                Личный Кабинет<span class="text-muted">/Настройки</span>
            </h1>
            <p style="margin-top: .3rem">
                Настройки
            </p>
        </div>

        <div id="form" class="text-center" style="margin-bottom: 1rem">
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

        <div id="links" class="text-center">
            <a href="/" style="margin-right: 1rem;">
                Главная страница</a>
            <a href="cabinet" style="margin-right: 1rem;">
                Кабинет</a>
            <a href="settings" style="margin-right: 1rem;">
                Настройки</a>
            <a href="record" style="margin-right: 1rem;">
                Записи</a>
            <a href="exit">
                Выйти из Аккаунта</a>
        </div>
    </main>
</body>

</html>