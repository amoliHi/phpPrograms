<?php

//require fucntions of RadioControl class
include_once "RadioControl.php";
//require abstract function of RadioCommand interface
include_once "RadioCommand.php";

/**
 * TurnOffRadio class to receive the turnOff radio command and execute the command
 */
class TurnOffRadio implements RadioCommand
{
    //@var $radioControl hold the object of RadioControl class
    private $radioControl;

    /**
     * Constructor function to initialize @var $radioControl
     *
     * @param RadioControl $radioControl object of RadioControl
     */
    public function __construct(RadioControl $radioControl)
    {
        $this->radioControl = $radioControl;
    }

    /**
     * Overridden function of RadioCommand interface to turnOff the radio
     *
     * @return void
     */
    public function execute()
    {
        $this->radioControl->turnOff();
    }
}
