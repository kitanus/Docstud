<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 02.02.2018
 * Time: 14:36
 */

    /**
     * Раздатчик адрессов шаблонов стилей и HTML-текста для шапки
     * @param array        $get      массив GET
     * @param string        $kind      название типа шаблона
     * @return string
     */
    function chooseHeader($get, $kind)
    {
        if ($kind == "css")
        {
            switch ($get['go'])
            {
                case "createAccount":
                    return APP . "/view/css/beforeLogin/header.php";
                    break;
                case "enter":
                    return APP . "/view/css/beforeLogin/header.php";
                    break;
                case "exit":
                    return APP . "/view/css/beforeLogin/header.php";
                    break;
                case "registration":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "enterPersonalArea":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "save":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "timeTable":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "commonWall":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "lecture":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "personalArea":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "messageWall":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;
                case "test":
                    return APP . "/view/css/afterLogin/headerTwo.php";
                    break;

                default:
                    return APP . "/view/css/beforeLogin/header.php";
            };
        }
        else
        {
            switch ($get['go'])
            {
                case "createAccount":
                    return APP . "/view/templates/beforeLogin/header.php";
                    break;
                case "enter":
                    return APP . "/view/templates/beforeLogin/header.php";
                    break;
                case "exit":
                    return APP . "/view/templates/beforeLogin/header.php";
                    break;
                case "registration":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "enterPersonalArea":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "save":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "timeTable":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "commonWall":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "lecture":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "personalArea":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "messageWall":
                    return APP . "/controllers/headerTwo.php";
                    break;
                case "test":
                    return APP . "/controllers/headerTwo.php";
                    break;

                default:
                    return APP . "/view/templates/beforeLogin/header.php";
            };
        };
    };

    /**
     * Раздатчик адрессов шаблонов стилей и HTML-текста для тела
     * @param array        $get      массив GET
     * @param string        $kind      название типа шаблона
     * @return string
     */
    function chooseBody($get, $kind)
    {
        if ($kind == "css")
        {
            switch ($get['go'])
            {
                case "createAccount":
                    return APP . "/view/" . $kind . "/beforeLogin/bodyReg.php";
                    break;
                case "enter":
                    return APP . "/view/" . $kind . "/beforeLogin/bodyEnter.php";
                    break;
                case "exit":
                    return APP . "/view/" . $kind . "/beforeLogin/bodyEnter.php";
                    break;
                case "registration":
                    return APP . "/view/" . $kind . "/afterLogin/personalArea.php";
                    break;
                case "save":
                    return APP . "/view/" . $kind . "/afterLogin/personalArea.php";
                    break;
                case "personalArea":
                    return APP . "/view/" . $kind . "/afterLogin/personalArea.php";
                    break;
                case "timeTable":
                    return APP . "/view/" . $kind . "/afterLogin/student/personalTable.php";
                    break;
                case "commonWall":
                    return APP . "/view/" . $kind . "/afterLogin/student/commonWall.php";
                    break;
                case "messageWall":
                    return APP . "/view/" . $kind . "/afterLogin/teacher/messageWall.php";
                    break;
                case "test":
                    return APP . "/view/" . $kind . "/afterLogin/teacher/test.php";
                    break;
                case "lecture":
                    return APP . "/view/" . $kind . "/afterLogin/lecture.php";
                    break;
                case "enterPersonalArea":
                    return APP . "/view/" . $kind . "/afterLogin/personalArea.php";
                    break;
                default:
                    return APP . "/view/" . $kind . "/beforeLogin/bodyEnter.php";
            }
        }
        else
        {
            switch ($get['go']) {
                case "createAccount":
                    return APP . "/controllers/bodyReg.php";
                    break;
                case "enter":
                    return APP . "/view/" . $kind . "/beforeLogin/bodyEnter.php";
                    break;
                case "exit":
                    return APP . "/view/" . $kind . "/beforeLogin/bodyEnter.php";
                    break;
                case "registration":
                    return APP . "/controllers/personalArea.php";
                    break;
                case "save":
                    return APP . "/controllers/personalArea.php";
                    break;
                case "personalArea":
                    return APP . "/controllers/personalArea.php";
                    break;
                case "timeTable":
                    return APP . "/controllers/student/personalTable.php";
                    break;
                case "commonWall":
                    return APP . "/controllers/student/commonWall.php";
                    break;
                case "messageWall":
                    return APP . "/controllers/teacher/messageWall.php";
                    break;
                case "test":
                    return APP . "/controllers/teacher/test.php";
                    break;
                case "lecture":
                    return APP . "/controllers/lecture.php";
                    break;
                case "enterPersonalArea":
                    return APP . "/controllers/personalArea.php";
                    break;
                default:
                    return APP . "/view/" . $kind . "/beforeLogin/bodyEnter.php";
            }
        }
    }