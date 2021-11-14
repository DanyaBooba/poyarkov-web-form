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
        <div id="info">

            <h1 class="text-center fw-bold">
                Личный Кабинет
            </h1>

        </div>

        <div id="data" class="text-center">
            <b style="margin-right: 1rem;">
                <?php echo $data["id"] ?>
            </b>
            <b style="margin-right: 1rem;">
                <?php echo $data["name"] ?>
            </b>
            <b style="margin-right: 1rem;">
                <?php echo $data["email"] ?>
            </b>
            <b style="margin-right: 1rem;">
                <?php echo $data["password"] ?>
            </b>
            <b style="margin-right: 1rem;">
                <?php echo $data["datetimelogin"] ?>
            </b>
            <b>
                <?php echo $data["iplastlogin"] ?>
            </b>
        </div>

        <div id="more">
            <p>
                Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.
            </p>
            <p>
                Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.
            </p>
            <p>
                Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка. Грустный реторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись.
            </p>
        </div>

        <div id="content" class="text-center">
            <a href="/" style="margin-right: 1rem;">
                Главная страница</a>
            <a href="settings" style="margin-right: 1rem;">
                Настройки</a>
            <a href="record" style="margin-right: 1rem;">
                Создать Запись</a>
            <a href="exit">
                Выйти из Аккаунта</a>
        </div>
    </main>
</body>

</html>