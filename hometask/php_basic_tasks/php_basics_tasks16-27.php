﻿<?php
//16. Cоздайте две переменные $a и $b, значения которых будут числами. Выведите максимальное число из этих двух.

$a=5;
$b=8;
echo max($a,$b);

/* 17. Создайте две переменные $a = '78' (строковый тип) и $b = 78 (целочисленный тип).
Проверьте эти две переменные на равность, с помощью if выведите "равны" или "не равны"
*/
$a='78';
$b=79;
if($a==$b){
    echo "Числа равны<br/>";
}else{
    echo "Не равны<br/>";
}

//18.
$a='78';
$b=78;
if($a===$b){
    echo "эквивалентны<br/>";
}else{
    echo "Не эквивалентны<br/>";
}

//19.Выведите результат сравнения $a и $b из п.17 с помощью var_dump.



/*20. Приведите число 20 к типу boolean. 
Объясните результат
имеет 2 значения истинна или ложь.Ноль или пустая строка false,остально-true
*/
$a=(boolean)20;
var_dump ($a);


/*21.  * Приведите число 0 к типу boolean. Объясните результат
 Boolean имеет 2 значения истинна или ложь.Ноль или пустая строка false,остально-true
 */
$a=(boolean)0;
var_dump ($a);


/*22. * Приведите число -20 к типу boolean. Объясните результат.
 * Boolean имеет 2 значения истинна или ложь.Ноль или пустая строка false,остально-true
 */
$a=(boolean)-20;
var_dump ($a);


//23. Напишите 3 строки, используя три разные функции для вывода текста.
echo '1 строка';
print_r('2 строка');
print '3 строка';



/* 26.Объявите константу DAYS_COUNT равную 7 и константу MONTH_COUNT равную 12 двумя разными способами объявления констант
 */
define('DAYS_COUNT',7);
echo DAYS_COUNT ."<br>" ;
const MONTH_COUNT=12;
echo MONTH_COUNT;