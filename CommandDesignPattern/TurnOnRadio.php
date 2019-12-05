<?php

//require fucntions of RadioControl class
include_once "RadioControl.php";
//require abstract function of RadioCommand interface
include_once "RadioCommand.php";


/**
 * TurnOffRadio class to receive the turnOn radio command and execute the command
 */
class TurnOnRadio implements RadioCommand
{

    //@var $radioControl hold the object of RadioControl class
    private $radioControl;

    /**
     * Constructor function to initialize @var $radioControl
     *
     * @param RadioControl $radioControl object of RadioControl
     * @return void
     */
    public function __construct(RadioControl $radioControl)
    {
        $this->radioControl = $radioControl;
    }

    /**
     * Overridden function of RadioCommand interface to turnOn the radio
     *
     * @return void
     */
    public function execute()
    {
        $this->radioControl->turnOn();
    }
}