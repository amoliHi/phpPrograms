<?php

/* 
* Utility class - include logics common for programs in OPPs programming assignment
*/
class Utility
{
    /**
     * validateUserName($name) function - for verifying the type and lenght of user input name. 
     *
     * @param [string] $name
     * @return boolean 
     */
    function validateString($str)
    {
        //condition for validating the type and size of user input string
        if (preg_match('/[a-zA-Z]/', $str)) {
            return true;
        }
    }

    /**
     * getInt() function - takes integer as an input form user.
     * 
     * @return integer
     */
    static function getInt()
    {
        $num = readline();
        while (!is_numeric($num)) {
            echo "Ivalid input enterd !!!!\nPlease try again.\n";
            $num = readline();
        }
        return $num;
    }

    /**
     * getString() function - takes string as an input form user.
     * 
     * @return $str -returns user entered string
     */
    static function getString()
    {
        $str = readline();
        while (!Utility::validateString($str)) {
            echo "Ivalid input enterd !!!!\nPlease try again.\n";
            $str = readline();
        }
        return $str;
    }

    /**
     * putJsonin($arr, $file)- function to convert array to json string and put it in to the file.
     *
     * @param arr -the array which to put
     * @param file -the loction of the file to put it
     */
    static function putJsonin($arr, $file)
    {
        //converts array to json string
        $json =  json_encode($arr);
        //writing json string into the files
        file_put_contents($file, $json);
    }
}

/* 
* Inventory class - initializes the inventory classs object
*/
class Inventory
{
    /**
     * variable to store name weight and price per kg of the object in inventory
     */
    public $name;
    public $weight;
    public $price;
    /**
     * Constructor function to initialize the object
     * 
     * @param name 
     * @param weight 
     * @param price  
     */
    function __construct($name, $weight, $price)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
    }
}

/* 
* Stock class - initializes the Stock classs object
*/
class Stock
{
    /**
     *varibles to store the data of stock
     */
    public $name;
    public $price;
    public $quantity;

    /**
     * Constructor function to initialize the object properties
     * @param name 
     * @param price 
     * @param quantity 
     * 
     */
    function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

/**
 * class to initialize the property of the card with suit and rank
 */
class card
{
    /**
     * variables to store properties of cards 
     */
    public $suit;
    public $rank;

    /**
     * Constructor function to initialize the object
     * 
     * @param suit 
     * @param rank 
     */
    function __construct($suit, $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }
}



