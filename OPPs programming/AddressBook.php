<?php

/***********************************************************************************
 * Create Object Oriented Analysis and Design of a simple Address Book Problem.
 * 
 * This program that can be used to maintain an address book. An address book holds 
 * a collection of entries, each recording a person's first and last names, address,
 * city, state, zip, and phone number.
 * *********************************************************************************
 */

//require functions of OPPsProgramLogic class
include "OPPsProgramLogic.php";

//decoding json file and storing it's content in variable $arr
$arr = json_decode(file_get_contents("AddressBook.json"));
$obj = new OPPsProgramLogic();
//calling Driver function
$obj->addressbkmenu($arr);
