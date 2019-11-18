<?php
/**
 * Program to play a Cross Game or Tic­Tac­Toe Game. Player 1 is
 * the Computer and the Player 2 is the user. Player 1 take Random Cell that is the
 * Column and Row.
 */

require "TictactoeUtility.php";
require "FunctionsUtility.php";

$obj=new TictactoeUtility();
$obj->play();
  