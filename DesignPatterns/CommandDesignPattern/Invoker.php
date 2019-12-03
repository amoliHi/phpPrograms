<?php

include "TurnOffRadio.php";
include "TurnOnRadio.php";

// Client
$in = 'turnOffRadio';
 
// Invoker
if (class_exists ( $in )) {
    $command = new $in ( new RadioControl () );
} else {
    throw new Exception ( '..Command Not Found..' );
}
 
$command->execute ();
echo "\n";