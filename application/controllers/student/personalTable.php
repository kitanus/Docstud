<?php
use Docstud\Table as T;

    $student = $db->select(
        "`user` AS `u`",
        $db->fromArrToStr(chooseSelect("pTUser")),
        $db->joinArrToStr(chooseJoin("pTUser")),
        "`u`.`id` = '{$id}'"
    );

    $type = $student[0]["type_id"];
    $group = $student[0]["group_id"];

    $tableSql = $db->select(
        "`stud_table` AS `st`",
        $db->fromArrToStr(chooseSelect("pTTable")),
        $db->joinArrToStr(chooseJoin("pTTable")),
        "`st`.`stud_group_id` = '{$group}'",
        "`table_order` ASC"
    );

    $table = new T($tableSql);

    $day=$db->select("`day`","name");
    $dayId=$db->select("`day`","id");
    $week=$db->select("`week`","name");
    $weekId=$db->select("`week`","id");
    $lesson=$db->select("`lesson`","name", null, "`lesson`.`institute_id` = '{$student[0]["institute_id"]}'");
    $lessonId=$db->select("`lesson`","id", null, "`lesson`.`institute_id` = '{$student[0]["institute_id"]}'");
    $typeTable=$db->select("`type`","name");
    $typeTableId=$db->select("`type`","id");
    $build=$db->select("`building`","name", null, "`building`.`institute_id` = '{$student[0]["institute_id"]}'");
    $buildId=$db->select("`building`","id", null, "`building`.`institute_id` = '{$student[0]["institute_id"]}'");
    $teachSurname=$db->select("`user_teacher`","surname", null, "`user_teacher`.`institute_id` = '{$student[0]["institute_id"]}'");
    $teachSurnameId=$db->select("`user_teacher`","id", null, "`user_teacher`.`institute_id` = '{$student[0]["institute_id"]}'");

    if(!empty($_POST["order"]))
    {
        $tr = count($_POST["order"]);
    }
    elseif (!empty($tableSql[0]["tr"]))
    {
        $tr = $tableSql[0]["tr"];
    }
    elseif (empty($tr))
    {
        $tr = 1;
    };

    // Добавление строчки расписания
    if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == "Добавить +")
    {
        $tr = $tr+1;
    };

    // Сохранение расписания
    if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == "Сохранить")
    {
        for ($s = 0; $s < count($_POST["order"]); $s++)
        {
            if (empty($tableSql[$s]["tr"]))
            {
                $db->insert(
                    "stud_table",
                    chooseInsert("pTTable", $_GET, $_POST, [$s,$group,$tr])
                );
            }
            else
            {
                $c = $s + 1;

                $db->update(
                    "`stud_table`",
                    chooseUpdate("pTTable", $_POST, [$s,$group,$tr]),
                    "`table_order` = '{$_POST["order"][$s]}' AND `stud_group_id` = '{$group}'");
            };
        };
    };

    // Удаление строчки расписания
    if(!empty($_GET['idDelete']))
    {
        $db->delete(
            "stud_table",
            "`id` = '{$_GET['idDelete']}'"
        );

        $tr = $_GET["tr"];

        if($tr != 1)
        {
            $tr = $tr - 1;
        };
    };

    $tableSql = $db->select(
        "`stud_table` AS `st`",
        $db->fromArrToStr(chooseSelect("pTTable")),
        $db->joinArrToStr(chooseJoin("pTTable")),
        "`st`.`stud_group_id` = '{$group}'",
        "`table_order` ASC"
    );

    $table = new T($tableSql);

    $textTable = "";
    if($type == 1)
    {
        $textTable .= $table->tableForStarosta($tr, [$day, $week, $lesson, $typeTable, $build, $teachSurname], [$dayId, $weekId, $lessonId, $typeTableId, $buildId, $teachSurnameId], $tableSql);
    }
    else
    {
        $textTable .= $table->tableForStudent($tr);
    };

    include APP . "/view/templates/afterLogin/student/personalTable.php";