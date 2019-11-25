<?php
/**
 * Create Object Oriented Analysis and Design of a simple Address Book Problem.
 */

//require functions in OPPsProgramLogic class
include "OPPsProgramLogic.php";

$obj=new OPPsProgramLogic();
$arr = json_decode(file_get_contents("AddressBook.json"));
//calling Driver function
$obj->addressbkmenu($arr);
