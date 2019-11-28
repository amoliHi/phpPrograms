<?php
/**
 * program to read in Stock Names, Number of Share, Share Price.
 * Print a Stock Report with total value of each Stock and the total value of Stock.
 * 
 * @author chiragkatare
 */
 
 //Require function from below files
require("Utility.php");
/**
 * setting default global exception handler function
 */
set_exception_handler(function ($exception) {
    echo "You Messed Up " , $exception->getMessage(), "\n";
 });
 function handleError($errno, $errstr,$error_file,$error_line) {
    echo "<b>Error:</b> [$errno] $errstr - $error_file:$error_line";
    echo "<br />";
    echo "Terminating PHP Script";
    
    die();
 }
 /**
  * function to to handle error 
  * prunts error no and message and stops the script 
  */
 set_error_handler( function ($errno, $errstr,$error_file,$error_line) {
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    echo "Terminating PHP Script";
    
    die();
 });
//class to create object of stock
class Stock
{
    //var to store the data of stock
    public $name;
    //price of stack
    public $price;
    //quantity of share in the stock
    public $quantity;
    //constructor to initialize the variables in the class
    function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
/**
 * function to add data to the json file portfolio
 */
function portfolio($portfolio)
{
    echo "Enter no of stocks to add ";
    $st = Utility::getInt();
   // $portfolio = [];
    for ($i = 0; $i < $st; $i++) {
        echo "Enter Stock name ";
        $name = Utility::getString();
        echo "Enter number of Shares of $name ";
        $quantity = Utility::getInt();
        echo "Enter price of a share of $name ";
        $price = Utility::getInt();
        $portfolio[] = new Stock($name, $price, $quantity);
    }
    //printReport($portfolio);
    $js = json_encode($portfolio);
    //print_r($js);
    file_put_contents("stock.json", $js);
}
/**
 * Function to print the report read from the json text file
 */
function printReport($portfolio)
{
// /    var_dump($portfolio);
    $total = 0;
    echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
    foreach ($portfolio as $key) {
        echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
        // echo $key->name . " has  \nTotal Stocks    : $key->quantity\nPrice Per Share : $key->price ```````````````````````rs\n";
        // echo $key->name . " has value : " . ($key->quantity * $key->price)."\n\n";
        $total += ($key->quantity * $key->price);
    }
    echo "Total Value Of Stocks is : " . $total . " rs\n";
}
/**
 * Function to create new portfolio 
 */
function newPort()
{
    $portfolio = array();
    portfolio($portfolio);
}
//function to add stock to old port folio 
function add()
{
    echo "Adding New Elements Selected\n";
    $portfolio = json_decode(file_get_contents("stock.json"));
    //print_r($portfolio);
    portfolio($portfolio);
}
/**
 *  function to run and test the above functions  
 */
function run()
{
    //asks the user for input
    echo "Menu :\n";
    echo "Press 1 to Enter New Details in Stock Portfolio \nPress 2 to to clear and create new Portfolio\n";
    echo "Enter 3 to Display Old Shares With Report\nElse exit anything to exit\n";
    $choice = Utility::getInt();
    //switch case to run according to condition
    switch ($choice) {
        case '1':
            add();
            echo "\n\n";
            run();
            break;
        case '2':
            newPort();
            echo "\n\n";
            run();
            break;
        case '3':
            $portfolio = json_decode(file_get_contents("stock.json"));
            printReport($portfolio);
            Utility::getString();
            break;
        default:
            echo "Exit  ..!!!\n";
            break;
    }
}
/**
 * Test Code IGNORE!!!!!!!!!!!!!!!!!!!!!11
 */
// $s = new Stock("Samsung", 200 , 316);
// $c = new Stock("Lolz", 110 , 210);
// $h = new Stock ("Apple",315 , 586) ;
// $k = new Stock ("Amazon",300 , 525);
// $arr[] = $s ;
// $arr[] = $c ;
// $arr[] = $h ;
// $arr[] = $k ;
// $js = json_encode($arr);
// file_put_contents("stock.json" , $js );
// print_r(json_decode(file_get_contents("stock.json")));
//function to run the class
run();
/******************************************************************************* */

/**
 * function to create person objest by askin value from console
 * @param addressbook  the array of addressbook to store created person object
 */
function createPerson(&$addressBook)
{
    //var person to store the person object
    $person = new Person();
    //asking user for input for person object
    echo "Enter Firstname \n";
    $person->fname = Utility::getString();
    echo "Enter Lastname \n";
    $person->lname = Utility::getString();
    echo "Enter State\n";
    $person->state = Utility::getString();
    echo "Enter City\n";
    $person->city = Utility::getString();
    echo "Enter Zip of $person->city\n";
    $person->zip = validInt(Utility::getInt(), 100000, 10000000);
    echo "Enter Address\n";
    $person->address = Utility::getString();
    echo "Enter Mobile Number \n";
    $person->phone = validInt(Utility::getInt(), 1000000000, 10000000000);
    //adding it to the array address book
    $addressBook[] = $person;
}
/**
 * function to edit the details of a person
 * @param the person object to edit the details
 */
function edit(&$person)
{
    echo "Enter 1 to change Address\nEnter 2 change Mobile Number ";
    $choice = Utility::getInt();
    switch ($choice) {
        case '1':
            echo "Enter State\n";
            $person->state = Utility::getString();
            echo "Enter City\n";
            $person->city = Utility::getString();
            echo "Enter Zip of $person->city\n";
            $person->zip = validInt(Utility::getInt(), 100000, 10000000);
            echo "Enter Address\n";
            $person->address = Utility::getString();
            echo "Address changes succesfully \n";
            break;
        case '2':
            echo "Enter Mobile Number \n";
            $person->phone = validInt(Utility::getInt(), 1000000000, 10000000000);
            echo "Moble no changed succesfully\n";
            break;
        default:
            break;
    }
}
/**
 * Function to delete the object of person from the array
 */
function delete(&$arr)
{
    $i = search($arr);
    if ($i > -1) {
        array_splice($arr, $i, 1);
        echo "Entry Deleted\n";
    } else {
        echo "Entry Not Found\n";
    }
    fscanf(STDIN, "%s\n");
}
/**
 * function tosearch the array for specific person and return the index of person or -1 if not found
 * @param arr the array containig person from which to search
 * @return index of the searched item or -1 if not found
 */
function search($arr)
{
    echo "Enter firstaname to search\n";
    $fname = Utility::getString();
    echo "Enter last name\n";
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
 * function to print the addressbokk as a mailing format
 */
function printBook($arr)
{
    foreach ($arr as $person) {
        echo sprintf("%s %s\n%s\n%s, %s\nZip - %u\nMobile- %u\n\n", $person->fname, $person->lname, $person->address, $person->city, $person->state, $person->zip , $person->phone);
    }
}
/**
 * function to sort the array by person object property
 * 
 * @param arr the array containig person object to sort
 * @param  prop the property for which to sort
 */
function sortBook(&$arr , $prop){
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
 * function to save passed adrees bokk ib json file
 * 
 * @param arr the array containing the person object ie addressbook to sav ein the file
 */
function save($addressBook)
{
    file_put_contents("AddressBook.json", json_encode($addressBook));
}
/**
 * function act as a default menu for the program
 */
function menu($addressBook)
{
    echo "\n!!!!Address Book!!!!\n\nEnter 1 to add person\nEnter 2 to Edit a person\nEnter 3 to Delete a person\nEnter 4 to Sort and Display\nEnter 5 to search\nEnter anything to exit\n";
    $ch = Utility::getInt();
    switch ($ch) {
        case '1':
            createPerson($addressBook);
            menu($addressBook);
            break;
        case '2':
            $k = 2;
            while (($i = search($addressBook)) === -1) {
                var_dump($i);
                echo "No enteries Found\nenter 1 to exit to MENU or Else to search again\n";
                fscanf(STDIN, "%s\n", $k);
                if ($k == 1) {
                    break;
                }
            }
            // /var_dump($i);
            if ($k == 1) {
                menu($addressBook);
            } else {
                $addressbook[$i] = edit($addressBook[$i]);
            }
            menu($addressBook);
            break;
        case '3':
            delete($addressBook);
            menu($addressBook);
            break;
        case '4':
            echo "Enter 1 to sort by Name\nEnter 2 to sort by Zip\nElse to Menu";
            $c = Utility::getInt();
            if($c == 1){
                sortBook($addressBook , "fname");
                printBook($addressBook);
            }
            else if($c == 2 ){
                sortBook($addressBook , "zip");
                printBook($addressBook);
            }
            else{
                menu($addressBook);
            }
            fscanf(STDIN, "%s\n");
            menu($addressBook);
            break;
        case '5':
            $i = search($addressBook);
            if($i>-1){
                $arr=[];
                $arr[] = $addressBook[$i];
                printBook($arr);
            }
            echo"\n";
            fscanf(STDIN, "%s\n");
            menu($addressBook);
            break;
        default:
            echo "Enter 1 to save ";
            if (Utility::getInt() == 1) {
                save($addressBook);
            }
            break;
    }
}
$arr = json_decode(file_get_contents("AddressBook.json"));
menu($arr);
?>