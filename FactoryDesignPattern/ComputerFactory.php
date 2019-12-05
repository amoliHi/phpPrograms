<?php

//require abstract functions of Computer abstract class
include "Computer.php";
//require abstract functions of Computer abstract class
include "PC.php";
//require abstract functions of Computer abstract class
include "Server.php";

/**
 * ComputerFactory class to create different objects of same type
 * PC object or Server object of type Computer 
 */
class ComputerFactory
{
    /**
     * Function to create an object of PC or Server type as per the $type
     * argument is passed
     *
     * @param [string] $type
     * @param [int] $ram
     * @param [int] $hdd
     * @param [mixed] $cpu
     * @return object of PC or Server else @return null
     */
    function getComputer($type, $ram, $hdd, $cpu)
    {
        if ($type == "PC") return new PC($ram, $hdd, $cpu);
        else if ($type == "Server") return new Server($ram, $hdd, $cpu);
        else
            return null;
    }
}
