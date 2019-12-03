<?php



 

 
 
// Client
$in = 'turnOffRadio';
 
// Invoker
if (class_exists ( $in )) {
    $command = new $in ( new radioControl () );
} else {
    throw new Exception ( '..Command Not Found..' );
}
 
$command->execute ();