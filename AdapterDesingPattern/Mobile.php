<?php

/**
 * Mobile class to create mobile object
 */
class Mobile
{
    //@var int $cvolt to store the charging voltage of the mobile
    private $cvolt;

    /**
     * Constructor function to initialize private variabel $cvolt 
     * 
     * @return void
     */
    function __construct($volt)
    {
        $this->cvolt = $volt;
    }

    /**
     * Function to print charging of mobile if correct voltage is provided
     * 
     * @param int $volt
     * @return void
     */
    function charge($volt)
    {
        /**
         * charge the mobile if voltage is same as that of required charging 
         * voltage else display not charging
         */
        if ($this->cvolt == $volt) echo "Charging \n";
        else echo "Not Charging \n";
    }
}
