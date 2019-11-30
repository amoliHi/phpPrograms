<?php

//require functions of Utility class
include "Utility.php";

/* 
* OPPsProgramLogic class - include bussiness logic of programs in OPPs programming assignment
*/
class OPPsProgramLogic
{

	/**
	 * Funtion to create the objects of the inventory and return 
	 * it as an array of objects.
	 * 
	 * @return invenObject array object of inventory class containing product detail
	 */
	function inventoryObject()
	{
		$name = array("Rice", "Wheat", "Pulses");
		//@var array $invenObject empty array to store inventory object details
		$invenObject = array();
		//loop for traversing and taking product details as input
		for ($i = 0; $i < 3; $i++) {
			echo "Enter total weight of " . $name[$i] . " in kg" . "\n";
			$weight = readline();
			echo "Enter per kg price of " . $name[$i] . "\n";
			$price = readline();
			echo "\n";
			//storing object of each new product in $invenObject array
			$invenObject[$i] = new Inventory($name[$i], $weight, $price);
		}
		return $invenObject;
	}

	/**
	 * Function to read the json string from the file and return it as an array
	 * 
	 * @param file -the location of the file to read the json string
	 */
	function getJson($file)
	{
		//@var string|bool $contents holds json string got from file
		$contents = file_get_contents($file);
		//@var mixed $arr holds decoded json string 
		$arr = json_decode($contents, true);
		return $arr;
	}

	/**
	 * Function to print individual product price as well as total inventory price
	 * 
	 * @param arr -contain json string
	 * @return void
	 */
	function printInvenTotal($arr)
	{
		//@var int $price for storing total price
		$price = 0;
		for ($i = 0; $i < count($arr); $i++) {
			//@var int|float $singleobjprice holds price of the single object
			$singleobjprice = $arr[$i]['weight'] * $arr[$i]['price'];
			echo "Total price for " . $arr[$i]['weight'] . " kg " . $arr[$i]['name'] . " is : " . $singleobjprice . "rs\n";
			//@var int $price hold total price of inventory objects
			$price += $singleobjprice;
		}
		echo "Total Price of Inventory is : " . $price . "rs\n";
	}

	/**
	 * Function to run program in JsonInventory.php
	 *
	 * @return void
	 */
	function jsonInventory()
	{
		//@var string $file hold json string
		$file = "Inventory.json";
		//getting array of oblect from the function
		$arr = OPPsProgramLogic::inventoryObject();
		//putting the array of object in the file as json string
		Utility::putJsonin($arr, $file);
		//@var $jsonArr hold json string got from .json file
		$jsonArr = OPPsProgramLogic::getJson($file);
		//printing inventory details
		OPPsProgramLogic::printInvenTotal($jsonArr);
	}

	/**
	 * Function to use regEx to replace name, full name, Mobile, and Date
	 * in the given message by the user input values.
	 *
	 * @param message -contains message to be changed
	 * @param fname - contains first name of user
	 * @param lname - contains last name of user
	 * @return void
	 */
	function regexReplace($message, $fname, $lname, $mobile)
	{
		//replacing matched content with user provided input
		$message = preg_replace("/\d{2}\-x+/", $mobile, $message);
		$message = preg_replace("/<+\w{4}>+/", $fname, $message);
		$message = preg_replace("/<+\w+\s\w+>+/", $fname . " " . $lname, $message);
		$message = preg_replace("/x*\/x*\/x*/", date("d/m/Y"), $message);
		//print modified message
		echo "\n$message\n";
	}

	/**
	 * Driver function of RegExDemo program
	 */
	function regExDemonstration()
	{
		$message = "Hello <<name>>, We have your full name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx.\nPlease,let us know in case of any clarification.\nThank you\nBridgeLabz\nxx/xx/xxxx.";
		echo "Enter your First name:- \n";
		//@var $str $fname hold user first name
		$fname = Utility::getString();
		echo "Enter your Last name:- \n";
		//@var $str $lname hold user last name
		$lname = Utility::getString();
		echo "Enter your mobile no:- \n";
		//@var int $mobile hold user mobile number
		$mobile = Utility::getInt();
		OPPsProgramLogic::regexReplace($message, $fname, $lname, $mobile);
	}

