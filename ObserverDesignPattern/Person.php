<?php

//require abstract functions of Observer interface
include "Observer.php";

/**
 * Person class to provide basic properties of a person
 */
class Person implements Observer
{
    //@var string $name to store the name of the person
    public $name;

    /**
     * Constructor function to initialize the properties
     * 
     * @param [string] $name
     */
    function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * function to update the person about the mail and display
     * 
     * @param array $mail 
     * @return void
     */
    function update(Mail $mail)
    {
        echo "New Mail to " . $mail->rname . " - " . $mail->getMessage() . "from $mail->sname\n";
    }
}
