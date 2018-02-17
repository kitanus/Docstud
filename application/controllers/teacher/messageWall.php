<?php

    use Docstud\Wall as W;

    $functionsMessage = new W($_GET);

    $teacher = $db->select(
        "`user_teacher` AS `ut`",
        $db->fromArrToStr(chooseSelect("mWTeacher")),
        null,
        "`ut`.`id` = '{$id}'"
    );

    $message = $db->select(
        "`message` AS `m`",
        $db->fromArrToStr(chooseSelect("message")),
        $db->joinArrToStr(chooseJoin("message")),
        "`ut`.`id` = '{$teacher[0]['user_id']}'",
        "`m`.`id` DESC"
    );

    // Отправка сообщения
    if(isset($_POST) && $_POST['step'] == ">>")
    {
        $checkMessage = $functionsMessage->existenceMessage(!empty($message[0]['message_content']));

        if ($checkMessage && ($_POST['email'] != 'no' || $_POST['group'] != 'no') && ($_POST['email'] == 'no' || $_POST['group'] == 'no'))
        {
            $checkEmailUser = $db->select(
                "`user`",
                $db->fromArrToStr(chooseSelect("email")),
                null,
                "`user`.`email` = '{$_POST['email']}'"
            );

            $checkGroup = $db->select(
                "`stud_group`",
                $db->fromArrToStr(chooseSelect("group")),
                null,
                "`stud_group`.`name` = '{$_POST['group']}'"
            );

            $values[0]["`id`"] = NULL;
            $values[0]["`content`"] = "'{$_POST['content']}'";
            $values[0]["`time`"] = "CURRENT_TIMESTAMP";
            $values[0]["`teacher_id`"] = "'{$teacher[0]['user_id']}'";

            // Выбор кому идет от
            if($_POST['group'] == "no" && $_POST['email'] != "no" && !empty($checkEmailUser[0]['id']))
            {
                $values[0]["`user_id`"] = "'{$checkEmailUser[0]['id']}'";
                $values[0]["`stud_group_id`"] = "'0'";
            }
            elseif ($_POST['email'] == "no" && $_POST['group'] != "no" && !empty($checkGroup[0]['group_id']))
            {
                $values[0]["`stud_group_id`"] = "'{$checkGroup[0]['group_id']}'";
                $values[0]["`user_id`"] = "'0'";
            };

            $db->insert("`message`", $values);
        };
    }
    elseif(isset($_GET) && $_GET['step'] == "deleteTeacherWall")
    {
        $db->delete("`message`","`id` = '{$_GET['idDelete']}'");
    };

    $message = $db->select(
        "`message` AS `m`",
        $db->fromArrToStr(chooseSelect("message")),
        $db->joinArrToStr(chooseJoin("message")),
        "`ut`.`id` = '{$teacher[0]['user_id']}'",
        "`m`.`id` DESC"
    );

    $group = $db->select("`stud_group`","name", null, "`stud_group`.`institute_id` = '{$teacher[0]['institute_id']}'");

    $user = $db->select(
        "`user` AS `u`",
        $db->fromArrToStr(chooseSelect("pAUser")),
        $db->joinArrToStr(chooseJoin("pAUser")),
        "`i`.`id` = '{$teacher[0]['institute_id']}'"
    );

    $email = '';
    foreach ($user AS $key => $value){
        $email[0][] = $value["user_email"];
    }

    include APP . "/view/templates/afterLogin/teacher/messageWall.php";