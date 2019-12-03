<?php
// Command
interface radioCommand {
    public function execute();
}
 
class turnOnRadio implements radioCommand {
    private $radioControl;
    public function __construct(radioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOn ();
    }
}
 
class turnOffRadio implements radioCommand {
    private $radioControl;
    public function __construct(radioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOff ();
    }
}