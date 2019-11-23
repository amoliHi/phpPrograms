<?php

class Utility
{


     /**
     * validateIntegerInput($value) function - validates the user input value.
     *
     * @param [integer] $value
     * @return boolean
     */
    function validateInt($number)
    {
        // condition for validating user input value as per the set preg_match conditions.
        if (preg_match('/[0-9]{1}/', $number) && $number > 0)
            return true;
    }

  

    /**
     * getInt() function - for taking number as an input form user.
     * @return integer
     *
     */
    function getInt()
    {
        // takes the user input.
        fscanf(STDIN, "%d", $number);
        return $number;
    }

    /**
     * getString() function - for taking word input form user.
     * @return string
     *
     */
    function getString()
    {
        // takes the user input.
        $name = readline();
        return $name;
    }

    
}
