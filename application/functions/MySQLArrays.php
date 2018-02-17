<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 01.02.2018
 * Time: 11:40
 */

    /**
     * Раздатчик массивов инструкций для аргумента select
     * @param string        $name      название нужного массива инструкции
     * @return array
     */
    function chooseSelect($name)
    {
        switch ($name) {
            case "pAUser":
                $select['u']['id'] = "user_id";
                $select['u']['name'] = "user_name";
                $select['u']['surname'] = "user_surname";
                $select['u']['email'] = "user_email";
                $select['u']['password'] = "user_password";
                $select['sg']['id'] = "group_id";
                $select['sg']['name'] = "group_name";
                $select['sg']['year'] = "group_year";
                $select['i']['id'] = "institute_id";
                $select['i']['name'] = "institute_name";
                $select['ut']['id'] = "type_id";
                $select['ut']['name'] = "type_name";
                return $select;
                break;

            case "email":
                $select['user']['id'] = "id";
                $select['user']['email'] = "user_email";
                $select['user']['password'] = "user_password";
                return $select;
                break;

            case "group":
                $select['stud_group']['id'] = "group_id";
                $select['stud_group']['name'] = "group_name";
                return $select;
                break;

            case "pATeacher":
                $select['ut']['id'] = "teacher_id";
                $select['ut']['name'] = "teacher_name";
                $select['ut']['surname'] = "teacher_surname";
                $select['ut']['email'] = "teacher_email";
                $select['ut']['password'] = "teacher_password";
                $select['i']['name'] = "institute_name";
                $select['utype']['id'] = "type_id";
                $select['utype']['name'] = "type_name";
                return $select;
                break;

            case "emailTeacher":
                $select['user_teacher']['id'] = "id";
                $select['user_teacher']['email'] = "teacher_email";
                $select['user_teacher']['password'] = "teacher_password";
                return $select;
                break;

            case "institute":
                $select['institute']['id'] = "institute_id";
                $select['institute']['name'] = "institute_name";
                return $select;
                break;

            case "cWUser":
                $select['u']['id'] = "user_id";
                $select['u']['name'] = "user_name";
                $select['u']['surname'] = "user_surname";
                $select['u']['email'] = "user_email";
                $select['u']['password'] = "user_password";
                $select['sg']['id'] = "group_id";
                $select['sg']['year'] = "group_year";
                $select['ut']['id'] = "type_id";
                return $select;
                break;

            case "message":
                $select['m']['id'] = "message_id";
                $select['m']['content'] = "message_content";
                $select['m']['time'] = "message_time";
                $select['m']['user_id'] = "user_id";
                $select['m']['stud_group_id'] = "group_id";
                $select['u']['name'] = "user_name";
                $select['u']['surname'] = "user_surname";
                $select['u']['user_type_id'] = "user_type";
                $select['sg']['id'] = "group_id";
                $select['sg']['name'] = "group_name";
                $select['sg']['year'] = "group_year";
                $select['ut']['id'] = "teacher_id";
                $select['ut']['name'] = "teacher_name";
                $select['ut']['surname'] = "teacher_surname";
                return $select;
                break;

            case "pTUser":
                $select['u']['id'] = "user_id";
                $select['sg']['id'] = "group_id";
                $select['sg']['institute_id'] = "institute_id";
                $select['ut']['id'] = "type_id";
                return $select;
                break;

            case "pTTable":
                $select['st']['id'] = "id";
                $select['st']['tr'] = "tr";
                $select['day']['id'] = "day_id";
                $select['day']['name'] = "day";
                $select['st']['time_lesson'] = "time";
                $select['week']['id'] = "week_id";
                $select['week']['name'] = "week";
                $select['less']['id'] = "lesson_id";
                $select['less']['name'] = "lesson";
                $select['type']['id'] = "type_id";
                $select['type']['name'] = "type";
                $select['st']['room_lesson'] = "room";
                $select['st']['table_order'] = "table_order";
                $select['b']['id'] = "build_id";
                $select['b']['name'] = "build";
                $select['ut']['id'] = "teacher_surname_id";
                $select['ut']['name'] = "teacher_name";
                $select['ut']['surname'] = "teacher_surname";
                $select['st']['stud_group_id'] = "group_id";
                return $select;
                break;

            case "lGroup":
                $select['u']['id'] = "user_id";
                $select['sg']['id'] = "group_id";
                $select['sg']['name'] = "group_name";
                return $select;
                break;

            case "mWTeacher":
                $select['ut']['id'] = "user_id";
                $select['ut']['institute_id'] = "institute_id";
                return $select;
                break;

            case "tTest":
                $select['t']['id'] = "id";
                $select['t']['name'] = "test_name";
                $select['t']['teacher_id'] = "teacher_id";
                return $select;
                break;

            case "tQuest":
                $select['q']['id'] = "id";
                $select['q']['content'] = "question_content";
                return $select;
                break;

            case "fullTest":
                $select['a']['id'] = "id";
                $select['a']['content'] = "answer_content";
                $select['q']['id'] = "question_id";
                $select['q']['content'] = "question_content";
                $select['t']['id'] = "test_id";
                $select['t']['max'] = "test_max";
                $select['t']['name'] = "test_name";
                $select['ut']['id'] = "teacher_id";
                return $select;
                break;

            case "correctAnswer":
                $select['ta']['id'] = "id";
                $select['ta']['number'] = "answer_number";
                $select['t']['id'] = "test_id";
                $select['t']['name'] = "test_name";
                $select['ut']['id'] = "teacher_id";
                return $select;
                break;

            case "userAnswer":
                $select['ua']['id'] = "id";
                $select['ua']['number'] = "answer_number";
                $select['ua']['user_id'] = "user_id";
                $select['t']['id'] = "test_id";
                $select['t']['name'] = "test_name";
                $select['ut']['id'] = "teacher_id";
                return $select;
                break;

            case "tUser":
                $select['utest']['user_id'] = "user_id";
                $select['utest']['test_id'] = "test_id";
                $select['u']['name'] = "user_name";
                $select['u']['surname'] = "user_surname";
                $select['sg']['name'] = "group_name";
                return $select;
                break;

            default:
                echo "Массив не сработал";

        }
    }

    /**
     * Раздатчик массивов инструкций для аргумента join
     * @param string        $name      название нужного массива инструкции
     * @return array
     */
    function chooseJoin($name)
    {
        switch ($name) {
            case "cWUser":
                $join["`stud_group`"]["`sg`"] = "`u`.`group_id` = `sg`.`id`";
                $join["`user_type`"]["`ut`"] = "`u`.`user_type_id` = `ut`.`id`";
                return $join;
                break;

            case "pTUser":
                $join["`stud_group`"]["`sg`"] = "`u`.`group_id` = `sg`.`id`";
                $join["`user_type`"]["`ut`"] = "`u`.`user_type_id` = `ut`.`id`";
                return $join;
                break;

            case "pAUser":
                $join["`stud_group`"]["`sg`"] = "`u`.`group_id` = `sg`.`id`";
                $join["`institute`"]["`i`"] = "`sg`.`institute_id` = `i`.`id`";
                $join["`user_type`"]["`ut`"] = "`u`.`user_type_id` = `ut`.`id`";
                return $join;
                break;

            case "pATeacher":
                $join["`institute`"]["`i`"] = "`ut`.`institute_id` = `i`.`id`";
                $join["`user_type`"]["`utype`"] = "`ut`.`user_type_id` = `utype`.`id`";
                return $join;
                break;

            case "message":
                $join["`stud_group`"]["`sg`"] = "`m`.`stud_group_id` = `sg`.`id`";
                $join["`user`"]["`u`"] = "`m`.`user_id` = `u`.`id`";
                $join["`user_teacher`"]["`ut`"] = "`m`.`teacher_id` = `ut`.`id`";
                return $join;
                break;

            case "pTTable":
                $join["`day`"]["`day`"] = "`st`.`day_id` = `day`.`id`";
                $join["`week`"]["`week`"] = "`st`.`week_id` = `week`.`id`";
                $join["`lesson`"]["`less`"] = "`st`.`lesson_id` = `less`.`id`";
                $join["`type`"]["`type`"] = "`st`.`type_id` = `type`.`id`";
                $join["`building`"]["`b`"] = "`st`.`building_id` = `b`.`id`";
                $join["`user_teacher`"]["`ut`"] = "`st`.`teacher_id` = `ut`.`id`";
                return $join;
                break;

            case "lGroup":
                $join["`stud_group`"]["`sg`"] = "`u`.`group_id` = `sg`.`id`";
                return $join;
                break;

            case "fullTest":
                $join["`questions`"]["`q`"] = "`a`.`questions_id` = `q`.`id`";
                $join["`test`"]["`t`"] = "`q`.`test_id` = `t`.`id`";
                $join["`user_teacher`"]["`ut`"] = "`t`.`teacher_id` = `ut`.`id`";
                return $join;
                break;

            case "correctAnswer":
                $join["`test`"]["`t`"] = "`ta`.`test_id` = `t`.`id`";
                $join["`user_teacher`"]["`ut`"] = "`t`.`teacher_id` = `ut`.`id`";
                return $join;
                break;

            case "userAnswer":
                $join["`test`"]["`t`"] = "`ua`.`test_id` = `t`.`id`";
                $join["`user_teacher`"]["`ut`"] = "`t`.`teacher_id` = `ut`.`id`";
                return $join;
                break;

            case "tUser":
                $join["`user`"]["`u`"] = "`utest`.`user_id` = `u`.`id`";
                $join["`stud_group`"]["`sg`"] = "`u`.`group_id` = `sg`.`id`";
                return $join;
                break;

            default:
                echo "Массив не сработал";

        }
    }

    /**
     * Раздатчик массивов инструкций для аргумента insert
     * @param string        $name      название нужного массива инструкции
     * @param array        $get      массив GET
     * @param array        $post      массив POST
     * @param array        $var      массив необходимых переменных
     * @return array
     */
    function chooseInsert($name, $get = null, $post = null, $var = null)
    {
        switch ($name) {
            case "pAUser":
                $values[0]["`id`"] = NULL;
                $values[0]["`name`"] = "'{$post['name']}'";
                $values[0]["`surname`"] = "'{$post['surname']}'";
                $values[0]["`email`"] = "'{$post['email']}'";
                $values[0]["`password`"] = "'{$post['password']}'";
                $values[0]["`user_type_id`"] = "'{$post['user']}'";
                $values[0]["`group_id`"] = "'{$var[0]['group_id']}'";
                return $values;
                break;

            case "pATeacher":
                $values[0]["`id`"] = NULL;
                $values[0]["`name`"] = "'{$post['name']}'";
                $values[0]["`surname`"] = "'{$post['surname']}'";
                $values[0]["`email`"] = "'{$post['email']}'";
                $values[0]["`password`"] = "'{$post['password']}'";
                $values[0]["`user_type_id`"] = "'{$post['user']}'";
                $values[0]["`institute_id`"] = "'{$var[0]['institute_id']}'";
                return $values;
                break;

            case "cWMessage":
                $values[0]["`id`"] = NULL;
                $values[0]["`content`"] = "'{$post['content']}'";
                $values[0]["`time`"] = "CURRENT_TIMESTAMP";
                $values[0]["`user_id`"] = "'{$var[0]['user_id']}'";

                if ($get['type'] == "other") {
                    $values[0]["`stud_group_id`"] = "'{$var[0]['group_id']}'";
                    $values[0]["`teacher_id`"] = "'0'";
                } elseif ($get['type'] == "my") {
                    $values[0]["`teacher_id`"] = "'{$var[0]['teacher_id']}'";
                    $values[0]["`stud_group_id`"] = "'0'";
                }
                return $values;
                break;

            case "pTTable":
                $values[$var[0]]["`id`"] = NULL;
                $values[$var[0]]["`tr`"] = "'{$var[2]}'";
                $values[$var[0]]["`table_order`"] = "'{$post['order'][$var[0]]}'";
                $values[$var[0]]["`day_id`"] = "'{$post["day"][$var[0]]}'";
                $values[$var[0]]["`time_lesson`"] = "'{$post['time'][$var[0]]}'";
                $values[$var[0]]["`week_id`"] = "'{$post['week'][$var[0]]}'";
                $values[$var[0]]["`lesson_id`"] = "'{$post['lesson'][$var[0]]}'";
                $values[$var[0]]["`type_id`"] = "'{$post['type'][$var[0]]}'";
                $values[$var[0]]["`room_lesson`"] = "'{$post['room'][$var[0]]}'";
                $values[$var[0]]["`building_id`"] = "'{$post['build'][$var[0]]}'";
                $values[$var[0]]["`teacher_id`"] = "'{$post['teachSurname'][$var[0]]}'";
                $values[$var[0]]["`stud_group_id`"] = "'{$var[1]}'";
                return $values;
                break;

            case "tTest":
                $values[0]["`id`"] = NULL;
                $values[0]["`max`"] = count($post['question']);
                $values[0]["`name`"] = "'{$post['testName']}'";
                $values[0]["`teacher_id`"] = "'{$get}'";
                return $values;
                break;

            case "tQuestions":
                $values[$var[0]]["`id`"] = NULL;
                $values[$var[0]]["`content`"] = "'{$post['question'][$var[0]]}'";
                $values[$var[0]]["`test_id`"] = "'{$var[1]}'";
                return $values;
                break;

            case "tAnswers":
                $values[$var[0]]["`id`"] = NULL;
                $values[$var[0]]["`order_answer`"] = "'{$var[2]}'";
                $values[$var[0]]["`content`"] = "'{$post['answer'][$var[0]]}'";
                $values[$var[0]]["`questions_id`"] = "'{$var[1]}'";
                return $values;
                break;

            case "tTAnswer":
                $values[$var[0]]["`id`"] = NULL;
                $values[$var[0]]["`number`"] = "'{$post['trueAnsw'][$var[0]]}'";
                $values[$var[0]]["`test_id`"] = "'{$var[1]}'";
                return $values;
                break;

            case "tUAnswer":
                $values[$var[0]]["`id`"] = NULL;
                $values[$var[0]]["`number`"] = "'{$post['userAnsw'][$var[0]]}'";
                $values[$var[0]]["`user_id`"] = "'{$get}'";
                $values[$var[0]]["`test_id`"] = "'{$var[1]}'";
                return $values;
                break;

            case "tUTest":
                $values[$var[0]]["`id`"] = NULL;
                $values[$var[0]]["`user_id`"] = "'{$get}'";
                $values[$var[0]]["`test_id`"] = "'{$var[1]}'";
                return $values;
                break;

            case "t2g":
                $values[0]["`id`"] = NULL;
                $values[0]["`test_id`"] = "'{$var[1]}'";
                $values[0]["`group_id`"] = "'{$var[0]}'";
                return $values;
                break;

            default:
                echo "Массив не сработал";

        }
    }

    /**
     * Раздатчик массивов инструкций для аргумента update
     * @param string        $name      название нужного массива инструкции
     * @param array        $post      массив POST
     * @param array        $var      массив необходимых для инструкции переменных
     * @return array
     */
    function chooseUpdate($name, $post = null, $var = null)
    {
        switch ($name) {
            case "pTTable":
                $values["tr"] = "{$var[2]}";
                $values["table_order"] = "{$post['order'][$var[0]]}";
                $values["day_id"] = "{$post["day"][$var[0]]}";
                $values["time_lesson"] = "{$post['time'][$var[0]]}";
                $values["week_id"] = "{$post['week'][$var[0]]}";
                $values["lesson_id"] = "{$post['lesson'][$var[0]]}";
                $values["type_id"] = "{$post['type'][$var[0]]}";
                $values["room_lesson"] = "{$post['room'][$var[0]]}";
                $values["building_id"] = "{$post['build'][$var[0]]}";
                $values["teacher_id"] = "{$post['teachSurname'][$var[0]]}";
                $values["stud_group_id"] = "{$var[1]}";
                return $values;
                break;

            case "pAUser":
                $values["name"] = "{$post['name']}";
                $values["surname"] = "{$post['surname']}";
                $values["email"] = "{$post['email']}";
                $values["group_id"] = "{$var[0]['group_id']}";
                return $values;
                break;

            case "pATeacher":
                $values["name"] = "{$post['name']}";
                $values["surname"] = "{$post['surname']}";
                $values["email"] = "{$post['email']}";
                return $values;
                break;

            case "tTest":
                $values["max"] = "{$post['count']}";
                $values["name"] = "{$post['testName']}";
                return $values;
                break;

            case "tQuest":
                $values["content"] = "{$post['question'][$var[0]]}";
                return $values;
                break;

            case "tAnswers":
                $values["content"] = "{$post['answer'][$var[0]]}";
                return $values;
                break;

            default:
                echo "Массив не сработал";
        };
    }