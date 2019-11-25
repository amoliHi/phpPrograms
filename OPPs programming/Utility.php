<?php
class Utility
{ 
    /**
     * getInt() function - takes integer as an input form user.
     * @return integer
     *
     */
    static function getInt()
    {
        $number = readline();
        return $number;
    }
    /**
     * getString() function - takes string input form user.
     * @return string
     *
     */
    static function getString()
    {
        $name = readline();
        return $name;
    }

    /**
     * putJson($arr, $file)- function to convert array to json string and put it in to the file.
     *
     * @param arr -the array which to put
     * @param file -the loction of the file to put it
     */
    static function putJson($arr, $file)
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
    /*variable to store name weight and price per kg of the object in inventory*/
    public $name;
    public $weight;
    public $price;
    /**
     * Constructor function to initialize the object properties
     * @param name 
     * @param weight 
     * @param price 
     * 
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
    //varibles to store the data of stock
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

