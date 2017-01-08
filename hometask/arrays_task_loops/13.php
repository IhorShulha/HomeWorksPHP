<?php
/**
 * Вывести таблицу умножения
 */
echo '<table><tr>';
for ($i = 1; $i <= 10; $i++) {
    for ($n = 1; $n <=10; $n++)
        echo '<td>' .($i*$n). '</td>';
    if($i != 10)
        echo '</tr><tr>';
}
echo '</tr></<table>';
