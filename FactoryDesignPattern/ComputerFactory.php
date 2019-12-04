<?php
include "Computer.php";
include "PC.php";
include "Server.php";

class ComputerFactory
{
    public static function getComputer($type, $ram, $hdd, $cpu)
    {
        if ($type == "PC") return new PC($ram, $hdd, $cpu);
        else if ($type == "Server") return new Server($ram, $hdd, $cpu);
        else 
        return null;
    }
}