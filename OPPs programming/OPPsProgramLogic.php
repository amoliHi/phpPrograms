<?php

/*require functions of Utility class*/
include "Utility.php";

/* 
* OPPsProgramLogic class - include bussiness logic of programs in OPPs programming assignment
*/
class OPPsProgramLogic
{
	/**
	 * inventoryObject()-funtion to create the objects of the inventory and return 
	 * it as an array of objects.
	 * 
	 * @return invenObject array object of inventory class 
	 */
	function inventoryObject()
	{
		$name = array("Rice", "Wheat", "Pulses");
		$invenObject = array();
		for ($i = 0; $i < 3; $i++) {
			echo "Enter total weight of " . $name[$i] . " in kg" . "\n";
			$weight = readline();
			echo "Enter per kg price of " . $name[$i] . "\n";
			$price = readline();
			echo "\n";
			$invenObject[$i] = new Inventory($name[$i], $weight, $price);
			print_r($invenObject);
		}
		return $invenObject;
	}

	/**
	 * putJson($arr, $file)- function to convert array to json string and put it in to the file.
	 *
	 * @param arr -the array which to put
	 * @param file -the loction of the file to put it
	 */
	function putJson($arr, $file)
	{
		//converts array to json string
		$json =  json_encode($arr);
		//writing json string into the files
		file_put_contents($file, $json);
	}

	/**
	 * getJson($file) - function to read the json string from the file and return it as an array
	 * 
	 * @param file -the location of the file to read the json string
	 * @return arr -the array we get from the jason string
	 */
	function getJson($file)
	{
		//putting the json string from the files ot variable
		$contents = file_get_contents($file);
		//decoding the json string 
		$arr = json_decode($contents, true);
		//returning the decoded array
		return $arr;
	}

	/**
	 * printValue($arr) -function to print individual product price as well as total inventory price
	 * 
	 * @param arr -the location of the file to read the json string
	 * @return void
	 */
	function printInvenTotal($arr)
	{
		/**
		 * @var price for storing total price
		 */
		$price = 0;
		for ($i = 0; $i < count($arr); $i++) {
			// calculating price of the single object
			$singleobjprice = $arr[$i]['weight'] * $arr[$i]['price'];
			echo "Total price for " . $arr[$i]['weight'] . " kg " . $arr[$i]['name'] . " is : " . $singleobjprice . "rs\n";
			$price += $singleobjprice;
		}
		echo "Total Price of Inventory is : " . $price . "rs\n";
	}

	/**
	 * jsonInventory() -function to run program in JsonInventory.php
	 *
	 * @return void
	 */
	function jsonInventory()
	{
		//getting json file and putting it in variable
		$file = "Inventory.json";
		//getting array of oblect from the function
		$arr = OPPsProgramLogic::inventoryObject();
		//putting the array of object in the file as json
		OPPsProgramLogic::putJson($arr, $file);
		//reading json from the file and decoding to array
		$jsonArr = OPPsProgramLogic::getJson($file);
		//printing the inventory
		OPPsProgramLogic::printInvenTotal($jsonArr);
	}

	/**
	 * regexReplace$message,$fname,$lname,$mobile)- function to use regEx to replace name, full name, Mobile#, and Date
	 * in the given message by the user input values.
	 *
	 * @param message -contains message to be changed
	 * @param fname - contains first name of user
	 * @param lname - contains last name of user
	 * @return void
	 * 
	 */
	function regexReplace($message,$fname,$lname,$mobile)
	{
		$message = preg_replace("/\d{2}\-x+/", $mobile, $message);
		$message = preg_replace("/<+\w{4}>+/", $fname, $message);
		$message = preg_replace("/<+\w+\s\w+>+/", $fname . " " . $lname, $message);
		$message = preg_replace("/x*\/x*\/x*/", date("d/m/Y"), $message);
		echo "\n$message\n";
	}

	function regExDemonstration(){
		$message = "Hello <<name>>, We have your full name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx.\nPlease,let us know in case of any clarification.\nThank you\nBridgeLabz\nxx/xx/xxxx.";
		echo "Enter your First name:- \n";
		$fname = Utility::getString();
		echo "Enter your Last name:- \n";
		$lname = Utility::getString();
		echo "Enter your mobile no:- \n";
		while (strlen($mobile = Utility::getInt()) < 10) {
			echo "Please enter correct Mobile number:- \n";
		}
		OPPsProgramLogic::regexReplace($message,$fname,$lname,$mobile);
	}

	/**
	 * add() - function to add stock to old port folio 
	 * 
	 * @param file - the location of the file to read the json string
	 * @return void
	 */
function add($file)
{
	echo "Adding new Stock data to inventory.... \n";
	$portfolio = json_decode(file_get_contents($file));
	OPPsProgramLogic::portfolio($portfolio,$file);
}

/**
	 * portfolio($portfolio,$file) - function to add stock to old portfolio 
	 * 
	 * @param portfolio -stock inventory array object containing Stock data 
	 * @param file -the location of .json file
	 * @return void
	 */
function portfolio($portfolio,$file)
{
	echo "Enter total number of Stocks: ";
	$st = readline();
	for ($i = 0; $i < $st; $i++) {
		echo "Enter Stock name ";
		$name = readline();
		echo "Enter number of Shares of $name ";
		$quantity = readline();
		echo "Enter price of a share of $name ";
		$price = readline();
		$portfolio[] = new Inventory($name, $price, $quantity);
	}
	OPPsProgramLogic::putJson($portfolio,$file);
}

/**
 * printStoRep($portfolio) - Function to read and print the string from json file
 *
 * @param portfolio - stock inventory array object containing Stock data
 * @return void
 */
function printStoRep($portfolio)
{
	$total = 0;
	echo "Stock Name | Per Share Price | No. Of Shares | Stock Price \n";
	foreach ($portfolio as $key) {
		echo sprintf("%-10s | rs %-12u | %-13u | rs %u", 
			$key->name, $key->price, $key->quantity, ($key->quantity * $key->price))."\n";
		$total += ($key->quantity * $key->price);
	}
	echo "Total Value Of Stocks is : " . $total . " rs\n";
}

/**
 * stockInventory($file) - function to run and test the above functions 
 *
 * @param file -stock inventory object containing Stock data 
 * @return void 
 */
function stockInventory($file)
{
	//take user input
	echo "Press 1 to Enter New Details in Stock Portfolio. \nPress 2 to to clear and create new Portfolio. \n";
	echo "Enter 3 to display old Shares with Report.\nElse exit anything to exit. \n";
	$choice = readline();
	//switch case to run as per user choice
	switch ($choice) {
		case '1':
		OPPsProgramLogic::add($file);
		echo "\n\n";
		OPPsProgramLogic::stockInventory($file);
		break;
		case '2':
		OPPsProgramLogic::newPort();
		echo "\n\n";
		OPPsProgramLogic::stockInventory($file);
		break;
		case '3':
		$portfolio = json_decode(file_get_contents($file));
printStoRep($portfolio);
readline();
break;
default:
echo "Exit complete.... \n";
break;
}
}
}

