<?php
/**
 * Create the Week Object having a list of WeekDay objects each storing the day (i.e
 * S,M,T,W,Th,..) and the Date (1,2,3..) . The WeekDay objects are stored in a Stack
 * implemented using Linked List. Further maintain also a Week Object in a Stack to
 * finally display the Calendar
 */

include "BussinessLogic.php";
$object = new BussinessLogic();
$object->calStack();
?>