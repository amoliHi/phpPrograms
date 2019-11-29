<?php

/***************************************************************************************
 * Write a Program DeckOfCards.java:-
 * 
 * Initialize deck of cards having suit ("Clubs","Diamonds", "Hearts", "Spades") & 
 * Rank ("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace").
 * Shuffle the cards using Random method and then distribute 9 Cards to 4 Players and
 * Print the Cards the received by the 4 Players using 2D Array.
 * *************************************************************************************/


//require functions of OPPsProgramLogic class
include "OPPsProgramLogic.php";
$obj = new OPPsProgramLogic();
//calling Driver function
$obj->runDeck();
