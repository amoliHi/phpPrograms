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
        // validating the provided number by the preg_match regEx matching patter
        if (preg_match('/[0-9]{1}/', $number) && $number > 0)
            return true;
    }



    /**
     * getInt() function - takes integer as an input form user.
     * @return integer
     *
     */
    function getInt()
    {
        fscanf(STDIN, "%d", $number);
        return $number;
    }

    /**
     * getString() function - takes string input form user.
     * @return string
     *
     */
    function getString()
    {
        $name = readline();
        return $name;
    }
}
