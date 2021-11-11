<?php

$email = $_COOKIE["email"];
$password = $_COOKIE["password"];

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

        <div class="row text-center">
            <div class="col">
                <div class="p-3 border bg-light">Custom column padding</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Custom column padding</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Custom column padding</div>
            </div>
        </div>

        <div id="info">
            <h1 class="text-center fw-bold">
                Реализация Личного кабинета
            </h1>
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

        <?php if (empty($email) || empty($password)) : ?>
            <div id="content" class="text-center">
                <a href="create.html" style="margin-right: 1rem;">
                    Создать Аккаунт</a>
                <a href="login.html" style="margin-left: 1rem;">
                    Войти в Аккаунт</a>
            </div>
        <?php else : ?>
            <div id="content" class="text-center">
                <a href="cabinet" style="margin-right: 1rem;">
                    Войти в Аккаунт</a>
                <a href="exit" style="margin-right: 1rem;">
                    Выйти из Аккаунта</a>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>