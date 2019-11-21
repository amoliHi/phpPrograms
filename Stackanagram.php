<?php

require("DataStructureUtility.php");
require("AlgorithmsUtility.php");

/**
 * Function to run the Program and test
 */
function stackAna(){
    $stack = new Stack();
    //getting prime number
    $arr = getprime(1000);
    //checking prime numbers which are anagrams
    for ($i=0; $i < count($arr); $i++) { 
        for ($j=0; $j < count($arr); $j++) { 
            if($i!=$j){
            if(AlgorithmsUtility::isAnagram($arr[$i] , $arr[$j])){
                $stack->push($arr[$i]);
                break;
            }
        }
        }
    }
    //Prininting anagram sin stack
    echo "Prime Anagrams In Stack Are :\n";
    PrintRevStack($stack);
}
/**
 * Function to Print stack in reverse
 */
function PrintRevStack($stack){
    for ($i=0; $i < $stack->size() ; $i++) { 
        echo $stack->pop()."," ;
    }
    echo "\n";
}

stackAna();

function getprime($range){
    //array to store prime no
    $prime = [] ;
    //variacle to set index
    $count= 0;
    for ($i=2; $i < $range ; $i++) { 
        if(AlgorithmsUtility::isprime($i)){
            $prime[$count++] = $i;
        }
    }
    return $prime;
}
?>