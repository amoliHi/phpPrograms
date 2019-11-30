<?php

include "ComputerFactory.php";

$pc = ComputerFactory::getComputer("pc","2 GB","500 GB","2.4 GHz");
$server = ComputerFactory::getComputer("server","16 GB","1 TB","2.9 GHz");
echo("Factory PC Config::"+$pc);
echo("Factory Server Config::"+$server);