	/**
	 * Function to add stock data to old portfolio 
	 * 
	 * @return void
	 */
	function add()
	{
		echo "Adding new Stock data to inventory.... \n";
		//@var mixed $portfolio hold decoded json string
		$portfolio = json_decode(file_get_contents("stock.json"));
		OPPsProgramLogic::portfolio($portfolio);
	}

	/**
	 * Function to add stock data to portfolio 
	 * 
	 * @param portfolio -stock inventory array object containing Stock data 
	 * @return void
	 */
	function portfolio($portfolio)
	{
		echo "Enter total number of Stocks: ";
		$st = readline();
		//loop for traversing and taking stock data form user
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
	 * Function to take stock detail from user for new portfolio
	 * 
	 * @return void
	 */
	function stockReport()
	{
		echo "Enter total number of Stocks : ";
		//@var int $st for storing total number of stock
		$st = Utility::getInt();
		//loop for traversing and taking stock data from user
		for ($i = 0; $i < $st; $i++) {
			echo "Enter Stock name :";
			$name = readline();
			echo "Enter number of Shares of $name :";
			$quantity = readline();
			echo "Enter price of a share of $name :";
			$price = readline();
			//storing stock data taken form user in portfolio array
			$portfolio[] = new Stock($name, $price, $quantity);
		}
		//call to printreport fucntion
		OPPsProgramLogic::printStoRep($portfolio);
	}

	/**
	 * Function to convert array to json string and put it in to the file.
	 *
	 * @param arr array which is to be put in json file
	 */
	function putJson($arr)
	{
		//@var string|bool $json hold encoded array in the form of json string
		$json =  json_encode($arr);
		//storing json string into file
		file_put_contents("stock.json", $json);
	}

	/**
	 * Function to read and print the string from json file
	 *
	 * @param portfolio stock inventory array object containing Stock data
	 * @return void
	 */
	function printStoRep($portfolio)
	{
		//@var int $total for storing total value of stock
		$total = 0;
		echo "Stock Name | Per Share Price | No. Of Shares | Stock Price \n";
		//loop for travesing and printing stock data
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
	 * Driver function for StockInventory program 
	 *
	 * @return void 
	 */
	function stockInventory()
	{
		echo "Press 1 to Enter New Details in Stock Portfolio. \nPress 2 to display old Shares with Report. \n";
		echo  "Else exit anything to exit. \n";
		$choice = readline();
		//taking user input and accordingly control will work
		switch ($choice) {
			case '1':
				OPPsProgramLogic::add();
				echo "\n\n";
				OPPsProgramLogic::stockInventory();
				break;
			case '2':
				//@var mixed $portfolio for storing json string in the form of array
				$portfolio = json_decode(file_get_contents("stock.json"));
				//call to print the stock report
				OPPsProgramLogic::printStoRep($portfolio);
				readline();
				break;
			default:
				echo "Exit complete.... \n";
				break;
		}
	}

	/**
	 * Function to create person object by the input provided by user
	 * 
	 * @param &$addressBookarr - reference to the variable $addressBookarr
	 * @return void
	 */
	function createPerson(&$addressBookarr)
	{
		//@var person object of class Person
		$person = new Person();
		echo "Enter Firstname : \n";
		//in below steps calling variables from class Person using class object
		//taking user input to initialize class Person variables
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
		//adding person information to addressBook array
		$addressBookarr[] = $person;
	}

	/**
	 * Function to edit the details of a person
	 * 
	 * @param &$person - reference to the variable $person
	 */
	function edit(&$person)
	{
		echo "Enter 1 to change Address.\nEnter 2 change Mobile Number.\n";
		//@var int $choice hold user input 
		$choice = Utility::getInt();
		switch ($choice) {
			case '1':
				echo "Enter State : \n";
				//using functions from Utility class for taking input
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
	 * Function to delete data of a person
	 * 
	 * @param &$arr - reference to the varaible $arr,
	 * $arr contains person data in the form of array 
	 */
	function delete(&$arr)
	{
		//@var i stores the index number returned by serach($arr) function
		$i = OPPsProgramLogic::search($arr);
		if ($i > -1) {
			//remove elements from an array $arr and replace it with new element
			array_splice($arr, $i, 1);
			echo "Entry Deleted\n";
		} else
			echo "Entry Not Found\nPress Enter to proceed.\n";
		fscanf(STDIN, "%s\n");
	}

	/**
	 * Function to search the array for specific person and return the index 
	 * of person or -1 if not found
	 * 
	 * @param $arr array in which to search for person object
	 * @return int $i - index of the searched item or -1 if not found
	 */
	function search($arr)
	{
		echo "Enter firstaname : \n";
		$fname = Utility::getString();
		echo "Enter last name : \n";
		$lname = Utility::getString();
		//loop for traversing and searching person details in array as per user input
		for ($i = 0; $i < count($arr); $i++) {
			if ($arr[$i]->fname == $fname && $arr[$i]->lname == $lname)
				return $i;
		}
		return -1;
	}

	/**
	 * Function to print person's details from AddressBook
	 * 
	 * @param $arr array containing the data of a person
	 */
	function printBook($arr)
	{
		// printing addressbook
		foreach ($arr as $person) {
			echo sprintf("%s %s\n%s\n%s, %s\nZip - %u\nMobile- %u\n\n",
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
	 * Function to sort the array by person object property
	 * 
	 * @param arr the array containig person object to sort
	 * @param prop the property for which to sort
	 */
	function sortBook($arr, $prop)
	{
		for ($i = 1; $i < count($arr); $i++) {
			//@var int|float $j holds value for back element
			$j = ($i - 1);
			//@var $temp value at i'th array index
			$temp = $arr[$i];
			while ($j >= 0 && $arr[$j]->{$prop} >= $temp->{$prop}) {
				$arr[$j + 1] = $arr[$j];
				$j--;
			}
			$arr[$j + 1] = $temp;
		}
	}

	/**
	 * Function to save addressBook in json file
	 * 
	 * @param addressBook -the array containing the data of person object
	 */
	function save($addressBookarr)
	{
		//storing json string in .json file
		file_put_contents("AddressBook.json", json_encode($addressBookarr));
	}

	/**
	 * Driver function of AddressBook program
	 * 
	 * @param addressBook array containing the person object/details
	 */
	function addressbkmenu($addressBookarr)
	{
		echo "\n ..Address Book..\n\nEnter 1 to add person.\nEnter 2 to Edit a person.",
			"\nEnter 3 to Delete a person.\nEnter 4 to Sort and Display.\nEnter 5 to search.",
			"\nEnter any other number to save and exit.\n";
		//@var int $ch holds user entered input
		$ch = Utility::getInt();
		switch ($ch) {
			case '1':
				OPPsProgramLogic::createPerson($addressBookarr);
				OPPsProgramLogic::addressbkmenu($addressBookarr);
				break;
			case '2':
				OPPsProgramLogic::menuchoice2($addressBookarr);
				break;
			case '3':
				OPPsProgramLogic::delete($addressBookarr);
				OPPsProgramLogic::addressbkmenu($addressBookarr);
				break;
			case '4':
				OPPsProgramLogic::menuchoice4($addressBookarr);
				break;
			case '5':
				$i = OPPsProgramLogic::search($addressBookarr);
				if ($i > -1) {
					$arr = [];
					$arr[] = $addressBookarr[$i];
					OPPsProgramLogic::printBook($arr);
				}
				echo "\n";
				fscanf(STDIN, "%s\n");
				OPPsProgramLogic::addressbkmenu($addressBookarr);
				break;
			default:
				echo "Enter 1 to save ";
				if (Utility::getInt() == 1)
					OPPsProgramLogic::save($addressBookarr);
				break;
		}
	}

	/**
	 * Function to edit a person data in Addressbook
	 *
	 * @param $addressBookarr array containing person data
	 * @return void
	 */
	function menuchoice2($addressBookarr)
	{
		//@var int $k 
		$k = 2;
		while (($i = OPPsProgramLogic::search($addressBookarr)) === -1) {
			echo "No enteries Found\nEnter 1 to exit to Menu or Else to search again\n";
			fscanf(STDIN, "%s\n", $k);
			if ($k == 1)
				break;
		}
		if ($k == 1)
			OPPsProgramLogic::addressbkmenu($addressBookarr);
		else
			$addressBookarr[$i] = OPPsProgramLogic::edit($addressBookarr[$i]);
		OPPsProgramLogic::addressbkmenu($addressBookarr);
	}

	/**
	 * Function to sort and display data of a person from Addressbook
	 *
	 * @param $addressBookarr array containing person data
	 * @return void
	 */
	function menuchoice4($addressBookarr)
	{
		echo "Enter 1 to sort by Name\nEnter 2 to sort by Zip\nElse to Menu";
		//@var int $c hold user input
		$c = Utility::getInt();
		if ($c == 1) {
			OPPsProgramLogic::sortBook($addressBookarr, "fname");
			OPPsProgramLogic::printBook($addressBookarr);
		} else if ($c == 2) {
			OPPsProgramLogic::sortBook($addressBookarr, "zip");
			OPPsProgramLogic::printBook($addressBookarr);
		} else
			OPPsProgramLogic::addressbkmenu($addressBookarr);
		echo "Press Enter to proceed";
		fscanf(STDIN, "%s\n");
		OPPsProgramLogic::addressbkmenu($addressBookarr);
	}

	/**
	 * Function to create a deck of cards
	 * 
	 * @return deck the 2d array of the deck 
	 */
	function createDeck()
	{
		//@var string[] $suits - suits in deck
		$suits = ["Clubs", "Diamonds", "Hearts", "Spades"];
		//@var int[] $rank - ranks in deck
		$rank = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
		//@var array $deck an empty deck array
		$deck = [];
		for ($i = 0; $i < count($suits); $i++) {
			for ($j = 0; $j < count($rank); $j++) {
				//providing cards with suits and rank data
				//@var array $deck - holds value of cards  
				$deck[$i][$j] = new card($suits[$i], $rank[$j]);
			}
		}
		return $deck;
	}

	/**
	 * Function to shuffle the deck of cards and then return it
	 * 
	 * @param deck the 2d array containing deck of cards
	 * @return deck the shuffled deck of cards
	 */
	function shufflecard($deck)
	{
		//card shuffling logic
		for ($i = 0; $i < count($deck); $i++) {
			for ($j = 0; $j < count($deck[$i]); $j++) {
				//@var int $r1 holds random number generated by rand function
				$r1 = rand(0, 3);
				$c1 = rand(0, 12);
				$r = rand(0, count($deck));
				$r2 = rand(0, 3);
				$r = rand(0, count($deck));
				$c2 = rand(0, 12);
				$r = rand(0, count($deck));
				//swapping data of deck array
				//@var mixed $temp holds deck array at r1 and c1 index
				$temp = $deck[$r1][$c1];
				$r = rand(0, count($deck));
				$deck[$r1][$c1] = $deck[$r2][$c2];
				$deck[$r2][$c2] = $temp;
			}
		}
		return $deck;
	}

	/**
	 * Function to distribute the deck of cards between 4 players
	 *    
	 * @param deck the deck of cards 2d array(Shuffled)
	 * @return players the 2d array of distributed cards
	 */
	function distribute($deck)
	{
		//@var array $players empty array for storing distributed cards
		$players = [];
		//logic for distributing cards between 4 players
		//4 players will have 9 cards of different suits and rank from deck
		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < 9; $j++) {
				$r = rand(0, 3);
				$c = rand(0, count($deck[$r]) - 1);
				//using randomly generated numbers as index
				//storing data from deck to players array
				//random distribution of cards
				$players[$i][$j] = $deck[$r][$c];
				//remove elements from an array and replace it with new element
				array_splice($deck[$r], $c, 1);
			}
		}
		return $players;
	}

	/**
	 * Function to sort the player distributed cards and return it
	 * 
	 * @param player the 2d array containing the distributed cards
	 * @return player the sorted distributed cards
	 */
	function sortPlayer($player)
	{
		for ($k = 0; $k < 4; $k++) {
			for ($i = 1; $i < count($player[$k]); $i++) {
				//@var int|float $j- getting value for back element
				$j = ($i - 1);
				//@var mixed $temp - saving it in temperary variable
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
		//@var string[] $special - array to contain special rank cards
		$special = ["Jack", "Queen", "King", "Ace"];
		for ($i = 0; $i < count($player); $i++) {
			//@var string $print
			$print = "{";
			echo "\n\nPlayer " . ($i + 1) . ":";
			for ($j = 0; $j < count($player[$i]); $j++) {
				if ($player[$i][$j]->rank > 10)
					$print .= $special[$player[$i][$j]->rank % 11] . " of " . $player[$i][$j]->suit . ",";
				else
					$print .= $player[$i][$j]->rank . " of " . $player[$i][$j]->suit . ",";
			}
			//@var string $print - returned by substr()
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
		//@var array $deck contain deck of cards in the form of 2d array
		$deck = OPPsProgramLogic::createDeck();
		echo "Press Enter to shuffle the deck. \n";
		fscanf(STDIN, "%s\n");
		//@var array $deck contain randomly shuffled array 
		$deck = OPPsProgramLogic::shufflecard($deck);
		echo "Press Enter to distribute the cards among players.\n";
		fscanf(STDIN, "%s\n");
		//@var array $players will store 2d array of distributed cards
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
		//@var Queue $playerQue object of class Queue
		$playerQue = new Queue();
		for ($i = 1; $i < 5; $i++) {
			echo "Enter player $i name \n";
			$name = Utility::getString();
			//@var $player object of class Player
			$player = new Player($name);
			//logic for randomly enqueueing cards in Player queue
			for ($j = 0; $j < 9; $j++) {
				$r = rand(0, 3);
				$c = rand(0, count($deck[$r]) - 1);
				$player->pushCard($deck[$r][$c]);
				//remove elements from an array and replace it with new element
				array_splice($deck[$r], $c, 1);
			}
			$playerQue->enqueue($player);
		}
		return $playerQue;
	}

	/**
	 * Driver function of PlayersDeck program 
	 * 
	 * @return void 
	 */
	function showCards()
	{
		$playerQue = OPPsProgramLogic::createDeck();
		$playerQue = OPPsProgramLogic::playerDist($playerQue);
		while ($playerQue->isEmpty() == false) {
			$pl = $playerQue->dequeue();
			//cards display
			echo $pl . "-->{";
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
	//@var string $fname hold first name of the person
	public $fname;
	//@var string $lname hold last name of the person
	public $lname;
	//@var string $address hold address of person as a string
	public $address;
	//@var string $city hold name of the city of person
	public $city;
	//@var string $state hold state of the person
	public $state;
	//@var int $zip hold zip code of the city 
	public $zip;
	//@var int $phone hold phone no of the person 
	public $phone;
}

/**
 * Player class to initialize queue object of players and create queue of cards
 * and add cards to players
 */
class Player
{
	//@var string $name hold name of player
	public $name;
	//@var mixed $cards
	public $cards;


	/**
	 * Function to return string representation of object
	 *
	 * @return name 
	 */
	function __tostring()
	{
		return $this->name;
	}

	/**
	 * Function to initialize name variable and create a new card queue
	 * for every new player name entered
	 * 
	 * @var $name player name
	 */
	function __construct($name)
	{
		//for every new name entry, new card queue will be created
		$this->cards = new Queue();
		$this->name = $name;
	}

	/**
	 * Function to add cards to players deck
	 * 
	 * @param $card object of queue having card data
	 */
	function pushCard($card)
	{
		//storing card data in queue
		$this->cards->enqueue($card);
	}

	function sortDeck()
	{
		while ($this->cards->isEmpty() === false) {
			//dequeued element will be stored in array ar
			$ar[] = $this->cards->dequeue();
		}
	}
}