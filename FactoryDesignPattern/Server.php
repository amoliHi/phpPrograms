<?php

/**
 * Server class contains overridden functions of Computer abstract class 
 */
class Server extends Computer
{
    //@var int $ram hold the capacity of ram
    private $ram;
    //@var int $hdd hold the capacity of hdd
    private $hdd;
    //@var mixed $cpu hold the capacity of cpu
    private $cpu;

    /**
     * Constructor function to initialize above private variables
     *
     * @param [int] $ram
     * @param [int] $hdd
     * @param [mixed] $cpu
     */
    public function __construct($ram, $hdd, $cpu)
    {
        $this->ram = $ram;
        $this->hdd = $hdd;
        $this->cpu = $cpu;
    }

    /**
     * @Overridden function to get the capacity of ram
     *
     * @return [int] ram
     */
    public function getRAM()
    {
        return $this->ram;
    }

    /**
     * @Overridden function to get the capacity of HDD
     *
     * @return [int] hdd
     */
    public function getHDD()
    {
        return $this->hdd;
    }

    /**
     * @Overridden function to get the capacity of cpu
     *
     * @return [mixed] cpu
     */
    public function getCPU()
    {
        return $this->cpu;
    }
}
