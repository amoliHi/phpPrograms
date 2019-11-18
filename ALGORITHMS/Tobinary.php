<?php

require "AlgorithmsUtility.php";
$object = new AlgorithmsUtility();

echo "Enter the number you want binary representation of:-\n";
$n1 = readline();
$object->toBinary($n1);
