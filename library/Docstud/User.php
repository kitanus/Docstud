<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 28.10.2017
 * Time: 21:30
 */

namespace Docstud;

class user
{
    protected $name;
    protected $surname;
    protected $institute;
    protected $group;
    protected $email;
    protected $type;

    /**
     * Конструктор.
     */
    public function __construct($mass = null)
    {
        if($mass[0]['type_id'] != 3) {
            $this->name = $mass[0]['user_name'];
            $this->surname = $mass[0]['user_surname'];
            $this->institute = $mass[0]['institute_name'];
            $this->group = $mass[0]['group_name'];
            $this->email = $mass[0]['user_email'];
        }else{
            $this->name = $mass[0]['teacher_name'];
            $this->surname = $mass[0]['teacher_surname'];
            $this->institute = $mass[0]['institute_name'];
            $this->email = $mass[0]['teacher_email'];
        }
        $this->type = $mass[0]['type_id'];

    }

    public function getType(){
        return $this->type;
    }

    /**
     * Вывод информации пользователя в личном кабинете
     * @param string $var   название требуемой информации
     */
    public function registerName ($var)
    {
        switch ($var)
        {
            case "name":
                if(strlen($this->name) > 1)
                {
                    print $this->name;
                }
                else
                {
                    print "Введите текст";
                }
                break;

            case "surname":
                if(strlen($this->surname) > 1)
                {
                    print $this->surname;
                }
                else
                {
                    print "Введите текст";
                }
                break;

            case "group":
                if(strlen($this->group) > 1)
                {
                    print $this->group;
                }
                else
                {
                    print "Введите текст";
                }
                break;

            case "email":
                if(strlen($this->email) > 1)
                {
                    print $this->email;
                }
                else
                {
                    print "Введите текст";
                }
                break;
        }

    }

    /**
     * Закрепление институтра пользователя в личном кабинете
     * @param string $change   название выбранного института
     */
    public function institute($change)
    {
            if($this->institute == $change)
            {
                print "selected";
            }
    }

    /**
     * Формирование списка option
     * @param array $arr  Массив названий для списка
     * @return string
     */
    public function printOption ($arr, $name)
    {
        $option = "";
        foreach ($arr as $key => $arrTwo)
        {
                $option .= "<option value='{$arrTwo[$name]}'>{$arrTwo[$name]}</option>";
        }
        return $option;
    }

}