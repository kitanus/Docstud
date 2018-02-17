<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 12.02.2018
 * Time: 12:03
 */

use Docstud\User as U;

$user = new U();

    $group = $db->select(
        "`stud_group`",
        $db->fromArrToStr(chooseSelect("group"))
    );

    $institute = $db->select(
        "`institute`",
        $db->fromArrToStr(chooseSelect("institute"))
    );

include APP . "/view/templates/beforeLogin/bodyReg.php";