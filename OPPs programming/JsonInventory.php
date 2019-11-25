<?php

/************************************************************************************
 * JSON Inventory Data Management of Rice, Pulses and Wheats
 * 
 * a. Desc ­> Create a JSON file having Inventory Details for Rice, Pulses and Wheats
 * with properties name, weight, price per kg.
 * b. Use Library : Java JSON Library , For IOS JSON Library use
 * NSJSONSerialization for parsing the JSON .
 * c. I/P ­> read in JSON File
 * d. Logic ­> Get JSON Object in Java or NSDictionary in iOS. Create Inventory
 * Object from JSON. Calculate the value for every Inventory.
 * e. O/P ­> Create the JSON from Inventory Object and output the JSON String
 * **********************************************************************************
 */

//require functions in OPPsProgramLogic class
include "OPPsProgramLogic.php";
$object = new OPPsProgramLogic();
//calling Driver function
$object->jsonInventory();
