<?php

require("AlgorithmsUtility.php");
/**
 * Function to get the prime numbers from 0 o range 
 * 
 * @param range the range till which to find the prime numbers
 * @return array array of prime numbers
 */
function getprime($range)
{
    //array to store prime no
    $prime = [];
    //variacle to set index
    $count = 0;
    for ($i = 2; $i < $range; $i++) {
        if (AlgorithmsUtility::isprime($i)) {
            $prime[$count++] = $i;
        }
    }
    return $prime;
}
/**
 * function to get the index to store number in specified place
 */
function getIndex($numb)
{
    $num = $numb;
    if ($num < 100) {
        return 0;
    }
    while ($num > 9) {
        $num = floor($num / 10);
    }
    return $num;
}
/**
 * Function to run and test the other functions in the file
 */
function primeRun()
{
    $primeArr = getPrime(1000);
    $anagram = [];
    $nonAnagram = [];
    for ($i = 0; $i < count($primeArr); $i++) {
        for ($j = 0; $j < count($primeArr); $j++) {
            if ($i != $j) {
                if ($b = AlgorithmsUtility::isAnagram($primeArr[$i], $primeArr[$j])) {
                    array_push($anagram, $primeArr[$i]);
                    break;
                }
            }
        }
        if (!$b) {
            array_push($nonAnagram, $primeArr[$i]);
        }
    }
    //@d array to store the values 
    $array2d = [];
    //pushing two arrays in the 2d arrays
    array_push($array2d, $anagram);
    array_push($array2d, $nonAnagram);
    echo "2D array stored is : ";
    print2d($array2d);
    echo "\n";
}
function print2d($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        if ($i == 1) {
            echo "\nNon-Anagrams"."\n";
        } else {
            echo "Anagrams"."\n";
        }
        echo "\n";
        for ($j = 0; $j < count($arr[$i]); $j++) {
            print_r($arr[$i][$j] . ",");
        }
    }
}

for ($i = 0; $i < count($primeArr); $i++) {
    $index = getIndex($primeArr[$i]);
    $prime2d[$index][count($prime2d[$index])] = $primeArr[$i];
}
//calling the method
primeRun();
?>