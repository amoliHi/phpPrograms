<?php

//require functions of ComputerFactory class
include "ComputerFactory.php";

//@var object $pc hold object of PC class
$pc = ComputerFactory::getComputer("PC", "2 GB", "500 GB", "2.4 GHz");
//@var object $server hold object of Server class
$server = ComputerFactory::getComputer("Server", "16 GB", "1 TB", "2.9 GHz");
echo "Factory PC Config::";
//displaying newly created PC configurations
print_r($pc);
echo "Factory Server Config::" .
    //displaying newly created Server configurations
    print_r($server);
