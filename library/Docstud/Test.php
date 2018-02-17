<?php
/**
 * Created by PhpStorm.
 * User: VladKor
 * Date: 29.01.2018
 * Time: 19:09
 */

namespace Docstud;


class Test
{
    /**
     * Формирование шаблона теста для его заполнения
     * @param array $post   Массив POST
     * @param array $fullTest  Массив информации о тесте
     * @param array $trueAnswer   Массив правильных ответов на вопросы в тесте
     * @return string
     */
    public function printInputTest($post, $fullTest = null, $trueAnswer = null)
    {
        if(!empty($fullTest))
        {
            $count = $fullTest[0]['test_max'];
        }
        else
        {
            $count = $post["count"];
        }
        $text = "";
        $answ = 0;

        for($i=0; $i<$count; $i++)
        {
            $text .= '<div class="question">'.($i+1).')<input class="questionInput" type="text" name="question[]" placeholder="Вопрос"';
            if(!empty($fullTest))
            {
                $text .= 'value="' . $fullTest[$answ]['question_content'];
            }
            $text .= '"></div>';
            for($j=0; $j<4; $j++)
            {
                $text .= '<div class="answer">';
                $text .= '<input class="answerInput" type="text" name="answer[]" placeholder="Ответ"';
                if(!empty($fullTest))
                {
                    $text .= 'value="' . $fullTest[$answ]['answer_content'] . '"';
                }
                $text .= '>';
                $text .= '<input type="radio" class="radio" required ';
                if(!empty($fullTest))
                {
                    $text .= $this->chooseChecked($j, ($trueAnswer[$i]["answer_number"]-1));
                }
                $text .= ' name="trueAnsw['.$i.']" value="'.($j+1).'">';
                $text .= '</div>';

                $answ++;
            }
        }
        return $text;
    }

    /**
     * Формирование шаблона теста без редактирования
     * @param array $fullTest  Массив информации о тесте
     * @return string
     */
    public function printTest($fullTest = null)
    {
        $count = $fullTest[0]['test_max'];

        $text = "";
        $answ = 0;

        for($i=0; $i<$count; $i++)
        {
            $text .= '<div class="question"><b>'.($i+1).')</b> ';
            $text .= $fullTest[$answ]['question_content'];
            $text .= '</div>';
            for($j=0; $j<4; $j++)
            {
                $text .= '<div class="answer">';
                $text .= $fullTest[$answ]['answer_content'];
                $text .= '<input type="radio" class="radio" required name="userAnsw['.$i.']" value="'.($j+1).'">';
                $text .= '</div>';

                $answ++;
            }
        }
        return $text;
    }

    /**
     * Проверка на заполнение checkbox
     * @param integer $value  Итерация цикла
     * @param integer $trueValue  Номер выбранного checkbox
     * @return string
     */
    public function chooseChecked($value, $trueValue)
    {
        if($value == $trueValue)
        {
            return "checked";
        }
    }

    /**
     * Формирование списка option
     * @param array $arr  Массив названий для списка
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

    /**
     * Формирование колличества правильных ответов
     * @param array $correctAnswer  Список правильных ответов
     * @param array $userAnswer  Список пользовательских ответов
     * @return integer
     */
    public function numberOfCorrectAnswers ($correctAnswer, $userAnswer)
    {
        $number = 0;
        for($j=0; $j<count($correctAnswer); $j++)
        {
            if($userAnswer[$j]["answer_number"] == $correctAnswer[$j]["answer_number"])
            {
                $number++;
            };
        };
        return $number;
    }

    /**
     * Формирование колличества правильных ответов
     * @param array $correctAnswer  Список правильных ответов
     * @param integer $result  Колличество правильных ответов
     * @return integer
     */
    public function calculationOfPoints($correctAnswer, $result)
    {
        return round((100/count($correctAnswer))*$result);
    }

    /**
     * Формирование шаблона статистики теста
     * @param integer $i  Итерация цикла
     * @param array $user  Массив информации о пользователе
     * @param array $userAnswer  Список пользовательских ответов
     * @param array $correctAnswer  Список правильных ответов
     * @return string
     */
    public function tableStat ($i, $user, $userAnswer, $correctAnswer)
    {

        $result = $this->numberOfCorrectAnswers ($correctAnswer, $userAnswer);

        $text = '';
        $text .= '<tr>';
        $text .= '<td>'.$user[$i]['user_name'].' '.$user[$i]["user_surname"].'</td>';
        $text .= '<td>'.$user[$i]['group_name'].'</td>';
        $text .= '<td>'.$result.'</td>';
        $text .= '<td>'.count($correctAnswer).'</td>';
        $text .= '<td>'.$this->calculationOfPoints($correctAnswer, $result).'</td>';
        $text .= '</tr>';

        return $text;
    }
}