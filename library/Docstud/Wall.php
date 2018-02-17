<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 05.12.2017
 * Time: 14:06
 */

namespace Docstud;

class Wall
{

    protected $type;

    /**
     * Конструктор.
     */
    public function __construct($arr = null)
    {
        if(!empty($arr['type'])) {
            $this->type = $arr['type'];
        }
    }

    /**
     * Есть ли на данный момент сообщения
     * @param string $content   текст шаблона сообщений.
     * @return string
     */
    public function existenceMessage($content)
    {
        if ($content === true) {
            return $content;
        } else {
            return "not message";
        }
    }

    /**
     * Из какой таблицы брать информацию, в зависимости от типа стены
     * @param integer $groupId   Индефикатор группы.
     * @param integer $userId   Индефикатор пользователя.
     * @return string
     */
    public function choiceWhereWall($groupId, $userId)
    {
        if ($this->type == "other")
        {
            return "`sg`.`id` = '{$groupId}' AND `sg`.`id` > 0";
        }
        elseif ($this->type == "my")
        {
            return "`u`.`id` = '{$userId}' AND `ut`.`id` > 0";
        }
    }


    /**
     * Вывод информации о отправителе в footer сообщения
     * @param array $arr   Массив информации о сообщениях.
     * @return string
     */
    public function choiceOutputMessage($arr)
    {
        if($this->type == "other")
        {
            if(!empty($arr['user_name']) && !empty($arr['user_surname'])) {
                return $arr['user_name'] . " " . $arr['user_surname'];
            }elseif (!empty($arr['teacher_name']) && !empty($arr['teacher_surname'])){
                return "Преподаватель: ".$arr['teacher_name'] . " " . $arr['teacher_surname'];
            }
        }
        elseif ($this->type == "my")
        {
            return $arr['teacher_name'] . " " . $arr['teacher_surname'];
        }

        if($arr['user_id'] == 0)
        {
            return "Группа: ".$arr['group_name'];
        }
        elseif($arr['group_id'] == 0)
        {
            return $arr['user_name'] . " " . $arr['user_surname'];
        }
    }

    /**
     * Вывод CSS стилей в зависимости от пользователя
     * @param array $arr   Массив информации о сообщениях.
     * @return string
     */
    public function cssIfType($arr)
    {
        if($this->type == "other") {
            if ($arr['user_type'] == 1) {
                return 'style="box-shadow: 0 0 10px #63ff00";';
            } elseif ($arr['user_type'] == 2) {
                return " ";
            } else {
                return 'style="box-shadow: 0 0 30px red";';
            }
        }

        if($arr['group_id'] == 0) {
            return 'style="box-shadow: 0 0 30px red";';
        }
    }

    /**
     * Формирования шаблона списка option
     * @param array $arr   Список емайлов или групп
     * @return string
     */
    public function printOption ($arr)
    {
        $option = "";
        foreach ($arr as $key => $arrTwo)
        {
            foreach ($arrTwo as $keyTwo => $value)
            {
                $option .= "<option value='{$value}'>{$value}</option>";
            }
        }
        return $option;
    }



}