<?php

class Server extends Computer
{
    private $ram;
    private $hdd;
    private $cpu;

    public function __construct($ram, $hdd, $cpu)
    {
        $this->ram = $ram;
        $this->hdd = $hdd;
        $this->cpu = $cpu;
    }

    //@Override
    public function getRAM()
    {
        return $this->ram;
    }

    //@Override
    public function getHDD()
    {
        return $this->hdd;
    }

    //@Override
    public function getCPU()
    {
        return $this->cpu;
    }
}
