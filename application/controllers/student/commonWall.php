<?php

    use Docstud\Wall as W;

    $functionsMessage = new W($_GET);

    $user = $db->select(
        "`user` AS `u`",
        $db->fromArrToStr(chooseSelect("cWUser")),
        $db->joinArrToStr(chooseJoin("cWUser")),
        "`u`.`id` = '{$id}'"
    );

    $message = $db->select(
        "`message` AS `m`",
        $db->fromArrToStr(chooseSelect("message")),
        $db->joinArrToStr(chooseJoin("message")),
        $functionsMessage->choiceWhereWall($user[0]['group_id'], $user[0]['user_id']),
        "`m`.`id` DESC"
    );

    // Отправление сообщения
    if(isset($_POST) && $_POST['step'] == ">>")
    {
        $checkMessage = $functionsMessage->existenceMessage(!empty($message[0]['message_content']));

        if ($checkMessage && ($message[0]['message_content'] != $_POST['content']))
        {
            $db->insert(
                "`message`",
                chooseInsert("cWMessage", $_GET, $_POST, $user)
            );

            $message = $db->select(
                "`message` AS `m`",
                $db->fromArrToStr(chooseSelect("message")),
                $db->joinArrToStr(chooseJoin("message")),
                $functionsMessage->choiceWhereWall($user[0]['group_id'], $user[0]['user_id']),
                "`m`.`id` DESC"
            );
        };
    }
    elseif(isset($_GET) && $_GET['step'] == "deleteCommonWall") // Удаление сообщения
    {
        $db->delete(
            "`message`",
            "`id` = '{$_GET['idDelete']}'"
        );

        $message = $db->select(
            "`message` AS `m`",
            $db->fromArrToStr(chooseSelect("message")),
            $db->joinArrToStr(chooseJoin("message")),
            $functionsMessage->choiceWhereWall($user[0]['group_id'], $user[0]['user_id']),
            "`m`.`id` DESC"
        );
    };

    include APP . "/view/templates/afterLogin/student/commonWall.php";
