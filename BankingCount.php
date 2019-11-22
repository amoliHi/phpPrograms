
<?php
/**
 *  Simulate Banking Cash Counter:-Program which creates Banking Cash Counter where 
 *  people come in to deposit Cash and withdraw Cash.Have an input panel to add people 
 *  to Queue to either deposit or withdraw money and dequeue the people. Maintain the Cash Balance.
 */

require "DataStructureUtility.php";

$counter = function () {
    /**
     * inner function that manipulates the cash and deposit the cash
     */
    $deposit = function ($amount, $deps) {
        $deps[0] += $amount;
        $deps[1]++;
        return $deps;
    };
    /**
     * inner function to manipulates cash at withdrawel
     */
    $withdraw = function ($amount, $withd) {
        $withd[0] += $amount;
        $withd[1]++;
        return $withd;
    };
    $q = new Queue();
    echo "Enter total people in queue ";
    $people = BussinessLogic::get_Integer();
    for ($i = 0; $i < $people; $i++) {
        echo "Enter 1 to deposit or 2 to withdraw ";
        $n = BussinessLogic::get_Integer();
        if ($n === 1) {
            echo "Enter amount ";
            $amount = BussinessLogic::get_Integer();
            $q->enqueue($amount);
        } else if ($n === 2) {
            echo "Enter amount ";
            $amount = BussinessLogic::get_Integer();
            $q->enqueue($amount * -1);
        } else
            echo "enter correct input";
        $i--;
    }
    /*initializing empty array to store the values of deposits*/
    $withd = array(0, 0);
    $deps = array(0, 0);
    /*dequing the queue in while loop*/
    while (!$q->isEmpty()) {
        $am = $q->dequeue();
        /*if else checks whether to withdraw or deposit*/
        if ($am < 0) {
            $withd = $withdraw($am, $withd);
        } else {
            $deps = $deposit($am, $deps);
        }
    }
    /*showing the total counter at the end of the queue*/
    echo "\nBank Counter Status : \n";
    echo "Total Deposits : " . $deps[1] . "\n";
    echo "Total Deposited Amount = " . (int) $deps[0] . "\n";
    echo "Total Wihdrawals : " . $withd[1] . "\n";
    echo "Total Withdrawed Amount = " . ((int) $withd[0] * -1) . "\n";
};
$counter();
?>