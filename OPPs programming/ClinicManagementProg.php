<?php
class Doctor
{
    public $name;
    public $id;
    public $special;
    public $avail;

    function __construct($name, $id, $special, $avail)
    {
        $this->name = $name;
        $this->id = $id;
        $this->special = $special;
        $this->avail = $avail;
    }
}

class Patient
{
    public $name;
    public $id;
    public $mob;
    public $age;

    function __construct($name, $id, $mob, $age)
    {
        $this->name = $name;
        $this->id = $id;
        $this->mob = $mob;
        $this->age = $age;
    }
}
