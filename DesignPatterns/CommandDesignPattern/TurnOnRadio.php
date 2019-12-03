<?php 
include_once "RadioControl.php";
include_once "RadioCommand.php";

class TurnOnRadio implements RadioCommand {
    private $radioControl;
    public function __construct(radioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOn ();
    }
}