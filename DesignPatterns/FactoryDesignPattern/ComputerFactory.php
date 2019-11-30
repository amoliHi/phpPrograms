<?php
include "Computer.php";
include "PC.php";
include "Server.php";

class ComputerFactory
{
    public static function getComputer($type, $ram, $hdd, $cpu)
    {
        $res = strcasecmp($type, "PC");
        if ($res === 0) return new PC($ram, $hdd, $cpu);
        else if ($res === 0) return new Server($ram, $hdd, $cpu);
        return null;
    }
}