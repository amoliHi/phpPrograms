<?php

require "AlgorithmsUtility.php";

$object = new AlgorithmsUtility();
$time1=microtime(true);
$object->bubblSort_Integer();
$time2=microtime(true);
$elapsedtime1=$time1-$time2;
echo "Time elapsed for running bubble sort for integer is: " . $elapsedtime1."\n";

$time3=microtime(true);
$object->bubblSort_String();
$time4=microtime(true);
$elapsedtime2=$time3-$time4;

echo "Time elapsed for running bubble sort for String is: " . $elapsedtime2."\n";

?>