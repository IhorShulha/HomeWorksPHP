<?php
/**
 * Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 9
 * рядов, а не 5.
 */
	for ($i = 1; $i <= 9; $i++) {
	    for ($a = 0; $a < $i; $a++) {
	        $str .= $i;
	    }
	    echo $str.'<br>';
	    $str = '';
	    $a = 0;
    }
