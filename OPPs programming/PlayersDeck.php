<?php

//require the functions in below files to work
require("Utility.php");
require("/home/admin1/Downloads/Amoli/BridgeLabzProgram-master/Data Structure/DataStructureUtility.php");
/**
 * clss to initialize the property of the card with suit and rank
 */
class card
{
    /**
     * variables to store properties of cars 
     */
    public $suit;
    public $rank;
    /**
     * constructor of class 
     */
    function __construct($suit, $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }
    /**
     * toString method is overidden to output the object as string
     */
    function __tostring(){
        $special = ["Jack", "Queen", "King", "Ace"];
        if($this->rank>10){
            return $special[$this->rank%11]." of ".$this->suit  ;
        }
        return $this->rank." of ".$this->suit  ;
    }
}

class Player
{
    public $name;
    public $cards;
    function __tostring(){
        return $this->name;
    }
    function __construct(string $name)
    {
        $this->cards = new Queue();
        $this->name = $name;
    }
    function pushCard($card){
        $this->cards->enqueue($card);
    }
    function sortDeck(){
        while($this->cards->isEmpty()===false){
            $ar[] = $this->cards->dequeue(); 
        }
    }
}
/**
 * function to give the deck of cards as 2d array
 * @return arr the 2d array of the deck 
 */
function getDeck()
{
    /**
     * no of suits in the deck
     */
    $suits = ["Clubs", "Diamonds", "Hearts", "Spades"];
    //no of ranks in the deck
    $rank = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
    //deck array  wth the empty value
    $deck = [];
    for ($i = 0; $i < count($suits); $i++) {
        for ($j = 0; $j < count($rank); $j++) {
            //giving the values of cards in the deck array
            $deck[$i][$j] = new card($suits[$i], $rank[$j]);
        }
    }
    //print_r($deck);
    return $deck;
}
/**
 * shuffle the deck of cards and return it
 * @param deck the 2d array containing deck of cards
 * @return deck the shuffled deck of cards
 */
function cardShuffle($deck)
{
    for ($i = 0; $i < count($deck); $i++) {
        for ($j = 0; $j < count($deck[$i]); $j++) {
            $r1 = rand(0, 3);
            $c1 = rand(0, 12);
            $r = rand(0, count($deck));
            $r2 = rand(0, 3);
            $r = rand(0, count($deck));
            $c2 = rand(0, 12);
            $r = rand(0, count($deck));
            $temp = $deck[$r1][$c1];
            $r = rand(0, count($deck));
            $deck[$r1][$c1] = $deck[$r2][$c2];
            $deck[$r2][$c2] = $temp;
        }
    }
//    / print_r($deck);
    return $deck;
}
function playerDist($deck)
{
    $playerQue = new Queue();
    for ($i = 1; $i < 5; $i++) {
        echo "Enter player $i name ";
        $player = new Player(Utility::getString());
        for ($j=0; $j < 9 ; $j++) { 
            $r = rand(0, 3);
            $c = rand(0, count($deck[$r]) - 1);
            $player->pushCard($deck[$r][$c]);
            array_splice($deck[$r], $c, 1);
        }
        $playerQue->enqueue($player);
    }
    return $playerQue;
}
function ShowCards(Queue $playerQue){
    while($playerQue->isEmpty()==false){
        $pl = $playerQue->dequeue();
        echo $pl."-{";
        while($pl->cards->isEmpty()==false){
            echo $pl->cards->dequeue()."," ;
        }
        echo "}\n\n";
    }
}
$ss = getDeck();
$ss = playerDist($ss);
ShowCards($ss);
?>