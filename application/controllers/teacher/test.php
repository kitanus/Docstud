<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 28.01.2018
 * Time: 13:05
 */

    use Docstud\Test as T;

    $classTest = new T();

    // Вывод теста и его статистики
    if(!empty($_GET['name']))
    {
        $fullTest = $db->select(
            "`answers` AS `a`",
            $db->fromArrToStr(chooseSelect("fullTest")),
            $db->joinArrToStr(chooseJoin("fullTest")),
            "`ut`.`id` = '{$id}' AND `t`.`name` = '{$_GET['name']}'"
        );

        $correctAnswer = $db->select(
            "`correct_answer` AS `ta`",
            $db->fromArrToStr(chooseSelect("correctAnswer")),
            $db->joinArrToStr(chooseJoin("correctAnswer")),
            "`ut`.`id` = '{$id}' AND `t`.`name` = '{$_GET['name']}'"
        );

        $newTest= "";

        $testName = '<input type="text" name="testName" placeholder="Название теста" value="'.$fullTest[0]['test_name'].'">';


        $newTest .= '<div class="bodyTestCenterView">';
        $newTest .= '<form method="post" action="/?go=test">';
        $newTest .= '<div class="bodyTestCenterViewHeader">';
        $newTest .= '<a class="bodyTestCenterViewHeaderClose" href="/?go=test">X</a>';
        $newTest .= '<div class="bodyTestCenterViewHeaderName">'.$testName.'</div>';

        if(!empty($_POST['create'])) {
            $newTest .='<input type="submit" class="bodyTestCenterViewHeaderSave" name="save" value="Сохранить">';
        }

        $newTest .= '</div>';
        $newTest .= '<div class="bodyTestCenterViewBody">';

        $newTest .= $classTest->printInputTest($_POST, $fullTest, $correctAnswer);

        $newTest .= '</div>';
        $newTest .= '</form>';
        $newTest .= '</div>';

        $user = $db->select(
            "`user_test` AS `utest`",
            $db->fromArrToStr(chooseSelect("tUser")),
            $db->joinArrToStr(chooseJoin("tUser")),
            "`utest`.`test_id` = '{$fullTest[0]["test_id"]}'"
        );

        // Создание статистики
        $testStat = "";

        $testStat .= '<div class="bodyTestCenterView">';
        $testStat .= '<div class="bodyTestCenterViewHeader">';
        $testStat .= '<div class="bodyTestCenterViewHeaderStatistics">Статистика</div>';
        $testStat .= '</div>';
        $testStat .= '<div class="bodyTestCenterViewBody">';

        $testStat .= '<table>';
        $testStat .= '<tr>';
        $testStat .= '<th>Студент</th><th>Группа</th><th>Правильно</th><th>Всего</th><th>Баллы</th>';
        $testStat .= '</tr>';

        for($i=0; $i<count($user); $i++)
        {
            $userAnswer = $db->select(
                "`user_answer` AS `ua`",
                $db->fromArrToStr(chooseSelect("userAnswer")),
                $db->joinArrToStr(chooseJoin("userAnswer")),
                "`ut`.`id` = '{$id}' AND `t`.`name` = '{$_GET['name']}' AND `ua`.`user_id` = '{$user[$i]["user_id"]}'"
            );

            $testStat .= $classTest->tableStat ($i, $user, $userAnswer, $correctAnswer);
        };
        $testStat .="</table>";

        $testStat .= '</div>';
        $testStat .= '</div>';

    };

    // Сохранение созданного теста
    if(!empty($_POST['save']) && $_POST['save'] == "Сохранить"){

        $db->insert(
            "`test`",
            chooseInsert("tTest", $id, $_POST)
        );

        $test = $db->select(
            "`test` AS `t`",
            $db->fromArrToStr(chooseSelect("tTest")),
            null,
            "`t`.`name` = '{$_POST['testName']}'"
        );

        $answ = 0;

        for($i=0; $i<count($_POST['question']); $i++)
        {
            // Запись вопросов
            $db->insert(
                "`questions`",
                chooseInsert("tQuestions", $_GET, $_POST, [$i, $test[0]['id']])
            );

            // Запись правильных ответов
            $db->insert(
                "`correct_answer`",
                chooseInsert("tTAnswer", $_GET, $_POST, [$i, $test[0]['id']])
            );

            $questions = $db->select(
                "`questions` AS `q`",
                $db->fromArrToStr(chooseSelect("tQuest")),
                null,
                "`q`.`content` = '{$_POST['question'][$i]}'"
            );

            // Запись ответов
            for($j=0; $j<4; $j++)
            {
                    $db->insert(
                        "`answers`",
                        chooseInsert("tAnswers", $_GET, $_POST, [$answ, $questions[0]['id'], $j])
                    );
                $answ++;
            };
        };

        $fullTest = $db->select(
            "`answers` AS `a`",
            $db->fromArrToStr(chooseSelect("fullTest")),
            $db->joinArrToStr(chooseJoin("fullTest")),
            "`ut`.`id` = '{$id}' AND `t`.`name` = '{$_POST['testName']}'"
        );

        $correctAnswer = $db->select(
            "`correct_answer` AS `ta`",
            $db->fromArrToStr(chooseSelect("correctAnswer")),
            $db->joinArrToStr(chooseJoin("correctAnswer")),
            "`ut`.`id` = '{$id}' AND `t`.`name` = '{$_POST['testName']}'"
        );

        // Вывод получившегося теста
        $testName = '<input type="text" name="testName" placeholder="Название теста" value="'.$fullTest[0]['test_name'].'">';
        $newTest = $classTest->printInputTest($_POST, $fullTest, $correctAnswer);
    };

    // Создание теста
    if(!empty($_POST['create']) && $_POST['create'] == "Создать")
    {
        $newTest = "";

        $testName = '<input type="text" name="testName" placeholder="Название теста">';

        $newTest .= '<div class="bodyTestCenterView">';
        $newTest .= '<form method="post" action="/?go=test">';
        $newTest .= '<div class="bodyTestCenterViewHeader">';
        $newTest .= '<a class="bodyTestCenterViewHeaderClose" href="/?go=test">X</a>';
        $newTest .= '<div class="bodyTestCenterViewHeaderName">'.$testName.'</div>';

        if(!empty($_POST['create'])) {
            $newTest .='<input type="submit" class="bodyTestCenterViewHeaderSave" name="save" value="Сохранить">';
        }

        $newTest .= '</div>';
        $newTest .= '<div class="bodyTestCenterViewBody">';

        $newTest .= $classTest->printInputTest($_POST);

        $newTest .= '</div>';
        $newTest .= '</form>';
        $newTest .= '</div>';
    };

    // Отправка теста
    if(!empty($_POST['send']) && $_POST['send'] == "Отправить")
    {
        $allGroup = $db->select("`stud_group`","id", null, "`stud_group`.`name` = '{$_POST['group']}'");
        $allTestList = $db->select("`test`","id", null, "`test`.`name` = '{$_POST['test']}'");

        $db->insert(
            "`test2group`",
            chooseInsert("t2g", $_GET, $_POST, [$allGroup[0]["id"], $allTestList[0]["id"]])
        );
    };


    $getTest = $db->select(
        "`test` AS `t`",
        $db->fromArrToStr(chooseSelect("tTest")),
        null,
        "`t`.`teacher_id` = '{$id}'"
    );

    // Список тестов
    $listTest = "";
    for($i=0; $i<count($getTest); $i++){
        $listTest .= '<div class="bodyTestLeftListLine"">';
        $listTest .= '<a href="/?go=test&name='.$getTest[$i]["test_name"].'">'.$getTest[$i]["test_name"].'</a>';
        $listTest .= '</div>';
    };

    $teacher = $db->select(
        "`user_teacher` AS `ut`",
        $db->fromArrToStr(chooseSelect("mWTeacher")),
        null,
        "`ut`.`id` = '{$id}'"
    );

    $group = $db->select("`stud_group`","name", null, "`stud_group`.`institute_id` = '{$teacher[0]['institute_id']}'");

    $testList = $db->select("`test`","name", null, "`test`.`teacher_id` = '{$id}'");

    include APP . "/view/templates/afterLogin/teacher/test.php";