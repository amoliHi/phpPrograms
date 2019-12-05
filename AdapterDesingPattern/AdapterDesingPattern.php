<?php

//require functions of Mobile class
include "Mobile.php";
//require functions of SocketAdapter class
include "SocketAdapter.php";


//@var $mob hold new mobile object created
$mob = new Mobile(12);
//@var $adapter hold new SocketAdapter object created
$adapter = new SocketAdapter();
//give apropriate voltage
$volt = $adapter->get12Volts();
$mob->charge($volt);
