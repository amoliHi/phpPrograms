<?php

require "AlgorithmsUtility.php";


$object = new AlgorithmsUtility();
$time1=microtime(true);
$object->binarySearch_Integer();
$time2=microtime(true);
$elapsedtime1=$time1-$time2;
echo "Time elapsed for running binary search for integer is: " . $elapsedtime1."\n";

?>