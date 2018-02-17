<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сервис хранения документов студентов DocStud</title>
    <script type="text/javascript" src="<?= VIEW ?>/js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
        <?php
            include  VIEW."/js/main.js";
        ?>
    </script>
</head>
<body>
    <style>
        <?php
            // Подключаем стиль шапки сайта
            include chooseHeader($_GET, "css");
            // Подключаем стиль тела сайта
            include chooseBody($_GET, "css");
        ?>
    </style>
    <div id="header">
        <?php
            // Подключаем шапку сайта
            include chooseHeader($_GET, "templates");
        ?>
    </div>
    <div id="body">
        <?php
            // Подключаем тело сайта
            include chooseBody($_GET, "templates");
        ?>
    </div>

    <div id="blackout"></div>
    <div id="block">
        <p id="deleteText">Вы точно хотите удалить сообщение?</p>
        <div id="doDelete">Удалить</div>
        <div id="cancel">Отмена</div>
    </div>

</body>
</html>