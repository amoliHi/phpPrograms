<?php

require "AlgorithmsUtility.php";
$object = new AlgorithmsUtility();


echo "Enter the number you want binary representation of:-\n";
$num1 = readline();
$object->toBinary($num1);
$object->swapNibbles($num1);
?>