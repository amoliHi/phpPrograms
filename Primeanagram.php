<?php
/**
 * In Prime Number Program and store only the numbers in that range that are
 * Anagrams. For e.g. 17 and 71 are both Prime and Anagrams in the 0 to 1000 range.
 * Further store in a 2D Array the numbers that are Anagram and numbers that are not
 * Anagram
 */

include "BussinessLogic.php";
$object = new BussinessLogic();
$object->primeAnagram();
