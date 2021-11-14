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
$pages = R::getAll("SELECT * FROM pages WHERE idauthor=$id");
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
                Личный Кабинет<span class="text-muted">/Создать Запись</span>
            </h1>
            <p style="margin-top: .3rem">
                Создать запись
            </p>
        </div>

        <div id="form" class="text-center">
            <form action="account-record.php" method="post">
                <div style="margin-bottom: .5rem;">
                    <label for="title">Title</label>
                    <input style="width: 70%" type="text" id="title" name="title">
                </div>
                <div style="margin-bottom: .5rem;">
                    <label for="message">Message</label>
                    <textarea type="text" id="message" name="message"></textarea>
                </div>

                <button type="submit">Confirm</button>
            </form>
        </div>

        <div id="records" style="margin-bottom: 1rem; margin-top: 1rem;">
            <?php foreach ($pages as $page) : ?>
                <div id="page<?php echo $page["id"] ?>" style="background: #e7e7e7; max-width: 900px; margin: 0 auto; padding: 20px; border-radius: 15px; margin-bottom: .5rem">
                    <p>
                        <?php echo "[" . $page["id"] . "] " . $page["datetime"] ?>
                    </p>
                    <h3 style="margin-bottom: .3rem">
                        <?php echo $page["name"] ?>
                    </h3>
                    <p style="margin-top: .3rem">
                        <?php echo $page["message"] ?>
                    </p>
                    <div>
                        <a href="" style="margin-right: 1rem;">
                            Выполнить</a>
                        <a href="" style="margin-right: 1rem;">
                            Редактировать</a>
                        <a href="">
                            Удалить</a>
                    </div>
                </div>
            <?php endforeach; ?>
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