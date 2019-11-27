<?php
/**
 * program that can be used to maintain an address book. An address book holds a collection of entries,
 * each recording a person's first and last names, address, city, state, zip, and phone number.
 * 
 * @author chiragkatare
 */
//files containing important function
require("Utility.php");
/**
 * function to validate integer input from the user and ask the user until proper input is fount and return it
 * @param int the value to verify as int
 * @param min the minimum value of the integer
 * @param max the maximum value of the integer
 * @return int the valid int in that range 
 * 
 */
function validInt($int, $min, $max)
{
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo ("Variable value is not within the legal range\n");
        echo "enter again : ";
        $int = Utility::getInt();
    }
    return $int;
}
/**
 * class person containing properties of person for address book
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
    //var stte to store the state of the person
    public $state;
    //var zip to store the zip code of the city 
    public $zip;
    //var phone to store the phone no of the person 
    public $phone;
}
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