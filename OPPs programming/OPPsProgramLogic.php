<?php
include "Utility.php";

class OPPsProgramLogic
{
    /**
     * inventoryObject()-funtion to create the objects of the inventory and return it as an array of objects 
     * 
     * @return arr array of the objects 
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
     * Function to convert array to json string and put it in to the file.
     * @param arr the array which to put
     * @param file the loction of the file to put it
     */
    function putJson($arr, $file)
    {
        //converts to json string
        $json =  json_encode($arr);
        //writing it in to the files
        file_put_contents($file, $json);
    }
    /**
     * function to read the json string from the file and return it as an array
     * 
     * @param file the location of the file to read the json string
     * @return arr the array we get from the jason string
     */
    function getJson($file)
    {
        //saving the string from the files in the variable
        $contents = file_get_contents($file);
        //decoding the json string 
        $arr = json_decode($contents, true);
        //returning the decoded array
        return $arr;
    }
    /**
     * Function to print the value from the program by calculating the price
     */
    function printValue($arr)
    {
        //var to store the total price.
        $price = 0;
        //loop to go through the array
        for ($i = 0; $i < count($arr); $i++) {
            // calculating price of the single object
            $tt = $arr[$i]['weight'] * $arr[$i]['price'];
            echo "Total price for " . $arr[$i]['weight'] . " kg " . $arr[$i]['name'] . " is : " . $tt . "rs\n";
            //adding to total prize
            $price += $tt;
        }
        //printing total price
        echo "Total Price of Inventory is : " . $price . "rs\n";
    }
    /**
     * function to run and test the above program
     */
    function jsonInventory()
    {
        //file to save and get json from
        $file = "Inventory.json";
        //getting array of oblect from the function
        $arr = OPPsProgramLogic::inventoryObject();
        //putting the array of object in the file as json
        OPPsProgramLogic::putJson($arr, $file);
        //reading json from the file and decoding to array
        $jsonArr = OPPsProgramLogic::getJson($file);
        //printing the inventory
        OPPsProgramLogic::printValue($jsonArr);
    }


    function regexReplace()
    {
        $message = "Hello <<name>>, We have your full name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx.\nPlease,let us know in case of any clarification.\nThank you\nBridgeLabz\nxx/xx/xxxx.";
        echo "Enter your First name:- \n";
        $fname = Utility::getString();
        echo "Enter your Last name:- \n";
        $lname = Utility::getString();
        echo "Enter your mobile no:- \n";
        while (strlen($mobile = Utility::getInt()) < 10) {
            echo "Please enter correct Mobile number:- \n";
        }
        $message = preg_replace("/\d{2}\-x+/", $mobile, $message);
        $message = preg_replace("/<+\w{4}>+/", $fname, $message);
        $message = preg_replace("/<+\w+\s\w+>+/", $fname . " " . $lname, $message);
        $message = preg_replace("/x*\/x*\/x*/", date("d/m/Y"), $message);
        echo "\n$message\n";
    }
}

/**
 * inventory class with properties to create object for inventory
 */
class Inventory
{
    /*variable to store name weight and price per kg of the object in inventory*/
    public $name;
    public $weight;
    public $price;

    /**
     * Constructor function to initialize the object properties
     */
    function __construct($name, $weight, $price)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
    }
}
