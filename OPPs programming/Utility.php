<?php
class Utility
{
    /**
     * validateIntegerInput($value) function - validates the user input value.
     *
     * @param [integer] $value
     * @return boolean
     */
    static function validateInt($number)
    {
        // validating the provided number by the preg_match regEx matching patter
        if (preg_match('/[0-9]{1}/', $number) && $number > 0)
            return true;
    }
    /**
     * getInt() function - takes integer as an input form user.
     * @return integer
     *
     */
    static function getInt()
    {
        $name = readline();
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
}

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