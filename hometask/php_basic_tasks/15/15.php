<?php
include '15.html';
$operator = $_POST ['operator'];
$a = $_POST ['a'];
$b = $_POST ['b'];

if ($b==0 and $operator=='/'){
    echo "на 0 делить нельзя";
}else {
    if ($operator == '+') {$result=$a + $b;}
    if ($operator == '-') {$result=$a - $b;}
    if ($operator =='/')  {$result=$a / $b;}
    if ($operator == '*') {$result=$a * $b;}
    if ($operator == '%') {$result=$a % $b;}
    echo $a .$operator .$b .'='  .$result;
}
?>