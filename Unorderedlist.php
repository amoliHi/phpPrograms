<?php
/**
 * UnOrdered List:-Read the Text from a file, split it into words and arrange it as Linked List.
 * Take a user input to search a Word in the List. If the Word is not found then add it
 * to the list, and if it found then remove the word from the List. In the end save the
 * list into a file
 */

include "BussinessLogic.php";
$object = new BussinessLogic();
$object->unorderedlist();