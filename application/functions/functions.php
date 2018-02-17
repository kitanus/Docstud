<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 20.10.2017
 * Time: 22:24
 */

function registrationCorrect()
{
    if ($_POST['login'] == "") return false; //не пусто ли поле логина
    if ($_POST['password'] == "") return false; //не пусто ли поле пароля
    if ($_POST['email'] == "") return false; //не пусто ли поле e-mail
    if (!preg_match('/^([a-z0-9])(\w|[.]|-|_)+([a-z0-9])@([a-z0-9])([a-z0-9.-]*)([a-z0-9])([.]{1})([a-z]{2,4})$/is', $_POST['email'])) return false; //соответствует ли поле e-mail регулярному выражению
    if (!preg_match('/^([a-zA-Z0-9])(\w|-|_)+([a-z0-9])$/is', $_POST['login'])) return false; // соответствует ли логин регулярному выражению
    if (strlen($_POST['password']) < 5) return false; //не меньше ли 5 символов длина пароля
    return true; //если выполнение функции дошло до этого места, возвращаем true
}

function mysqlCommand ($command)
{
    $sql = "ok";
    // работа с sql
    $datebase = new mysqli("localhost", "root", "", "DocStud");

    if ($datebase->connect_errno)
    {

        $sql = "Ошибка !!! " . $datebase->connect_error;

    }
    else
    {

        $query = $command ;

        $res = $datebase->query($query);
        if ($res === false)
        {
            $sql = "Ошибка !!! " . $datebase->error;
        }
        elseif ($res === true)
        {
            $sql = true;
        } else
        {
            $result = array();
            while ($row = $res->fetch_assoc())
            {
                $result[] = $row;
            }
            $sql = $result;
        }

        return $sql;

    }
}