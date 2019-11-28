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
 * function to create new portfolio 
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
?>