<?php

    use Docstud\User as U;

    function callUser($db,$from,$name,$where,$id){
        return new u($db->select($from, $db->fromArrToStr(chooseSelect($name)), $db->joinArrToStr(chooseJoin($name)), "`{$where}`.`id` = '{$id}'"));
    };

    function takeSQL($db,$from,$name,$where){
        return $db->select($from, $db->fromArrToStr(chooseSelect($name)), null, $where);
    };

    if($checkType != 3) // Если пользователь студент или староста
    {
        if (isset($_POST['event']) && $_POST['event'] == "onReg") // Регистрация
        {
            $checkEmailUser= takeSQL($db,"`user`","email","`user`.`email` = '{$_POST['email']}'");

            if ($checkEmailUser&& isset($_POST["email"])) // Если пользователь уже существует
            {
                $_SESSION['id'] = $checkEmailUser[0]['id'];
            }
            elseif (isset($_POST["email"]))
            {
                $checkGroup = takeSQL($db,"`stud_group`","group","`stud_group`.`name` = '{$_POST['group']}'");
                $db->insert("user",chooseInsert("pAUser", $_GET, $_POST, $checkGroup));

                $checkEmailUser= takeSQL($db,"`user`","email","`user`.`email` = '{$_POST['email']}'");
                $_SESSION['id'] = $checkEmailUser[0]['id'];
                $id = $checkEmailUser[0]['id'];
            };
        };

        if (isset($_POST['event']) && $_POST['event'] == "onSave") // Сохранение
        {
            $checkGroup = takeSQL($db,"`stud_group`","group","`stud_group`.`name` = '{$_POST['group']}'");

            $db->update(
                "`user`",
                chooseUpdate("pAUser", $_POST, $checkGroup),
                "`id` = '{$id}'"
            );
        };

        $student = callUser($db,"`user` AS `u`","pAUser","u", $id);

        $_SESSION['type'] = $student->getType();
    }
    else
    {
        if (isset($_POST['event']) && $_POST['event'] == "onReg") // Регистрация
        {
            $checkEmailTeacher = takeSQL($db,"`user_teacher`","emailTeacher","`user_teacher`.`email` = '{$_POST['email']}'");
            $institute = takeSQL($db,"`institute`","institute","`institute`.`name` = '{$_POST['institute']}'");

            if ($checkEmailTeacher && isset($_POST["email"])) // Если пользователь уже существует
            {
                $_SESSION['id'] = $checkEmailTeacher[0]['id'];
            }
            elseif (isset($_POST["email"])) // Если пользователя не существует
            {
                $institute = takeSQL($db,"`institute`","institute","`institute`.`name` = '{$_POST['institute']}'");
                // создаем массивы для метода insert
                $db->insert("user_teacher", chooseInsert("pATeacher", $_GET, $_POST, $institute));

                $checkEmailTeacher = takeSQL($db,"`user_teacher`","emailTeacher","`user_teacher`.`email` = '{$_POST['email']}'");

                $_SESSION['id'] = $checkEmailTeacher[0]['id'];
                $id = $checkEmailTeacher[0]['id'];
            };
        };

        if (isset($_POST['event']) && $_POST['event'] == "onSave") // Сохранение
        {
            $db->update(
                "`user_teacher`",
                chooseUpdate("pATeacher", $_POST),
                "`id` = '{$id}'"
            );
        };

        $student = callUser($db,"`user_teacher` AS `ut`","pATeacher","ut", $id);
        $_SESSION['type'] = $student->getType();
    };

    include APP . "/view/templates/afterLogin/personalArea.php";