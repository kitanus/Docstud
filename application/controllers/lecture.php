<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 11.01.2018
 * Time: 15:25
 */

    use Docstud\Test as T;

    $classTest = new T();

    $group = $db->select(
        "`user` AS `u`",
        $db->fromArrToStr(chooseSelect("lGroup")),
        $db->joinArrToStr(chooseJoin("lGroup")),
        "`u`.`id` = '{$id}'"
    );
    $teacher = $db->select(
        "`user_teacher` AS `ut`",
        $db->fromArrToStr(chooseSelect("mWTeacher")),
        null,
        "`ut`.`id` = '{$id}'"
    );

    $groupName = $db->select("`stud_group`","name", null, "`stud_group`.`institute_id` = '{$teacher[0]['institute_id']}'");

    $emailTeacher = $db->select(
        "`user_teacher`",
        $db->fromArrToStr(chooseSelect("emailTeacher")),
        null,
        "`user_teacher`.`id` = '{$id}'"
    );

    // Если пользователь староста или студент
    if($checkType != 3)
    {
        $path = ROOT_FOLDER . '/data/' . $group[0]['group_name'].'/';
    }
    else // Если пользователь преподователь
    {
        $path = ROOT_FOLDER . '/data/' . $emailTeacher[0]['teacher_email'].'/';
    };

    // Запись файла
    if(!empty($_GET['action']) && $_GET['action'] == "save")
    {
        file_put_contents($path.$_GET["fillles"], $_POST['text']);
    };

    // Чтение файла и показ файла
    if(!empty($_GET["fillles"]))
    {
        $textFiles = "";
        $path_parts = pathinfo($path.$_GET["fillles"]);

        $textFiles .= '<div class="bodyCenterLectureView">';
        $textFiles .= '<form method="post" action="http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'&action=save">';
        $textFiles .= '<div class="bodyCenterLectureViewHeader">';
        $textFiles .= '<a href="/?go=lecture" class="bodyCenterLectureViewHeaderClose">X</a>';
        $textFiles .= '<div id="lectureName">';
        $textFiles .= $_GET["fillles"];
        $textFiles .= '</div>';
        $textFiles .= '<input type="submit" class="bodyCenterLectureViewHeaderSave" value="Сохранить">';
        $textFiles .= '</div>';

        if($path_parts['extension'] == "txt") // если документ формата .txt
        {
            $textFiles .= '<textarea class="bodyCenterLectureViewBody" wrap="hard" name="text">';
            $textFiles .= file_get_contents($path . $_GET["fillles"]);
            $textFiles .= '</textarea>';
        }

        $textFiles .= '</form>';
        $textFiles .= '</div>';
    };

    // Обработка загруженных файлов
    if (!empty($_FILES))
    {
        foreach ($_FILES["upload"]["error"] as $key => $error)
        {
            if ($error == UPLOAD_ERR_OK)
            {
                $tmp_name = $_FILES["upload"]["tmp_name"][$key];
                $name = basename($_FILES["upload"]["name"][$key]);
                move_uploaded_file(
                    $tmp_name,
                    $path . iconv(mb_detect_encoding($name), "UTF-8//TRANSLIT", $name)
                );
            };
        };
    };

    $allTest = $db->select(
        "`test2group`",
        "test_id",
        null,
        "`test2group`.`group_id` = '{$group[0]['group_id']}'"
    );

    // Список тестов для студента
    $listTest = "";
    for($i=0; $i<count($allTest); $i++)
    {
        $getTest = $db->select(
            "`test` AS `t`",
            $db->fromArrToStr(chooseSelect("tTest")),
            null,
            "`t`.`id` = '{$allTest[$i]["test_id"]}'"
        );

        $listTest .= '<div class="bodyTestLeftListLine"">';
        $listTest .= '<a href="/?go=lecture&testName='.$getTest[0]["test_name"].'">'.$getTest[0]["test_name"].'</a>';
        $listTest .= '</div>';
    };

    $fullTest = $db->select(
        "`answers` AS `a`",
        $db->fromArrToStr(chooseSelect("fullTest")),
        $db->joinArrToStr(chooseJoin("fullTest")),
        "`t`.`name` = '{$_GET['testName']}'"
    );

    // Вывод теста
    if(!empty($_GET["testName"]))
    {
        $textTest = "";

        $textTest .= '<div class="bodyCenterLectureView">';
        $textTest .= '<form method="post" action="http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'">';
        $textTest .= '<div class="bodyCenterLectureViewHeader">';
        $textTest .= '<a href="/?go=lecture" class="bodyCenterLectureViewHeaderClose">X</a>';
        $textTest .= '<div id="lectureName">'.$_GET["testName"].'</div>';
        $textTest .= '<input type="submit" class="bodyCenterLectureViewHeaderSave" name="action" value="Отправить тест">';
        $textTest .= '</div>';
        $textTest .= '<div id="bodyLectureCenterViewTest">';

        $textTest .= $classTest->printTest($fullTest);

        $textTest .= '</div>';
        $textTest .= '</form>';
        $textTest .= '</div>';
    };

    // Отправка теста
    if(!empty($_POST['action']) && $_POST['action'] == "Отправить тест")
    {

        for($i=0; $i<$fullTest[0]['test_max']; $i++)
        {
            $db->insert(
                "`user_answer`",
                chooseInsert("tUAnswer", $id, $_POST, [$i, $fullTest[0]['test_id']])
            );
        };

        $db->insert(
            "`user_test`",
            chooseInsert("tUTest", $id, $_POST, [$i, $fullTest[0]['test_id']])
        );
    };

    // Получение списка файлов в папке
    $files1 = scandir($path, 1);

    // Создание нужной папки, если ее нет
    if ($files1 == false)
    {
        mkdir($path, 0700);
        $fp = fopen($path.'..txt', "w");
        fclose ($fp);
    };

    // Список файлов
    $filles = "";
    foreach ($files1 as $key => $value)
    {
        if($value != "." && $value != ".." && preg_match("/~/", $value) === 0)
        {
            $path_parts = pathinfo($value);
            $filles .= "<br><a href='/?go=lecture&fillles={$value}'>" . $path_parts['filename'] . "</a>";

            $lectureList .= "<option value='{$value}'>{$value}</option>";
        };
    };

    // Отправка лекции
    if(!empty($_POST['lection']) && $_POST['lection'] == "Отправить")
    {
        copy($path.$_POST['lecture'], ROOT_FOLDER . '/data/'.$_POST['group'].'/'.$_POST['lecture']);
    };

    include APP . "/view/templates/afterLogin/lecture.php";