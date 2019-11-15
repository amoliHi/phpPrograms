<?php
class Exam
{
static function vending_machine(){
$amount=readline("Enter the amoutn: \n");

$notesarray=array(1000,500,100,50,10,5,2,1);
$countarray=array(0,0,0,0,0,0,0,0,0);

for($i=0;$i<=8;$i++){
    if($amount >= $notesarray[$i]) 
    { 
        $countarray[$i] = intval($amount / $notesarray[$i]); 
        $amount = $amount - $countarray[$i] * $notesarray[$i]; 
    } 
}

for($i=0;$i<8;$i++){
    if($countarray[$i] != 0)  
    { 
      echo ($notesarray[$i]." : ".$countarray[$i]."\n"); 
    } 
}
}
}

//date("d-m-Y h:i:s"); 
?>