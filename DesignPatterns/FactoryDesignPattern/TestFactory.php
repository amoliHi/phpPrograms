<?php

include "ComputerFactory.php";

$pc = ComputerFactory::getComputer("PC","2 GB","500 GB","2.4 GHz");
$server = ComputerFactory::getComputer("Server","16 GB","1 TB","2.9 GHz");
print "Factory PC Config::".$pc;
print "Factory Server Config::".$server;