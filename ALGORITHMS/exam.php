<?php

class Questions {

   
    function search($lo, $hi) {
        if (($hi - $lo) === 1) 
        return $lo;
        $mid = $lo + ($hi - $lo) / 2;
        $ans=readline("Is it less than $mid.\n"."Press 1 for yes and 0 for no");
        if ($ans===1) 
        return search($lo, $mid);
        else                     
        return search($mid, $hi);
    }

    function take_input(){
        $k = readline("Enter a numer.\n");
        $n = abs(pow(2, $k));
        echo "Think of a number between 0 and ".($k-1)."\n";
        Questions::search(0, $n);
        echo "Your number is: ". search();   
    }
}
$obj = new Questions();
$obj->take_input();

//date("d-m-Y h:i:s"); 
?>