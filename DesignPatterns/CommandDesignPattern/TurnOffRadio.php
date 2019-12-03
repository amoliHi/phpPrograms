<?php
include_once "RadioControl.php";
include_once "RadioCommand.php";

class TurnOffRadio implements RadioCommand {
    private $radioControl;
    public function __construct(radioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOff ();
    }
}