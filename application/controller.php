<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 31.01.2018
 * Time: 13:44
 */

    // Запускаем сессии
    session_start();

    use Docstud\MySQL as M;

    $sql = "ok";
    $db = new M();

    // Подключаем функции
    include APP . "/functions/MySQLArrays.php";
    include APP . "/functions/elector.php";

    if(!empty($_GET['go']) && $_GET['go'] == "exit"){

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        // Выход (Удаление куки)
        setcookie("Docstud_id", "", time()-3600);
    }

    if(isset($_POST['event']) && $_POST['event'] == "onReg") // Регистрация
    {
        $checkType = $_POST['user'];
    }
    elseif(isset($_POST['event']) && $_POST['event'] == "onEnter") // Вход
    {
        $checkEmailUser = $db->select(
            "`user`",
            $db->fromArrToStr(chooseSelect("email")),
            null,
            "`user`.`email` = '{$_POST['enterEmail']}' AND `user`.`password` = '{$_POST['enterPassword']}'"
        );

        $checkTeacherEmail = $db->select(
            "`user_teacher`",
            $db->fromArrToStr(chooseSelect("emailTeacher")),
            null,
            "`user_teacher`.`email` = '{$_POST['enterEmail']}' AND `user_teacher`.`password` = '{$_POST['enterPassword']}'"
        );

        // Если пользователь студент или староста
        if(!empty($checkEmailUser))
        {
            $checkType = "2";
            $_SESSION['type'] = "2";

            if($_POST["rememberMe"] == 'on')
            {
                setcookie("Docstud_id", $checkEmailUser[0]['id'], time()+3600);
                $nowId = $checkEmailUser[0]['id'];
            }
            else
            {
                $_SESSION["id"]=$checkEmailUser[0]['id'];
            }

        }
        elseif(!empty($checkTeacherEmail))
        {
            $checkType = "3";
            $_SESSION['type'] = "3";

            if($_POST["rememberMe"] == 'on')
            {
                setcookie("Docstud_id", $checkTeacherEmail[0]['id'], time()+3600);
                $nowId = $checkTeacherEmail[0]['id'];
            }
            else
            {
                $_SESSION["id"]=$checkTeacherEmail[0]['id'];
            }
        }
        else
        {
            $_GET['go'] = "enter";
        }
    }
    elseif(isset($_POST['event']) && $_POST['event'] == "onSave") // Сохранение
    {
        $checkType = $_GET['type'];
    }
    elseif (!empty($_COOKIE['Docstud_id']) && empty($_GET['go']))
    {
        $_GET['go'] = "personalArea";
        $checkType = $_SESSION['type'];
    }
    else
    {
        $checkType = $_SESSION['type'];
    }

    if(!empty($_SESSION['id']))
    {
        $id = $_SESSION['id'];
    }
    elseif(!empty($_COOKIE['Docstud_id']))
    {
        $id = $_COOKIE['Docstud_id'];
    }else{
        $id = $nowId;
    }

    include APP . "/view/layout.php";