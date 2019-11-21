<?php
require("AlgorithmsUtility.php");
/**
 * Function to get the prime no between 0-$range 
 * @param range the range between which to find the numbers
 */
function getprime($range)
{
    $prime = [];
    $count = 0;
    for ($i = 2; $i < $range; $i++) {
        if (AlgorithmsUtility::isprime($i)) {
            $prime[$count++] = $i;
        }
    }
    return $prime;
}
/**
 * Function to calculate the index at which to store the number in the 2D array
 * 
 * @param number the number for which to find the index of array
 * @return index the index at which to store the array
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
 * Function to run and test the above functions and run the programs
 */
function primeRun()
{
    $primeArr = getPrime(1000);
    $prime2d = get2d();
    for ($i = 0; $i < count($primeArr); $i++) {
        $index = getIndex($primeArr[$i]);
        $prime2d[$index][count($prime2d[$index])] = $primeArr[$i];
    }
    echo "2D array stored is :";
    AlgorithmsUtility::print2d($prime2d);
    echo "\n";
}
/**
 * Function to give a 2d array of size 10
 */
function get2d()
{
    $arr = [];
    for ($i = 0; $i < 10; $i++) {
        $aa = array();
        array_push($arr, $aa);
    }
    return $arr;
}
//calling the function to test the program 
primeRun();
?>