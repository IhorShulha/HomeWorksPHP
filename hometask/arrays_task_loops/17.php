<?php
/*
 * 17.Составьте массив месяцев.
 * С помощью цикла foreach выведите все месяцы, а текущий месяц выведите жирным.
 * Текущий месяц должен храниться в переменной $month.</p>
*/
$arr = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$month = 1;
foreach ($arr as $key => $elem)
{
    if ($key == $month - 1)
    {
        echo "<b>$elem</b><br>";
    }
    else
    {
        echo $elem.'<br>';
    }
}
?>