<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 30.10.2017
 * Time: 9:35
 */

namespace Docstud;

class Table
{

    public $sql_array;

    /**
     * Конструктор.
     */
    public function __construct($mass = null)
    {
        $this->sql_array = $mass;
    }

    /**
     * Формирование списка option
     * @param array $arr  Массив названий для списка
     * @return string
     */
    protected function printOption ($arr, $id)
    {
        $option = "";
        $count = 0;
        foreach ($arr as $key => $arrTwo)
        {
            foreach ($arrTwo as $keyTwo => $value)
            {
                $option .= "<option value='{$id[$count]["id"]}'>{$value}</option>";
                $count++;
            }
        }

        return $option;
    }

    /**
     * Вывод тега option с нужной информацией
     * @param integer $i  Итерация цикла
     * @param string $cell  Название ячейки
     * @return string
     */
    protected function trueOption ($i,$cell)
    {
        $option = "";
        if(!empty($this->sql_array[$i][$cell]))
        {
            $option = "<option value='".$this->sql_array[$i][$cell."_id"]."'>".$this->sql_array[$i][$cell]."</option>";
        }
        return $option;
    }

    /**
     * Вывод тега input с нужной информацией
     * @param integer $i  Итерация цикла
     * @param string $cell  Название ячейки
     * @return string
     */
    protected function trueInput ($i,$cell)
    {
        $input = "";
        if(!empty($this->sql_array[$i][$cell]))
        {
            $input = $this->sql_array[$i][$cell];
        }
        else
        {
            if($cell == "time")
            {
                $input = "8:00";
            }
            else
            {
                if($cell == "room")
                {
                    $input = "000";
                }
                else
                {
                    $input = $i+1;
                }
            }
        }
        return $input;
    }

    /**
     * Вывод информации для ячейки
     * @param integer $i  Итерация цикла
     * @param string $cell  Название ячейки
     * @return string
     */
    protected function trueCell ($i,$cell)
    {
        return $this->sql_array[$i][$cell];
    }

    /**
     * Формирование шаблона таблицы для студентов
     * @param integer $tr  Колличество строк
     * @return string
     */
    public function tableForStudent ($tr)
    {
         $textTable = "";
         $cellName = array("table_order", "day", "time", "week", "lesson", "type", "room", "build", "teacher_surname");

         for($i=0; $i<$tr; $i++)
         {
            $textTable .= '<tr>';

            for ($j=0; $j<count($cellName); $j++)
            {
                $textTable .= '<td><div class="bodyCenterTableCellUser">'.$this->trueCell($i, $cellName[$j]).'</div></td>';
            }

            $textTable .= '</tr>';
        }
        return $textTable;
    }

    /**
     * Формирование шаблона списка в ячейках таблицы
     * @param array $name  массив с названием select, с названием option
     * @param integer $i  Итерация цикла
     * @param array $nameCell  массив информации данного столбца таблицы
     * @return string
     */
    protected function printSelectCell($name, $i, $nameCell, $idCell)
    {
        $textSelect = "";
        $textSelect .= '<select ';

        if(!empty($name[2]))
        {
            $textSelect .= " id='".$name[2]."' ";
        }

        $textSelect .= 'name="'.$name[0].'[]">';
        $textSelect .= $this->trueOption($i, $name[1]);
        $textSelect .= $this->printOption($nameCell, $idCell);
        $textSelect .= '</select>';

        return $textSelect;
    }

    /**
     * Формирование шаблона таблицы для старосты
     * @param integer $tr  Колличество строк
     * @param array $nameCell  массив информации данного столбца таблицы
     * @param array $tableSql  массив информации таблицы
     * @return string
     */
    public function tableForStarosta ($tr, $nameCell, $idCell, $tableSql)
    {
        $textTable = "";
        for($i=0; $i<$tr; $i++)
        {
            $textTable .= '<tr>';
            $textTable .= '<td><input type="text" name="order[]" value="'.$this->trueInput($i,"table_order").'"></td>';
            $textTable .= '<td>'.$this->printSelectCell(["day","day"], $i, $nameCell[0], $idCell[0]).'</td>';
            $textTable .= '<td><input type="text" name="time[]" value="'.$this->trueInput($i,"time").'"></td>';
            $textTable .= '<td>'.$this->printSelectCell(["week","week"], $i, $nameCell[1], $idCell[1]).'</td>';
            $textTable .= '<td>'.$this->printSelectCell(["lesson","lesson","lessonObject"], $i, $nameCell[2], $idCell[2]).'</td>';
            $textTable .= '<td>'.$this->printSelectCell(["type","type"], $i, $nameCell[3], $idCell[3]).'</td>';
            $textTable .= '<td><input type="text" name="room[]" value="'.$this->trueInput($i,"room").'"></td>';
            $textTable .= '<td>'.$this->printSelectCell(["build","build"], $i, $nameCell[4], $idCell[4]).'</td>';
            $textTable .= '<td>'.$this->printSelectCell(["teachSurname","teacher_surname"], $i, $nameCell[5], $idCell[5]).'</td>';
            $textTable .= '<td><a href="/?go=timeTable&idDelete='.$tableSql[$i]['id'].'&tr='.$tr.'" class="bodyCenterTableCellClose">Delete</a></td>';
            $textTable .= '</tr>';
        }
        return $textTable;
    }
}