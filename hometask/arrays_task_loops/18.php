<?php
/**
 * Составьте массив дней недели. С помощью цикла foreach выведите все дни недели,
выходные дни следует вывести жирным.
 */

$arr = array('Mon', 'Th', 'Wh', 'Th', 'Fr', 'Sat', 'Sun');
foreach ($arr as $key => $day)
{
    if ($key == 5 or $key == 6)
    {
        echo "<b>$day</b><br>";
    }
    else
    {
        echo $day.'<br>';
    }
}
