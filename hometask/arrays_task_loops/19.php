<?php
/**
 * Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а
 * текущий день выведите курсивом. Текущий день должен храниться в переменной $day.
 */
$arr = ['Mon', 'Thu', 'Wen', 'Th', 'Fr', 'Sat', 'Sun'];
$day = 5;
foreach ($arr as $key => $day)
{
    if ($key == $day - 1)
    {
        echo "<i>$day</i><br>";
    }
    else
    {
        echo $day.'<br>';
    }
}