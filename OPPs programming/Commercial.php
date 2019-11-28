<?php

include("Utility.php");

/**
 * funtion to but stocks from the list and add it to the account
 */
function buy($account)
{
    //var_dump($account);
    //list var to store the list the stock to purachase from
    $list = printStockList();
    //askins use rfor input
    echo "Enter index number of the Stock from the above list to buy : ";
    //var ch to store stock to buy
    $ch = Utility::getInt();
    echo $list[$ch - 1]->name . " Selected!\nEnter number Of Shares To buy of " . $list[$ch - 1]->name . " : ";
    //noOfShare to store the no of shares to buy
    $noOfShare = Utility::getInt();
    if ($account->account[0] < ($list[$ch - 1]->price * $noOfShare)) {
        echo "insufficient fund\n";
        menu($account);
    }
    $list[$ch - 1]->quantity -= $noOfShare;
    saveList($list);
    //getting the stock from the list
    $stock = $list[$ch - 1];
    //creating new stock
    $stock = new Stock($stock->name, $stock->price, $noOfShare);
    //adding the stock to the account if already in the list and return
    $account[0]->account -= $noOfShare;
    for ($i = 1; $i < count($account); $i++) {
        if ($account[$i]->name == $stock->name) {
            $account[$i]->quantity += $stock->quantity;
            echo "Bought $stock->quantity " . "$stock->name shares successfully";
            return $account;
        }
    }
    //or else adds the new stack the end pf the list
    $account[] = $stock;
    echo "Bought $stock->quantity " . "$stock->name shares successfully";
    //waiting for user to see the result
    fscanf(STDIN, "%s\n");
    return $account;
}

function saveList($list)
{
    file_put_contents("stock.json", json_encode($list));
}

/**
 * function to sell the stock from the list
 */
function sell($account)
{
    //show the stock from the list to the user
    printAccount($account);
    //taking the user input
    echo "Enter No with Stock To Sell : ";
    //validating the input
    $ch = Utility::getInt();
    echo $account[$ch]->name . " selected!\nEnter No Of Shares To Sell of " . $account[$ch]->name . " : ";
    $qt = Utility::getInt();
    //removing the stock
    $account[$ch]->quantity -= $qt;
    $list = printStockList(1);
    $list[$ch - 1]->quantity += $qt;
    $account[0]->account += ($qt * $list[$ch - 1]->price);
    saveList($list);
    echo "sold $qt shares successfully";
    //check if the shares are empty to delete the entry completely
    if ($account[$ch]->quantity == 0) {
        array_splice($account, ($ch), 1);
    }
    fscanf(STDIN, "%s\n");
    return $account;
}

//function to save the stocks to the file
function save($account)
{
    file_put_contents("Account.json", json_encode($account));
}

//function to display the menu and run the program
function menu($account)
{
    echo "Menu :\n";
    echo "Press 1 to Enter To Buy New Stock \nPress 2 to Sell Stocks\n";
    echo "Enter 3 to Print Stock Report\nEnter anything else to exit\n";
    $choice = Utility::getInt();
    //switch case to run according to condition
    switch ($choice) {
        case '1':
            $account = buy($account);
            echo "\n\n";
            menu($account);
            break;
        case '2':
            $account = sell($account);
            echo "\n\n";
            menu($account);
            break;
        case '3':
            report($account);
            menu($account);
            break;
        default:
            echo "press 1 to save";
            if (Utility::getInt() == 1) {
                //var_dump($account); 
                save($account);
                echo "Transaction saved\n";
            }
            echo "Exit  ..!!!\n";
            break;
    }
}
/**
 * function to display the report of the stocks
 */
function report($account)
{
    $total = 0;
    echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
    for ($i = 1; $i < count($account); $i++) {
        $key = $account[$i];
        echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
        $total += ($key->quantity * $key->price);
    }
    echo "Total Value Of Stocks is : " . $total . " rs\namount left in account : " . $account[0]->account;
    echo "\nenter to menu ";
    fscanf(STDIN, "%s\n");
}

//function to print the stock currently in the stock
function printAccount($account)
{
    echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
    $i = 0;
    for ($i = 1; $i < count($account); $i++) {
        $key = $account[$i];
        echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", $i, $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
    }
}

/**
 * function to print the list the stocks available to buy
 */
function printStockList(int $s = 0)
{
    $list = json_decode(file_get_contents("stock.json"));
    if ($s === 0) {
        echo "No | Stock Name   | Share Price    | Available\n";
        $i = 0;
        foreach ($list as $key) {
 echo sprintf("%-1u. | %-10s   | Rs %-12u| %-9u", ++$i, $key->name, $key->price, $key->quantity) . "\n";
        }
    }
    return $list;
}
//checking the user account
$account = json_decode(file_get_contents("Account.json"));
//calling the user input
menu($account);
