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
	 * @return invenObject array object of inventory class containing product detail
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
	 * getJson($file) - function to read the json string from the file and return it as an array
	 * 
	 * @param file -the location of the file to read the json string
	 * @return arr -contain json string
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
	 * @param arr -contain json string
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
		Utility::putJsonin($arr, $file);
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
	 */
	function regexReplace($message, $fname, $lname, $mobile)
	{
		$message = preg_replace("/\d{2}\-x+/", $mobile, $message);
		$message = preg_replace("/<+\w{4}>+/", $fname, $message);
		$message = preg_replace("/<+\w+\s\w+>+/", $fname . " " . $lname, $message);
		$message = preg_replace("/x*\/x*\/x*/", date("d/m/Y"), $message);
		echo "\n$message\n";
	}

	/**
	 * regExDemonstration() - driver function
	 *
	 * @return void
	 */
	function regExDemonstration()
	{
		$message = "Hello <<name>>, We have your full name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx.\nPlease,let us know in case of any clarification.\nThank you\nBridgeLabz\nxx/xx/xxxx.";
		echo "Enter your First name:- \n";
		$fname = Utility::getString();
		echo "Enter your Last name:- \n";
		$lname = Utility::getString();
		echo "Enter your mobile no:- \n";
		$mobile = Utility::getInt();
		OPPsProgramLogic::regexReplace($message, $fname, $lname, $mobile);
	}

	/**
	 * add() -function to add stock to old port folio 
	 * 
	 * @param file -the location of the file to read the json string
	 * @return void
	 */
	function add()
	{
		echo "Adding new Stock data to inventory.... \n";
		$portfolio = json_decode(file_get_contents("stock.json"));
		OPPsProgramLogic::portfolio($portfolio);
	}

	/**
	 * portfolio($portfolio,$file) - function to add stock to old portfolio 
	 * 
	 * @param portfolio -stock inventory array object containing Stock data 
	 * @param file -the location of .json file
	 * @return void
	 */
	function portfolio($portfolio)
	{
		echo "Enter total number of Stocks: ";
		$st = readline();
		for ($i = 0; $i < $st; $i++) {
			echo "Enter Stock name :";
			$name = readline();
			echo "Enter number of Shares of $name :";
			$quantity = readline();
			echo "Enter price of a share of $name :";
			$price = readline();
			$portfolio[] = new Stock($name, $price, $quantity);
		}
		OPPsProgramLogic::putJson($portfolio);
	}

	/**
	 * stockReport() - function to take stock detail from user
	 * 
	 * @return void
	 */
	function stockReport()
	{
		echo "Enter total number of Stocks : ";
		$st = readline();
		for ($i = 0; $i < $st; $i++) {
			echo "Enter Stock name :";
			$name = readline();
			echo "Enter number of Shares of $name :";
			$quantity = readline();
			echo "Enter price of a share of $name :";
			$price = readline();
			$portfolio[] = new Stock($name, $price, $quantity);
		}
		//call to printreport fucntion
		OPPsProgramLogic::printStoRep($portfolio);
	}

	/**
	 * putJson($arr, $file)- function to convert array to json string and put it in to the file.
	 *
	 * @param arr -the array which to put
	 * @param file -the loction of the file to put it
	 */
	function putJson($arr)
	{
		//converts array to json string
		$json =  json_encode($arr);
		//writing json string into the files
		file_put_contents("stock.json", $json);
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
			echo sprintf(
				"%-10s | rs %-12u | %-13u | rs %u",
				$key->name,
				$key->price,
				$key->quantity,
				($key->quantity * $key->price)
			) . "\n";
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
	function stockInventory()
	{
		//take user input
		echo "Press 1 to Enter New Details in Stock Portfolio. \nPress 2 to display old Shares with Report. \n";
		echo  "Else exit anything to exit. \n";
		$choice = readline();
		//switch case to run as per user choice
		switch ($choice) {
			case '1':
				OPPsProgramLogic::add();
				echo "\n\n";
				OPPsProgramLogic::stockInventory();
				break;
				// case '2':
				// 	OPPsProgramLogic::newPort();
				// 	echo "\n\n";
				// 	OPPsProgramLogic::stockInventory();
				// 	break;
			case '2':
				$portfolio = json_decode(file_get_contents("stock.json"));
				OPPsProgramLogic::printStoRep($portfolio);
				readline();
				break;
			default:
				echo "Exit complete.... \n";
				break;
		}
	}

	/**
	 * createPerson($addressBook) function to create person objest by the input provided by user
	 * 
	 * @param addressbook the array of addressbook to store created person object
	 * @return void
	 */
	function createPerson($addressBook)
	{

		//@var person to store the object of Person class
		$person = new Person();
		echo "Enter Firstname : \n";
		$person->fname = Utility::getString();
		echo "Enter Lastname : \n";
		$person->lname = Utility::getString();
		echo "Enter State : \n";
		$person->state = Utility::getString();
		echo "Enter City : \n";
		$person->city = Utility::getString();
		echo "Enter Zip of $person->city : \n";
		$person->zip = Utility::getInt();
		echo "Enter Address : \n";
		$person->address = Utility::getString();
		echo "Enter Mobile Number : \n";
		$person->phone = Utility::getInt();
		//adding person information to the array $addressBook
		$addressBook[] = $person;
	}

	/**
	 * edit($person) function to edit the details of a person
	 * 
	 * @param person helps to call the person class variables
	 */
	function edit($person)
	{
		echo "Enter 1 to change Address.\nEnter 2 change Mobile Number.\n";
		$choice = Utility::getInt();
		switch ($choice) {
			case '1':
				echo "Enter State : \n";
				$person->state = Utility::getString();
				echo "Enter City : \n";
				$person->city = Utility::getString();
				echo "Enter Zip of $person->city : \n";
				$person->zip = Utility::getInt();
				echo "Enter Address : \n";
				$person->address = Utility::getString();
				echo "Address changes succesfully. \n";
				break;
			case '2':
				echo "Enter Mobile Number : \n";
				$person->phone = Utility::getInt();
				echo "Mobile no changed succesfully.\n";
				break;
			default:
				break;
		}
	}

	/**
	 * delete($arr) function to delete the object of person from the array
	 * 
	 * @param arr array from which object is to be deleted
	 */
	function delete($arr)
	{
		//@var $i stores the index number returned by serach($arr) function
		$i = search($arr);
		if ($i > -1) {
			array_splice($arr, $i, 1);
			echo "Entry Deleted\n";
		} else
			echo "Entry Not Found\n";
		fscanf(STDIN, "%s\n");
	}

	/**
	 * search($arr) function tosearch the array for specific person and return the index 
	 * of person or -1 if not found
	 * 
	 * @param arr array in which to search for person object
	 * @return [integer] index of the searched item or -1 if not found
	 */
	function search($arr)
	{
		echo "Enter firstaname : \n";
		$fname = Utility::getString();
		echo "Enter last name : \n";
		$lname = Utility::getString();
		for ($i = 0; $i < count($arr); $i++) {
			if ($arr[$i]->fname == $fname) {
				if ($arr[$i]->lname == $lname) {
					return $i;
				}
			}
		}
		return -1;
	}

	/**
	 *  printBook($arr) function to print the AddressBook
	 */
	function printBook($arr)
	{
		foreach ($arr as $person) {
			echo sprintf(
				"%s %s\n%s\n%s, %s\nZip - %u\nMobile- %u\n\n",
				$person->fname,
				$person->lname,
				$person->address,
				$person->city,
				$person->state,
				$person->zip,
				$person->phone
			);
		}
	}

	/**
	 * sortBook($arr, $prop) -function to sort the array by person object property
	 * 
	 * @param $arr -the array containig person object to sort
	 * @param  $prop -the property for which to sort
	 */
	function sortBook($arr, $prop)
	{
		for ($i = 1; $i < count($arr); $i++) {
			// getting value for back element
			$j = ($i - 1);
			//saving it in temperary variable;
			$temp = $arr[$i];
			while ($j >= 0 && $arr[$j]->{$prop} >= $temp->{$prop}) {
				$arr[$j + 1] = $arr[$j];
				$j--;
			}
			$arr[$j + 1] = $temp;
		}
	}

	/**
	 * save($addressBook) -function to save passed $addressBook in json file
	 * 
	 * @param addressBook -the array containing the person object and to be stored in json file
	 */
	function save($addressBook)
	{
		file_put_contents("AddressBook.json", json_encode($addressBook));
	}

	/**
	 * addressbkmenu($addressBook) -driver function
	 * 
	 * @param addressBook -the array containing the person object/details
	 */
	function addressbkmenu($addressBook)
	{
		echo "\n ..Address Book..\n\nEnter 1 to add person.\nEnter 2 to Edit a person.",
			"\nEnter 3 to Delete a person.\nEnter 4 to Sort and Display.\nEnter 5 to search.",
			"\nEnter any other number to save and exit.\n";
		$ch = Utility::getInt();
		switch ($ch) {
			case '1':
				OPPsProgramLogic::createPerson($addressBook);
				OPPsProgramLogic::addressbkmenu($addressBook);
				break;
			case '2':
				$k = 2;
				while (($i = search($addressBook)) === -1) {
					var_dump($i);
					echo "No enteries Found\nenter 1 to exit to Menu or Else to search again\n";
					fscanf(STDIN, "%s\n", $k);
					if ($k == 1)
						break;
				}
				if ($k == 1)
					OPPsProgramLogic::addressbkmenu($addressBook);
				else
					$addressbook[$i] = OPPsProgramLogic::edit($addressBook[$i]);
				OPPsProgramLogic::addressbkmenu($addressBook);
				break;
			case '3':
				OPPsProgramLogic::delete($addressBook);
				OPPsProgramLogic::addressbkmenu($addressBook);
				break;
			case '4':
				echo "Enter 1 to sort by Name\nEnter 2 to sort by Zip\nElse to Menu";
				$c = Utility::getInt();
				if ($c == 1) {
					OPPsProgramLogic::sortBook($addressBook, "fname");
					OPPsProgramLogic::printBook($addressBook);
				} else if ($c == 2) {
					OPPsProgramLogic::sortBook($addressBook, "zip");
					OPPsProgramLogic::printBook($addressBook);
				} else
					OPPsProgramLogic::addressbkmenu($addressBook);
				fscanf(STDIN, "%s\n");
				OPPsProgramLogic::addressbkmenu($addressBook);
				break;
			case '5':
				$i = OPPsProgramLogic::search($addressBook);
				if ($i > -1) {
					$arr = [];
					$arr[] = $addressBook[$i];
					OPPsProgramLogic::printBook($arr);
				}
				echo "\n";
				fscanf(STDIN, "%s\n");
				OPPsProgramLogic::addressbkmenu($addressBook);
				break;
			default:
				echo "Enter 1 to save ";
				if (Utility::getInt() == 1)
					OPPsProgramLogic::save($addressBook);
				break;
		}
	}

	/**
	 * Function to create a deck of cards
	 * 
	 * @return arr the 2d array of the deck 
	 */
	function createDeck()
	{
		// number of suits in the deck
		$suits = ["Clubs", "Diamonds", "Hearts", "Spades"];
		//number of ranks in the deck
		$rank = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
		//creating an empty deck array
		$deck = [];
		for ($i = 0; $i < count($suits); $i++) {
			for ($j = 0; $j < count($rank); $j++) {
				//putting the values of cards in the deck array  
				$deck[$i][$j] = new card($suits[$i], $rank[$j]);
			}
		}
		return $deck;
	}

	/**
	 * Shuffle the deck of cards and returns it
	 * 
	 * @param deck the 2d array containing deck of cards
	 * @return deck the shuffled deck of cards
	 */
	function shufflecard($deck)
	{
		for ($i = 0; $i < count($deck); $i++) {
			for ($j = 0; $j < count($deck[$i]); $j++) {
				$r1 = rand(0, 3);
				$c1 = rand(0, 12);
				$r = rand(0, count($deck));
				$r2 = rand(0, 3);
				$r = rand(0, count($deck));
				$c2 = rand(0, 12);
				$r = rand(0, count($deck));
				$temp = $deck[$r1][$c1];
				$r = rand(0, count($deck));
				$deck[$r1][$c1] = $deck[$r2][$c2];
				$deck[$r2][$c2] = $temp;
			}
		}
		return $deck;
	}

	/**
	 * Distribute the deck of cards between 4 players
	 *    
	 * @param deck the deck of cards 2d array(Shuffled)
	 * @return players the 2d array of distributed cards
	 */
	function distribute($deck)
	{
		$players = [];
		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < 9; $j++) {
				$r = rand(0, 3);
				$c = rand(0, count($deck[$r]) - 1);
				$players[$i][$j] = $deck[$r][$c];
				array_splice($deck[$r], $c, 1);
			}
		}
		return $players;
	}

	/**
	 * Sort the player distributed cards and return it
	 * 
	 * @param player the 2d array containing the distributed cards
	 * @return player the sorted distributed cards
	 */
	function sortPlayer($player)
	{
		for ($k = 0; $k < 4; $k++) {
			for ($i = 1; $i < count($player[$k]); $i++) {
				// getting value for back element
				$j = ($i - 1);
				//saving it in temperary variable;
				$temp = $player[$k][$i];
				while ($j >= 0 && $player[$k][$j]->rank >= $temp->rank) {
					$player[$k][$j + 1] = $player[$k][$j];
					$j--;
				}
				$player[$k][$j + 1] = $temp;
			}
		}
		return $player;
	}

	/**
	 * Function to display the 2d array of distributed cards b/w 4 players
	 * 
	 * @param player the 2d array containing the cards to display
	 */
	function displayCards($player)
	{
		$special = ["Jack", "Queen", "King", "Ace"];
		for ($i = 0; $i < count($player); $i++) {
			$print = "{";
			echo "\n\nPlayer " . ($i + 1) . ":";
			for ($j = 0; $j < count($player[$i]); $j++) {
				if ($player[$i][$j]->rank > 10)
					$print .= $special[$player[$i][$j]->rank % 11] . " of " . $player[$i][$j]->suit . ",";
				else
					$print .= $player[$i][$j]->rank . " of " . $player[$i][$j]->suit . ",";
			}
			$print = substr($print, 0, -1);
			echo $print . "}";
		}
		echo "\n";
	}

	/**
	 * Driver function of DeckOfCards program 
	 */
	function runDeck()
	{
		echo "Deck of cards created.\nPress Enter the proceed.\n";
		fscanf(STDIN, "%s\n");
		$deck = OPPsProgramLogic::createDeck();
		echo "Press Enter to shuffle the deck. \n";
		fscanf(STDIN, "%s\n");
		$deck = OPPsProgramLogic::shufflecard($deck);
		echo "Press Enter to distribute the cards among players.\n";
		fscanf(STDIN, "%s\n");
		$players = OPPsProgramLogic::distribute($deck);
		$players = OPPsProgramLogic::sortPlayer($players);
		OPPsProgramLogic::displayCards($players);
	}

	/**
	 * Function to take player name as input and create a queue of players
	 * 
	 * @param deck containing cards data in the form of 2d array
	 * @return playerQue queue of players with player and cards data
	 */
	function playerDist($deck)
	{
		$playerQue = new Queue();
		for ($i = 1; $i < 5; $i++) {
			echo "Enter player $i name ";
			$name = Utility::getString();
			$player = new Player($name);
			for ($j = 0; $j < 9; $j++) {
				$r = rand(0, 3);
				$c = rand(0, count($deck[$r]) - 1);
				$player->pushCard($deck[$r][$c]);
				array_splice($deck[$r], $c, 1);
			}
			$playerQue->enqueue($player);
		}
		return $playerQue;
	}

	/**
	 * Driver function of PlayersDeck program 
	 * 
	 * @param playerQue containing queue data of players
	 * @return void 
	 */
	function showCards()
	{
		$playerQue = getDeck();
		$playerQue = playerDist($playerQue);
		while ($playerQue->isEmpty() == false) {
			$pl = $playerQue->dequeue();
			echo $pl . "-{";
			while ($pl->cards->isEmpty() == false) {
				echo $pl->cards->dequeue() . ",";
			}
			echo "}\n\n";
		}
	}
}

/**
 * class Person containing properties of person for address book
 */
class Person
{
	//var fname to store first name of the person
	public $fname;
	//var lname to store the last name of the person
	public $lname;
	//var address to store the address of person as a string
	public $address;
	//var city to store the name of the city of person
	public $city;
	//var state to store the state of the person
	public $state;
	//var zip to store the zip code of the city 
	public $zip;
	//var phone to store the phone no of the person 
	public $phone;
}

/**
 * Player class to initialize queue object of players and create queue of cards
 * and add cards to players
 */
class Player
{
	//variables to take card data
	public $name;
	public $cards;

	function __tostring()
	{
		return $this->name;
	}

	/**
	 * Function to initialize 
	 */
	function __construct($name)
	{
		$this->cards = new Queue();
		$this->name = $name;
	}

	/**
	 * Function to add cards to players deck
	 * 
	 * @param card card object of queue having card data
	 */
	function pushCard($card)
	{
		$this->cards->enqueue($card);
	}

	function sortDeck()
	{
		while ($this->cards->isEmpty() === false) {
			$ar[] = $this->cards->dequeue();
		}
	}
}
