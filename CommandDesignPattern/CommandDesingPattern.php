<?php

//require functions of TurnOffRadio class
include "TurnOffRadio.php";
//require functions of TurnOnRadio class
include "TurnOnRadio.php";


// logic to invoke the given command
if (class_exists($in)) $command = new $in(new RadioControl());
else throw new Exception('..Command Not Found !!!');

//logic to execute and display the output result
$command->execute();
echo "\n";

//@var string $in holds the command to turnOff/turnOn the radio
$in = 'turnOffRadio';
