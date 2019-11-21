<?php

require_once("DataStructureUtility.php");
require("AlgorithmsUtility.php");
/**
 * 
 * queueAnagrams() function-Add the Prime Numbers that are Anagram in the Range of 0 ­ 1000 in a Queue using
 *                          the Linked List and Print the Anagrams from the Queue. Note no Collection Library
 *                          can be used.
 * 
 */

function queueAnagrams()
{ 
    $que = new Queue();
    $arr = getprime(1000);
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr); $j++) {
            if ($i != $j) {
                if (AlgorithmsUtility::isAnagram($arr[$i], $arr[$j])) {
                    $que->enqueue($arr[$i]);
                    break;
                }
            }
        }
    }
    echo "Anagrams in Queue Are :\n\n";
    echo $que . "\n\n";
}

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
queueAnagrams();
?>