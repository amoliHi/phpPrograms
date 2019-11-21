
<?php
class AlgorithmsUtility
{
    /**
     * getUserName() function - for taking name as an input form user.
     * @return string
     *
     */
    function get_String()
    {
        // takes the user input.
        $name = readline("Enter the name: ");
        return $name;
    }
    /**
     * validateUserName($name) function - for verifying the type and lenght of user input name. 
     *
     * @param [string] $name
     * @return boolean 
     */
    function validateUserName($name)
    {
        /**condition for validating the type and size of user input string
         *takes user input name as a parameter for validating with the set conditons
         */
        if (preg_match('/[a-zA-Z]{3}/', $name)) {
            return true;
        }
    }
    /**
     * get_Integer() function for taking numeric input from user.
     *
     * @return integer
     */
    function get_Integer()
    {
        // takes the user input.
        fscanf(STDIN, "%d", $number);
        return $number;
    }

    static function getInt(){
        fscanf(STDIN,"%d\n",$val);
        while(!is_numeric($val)){
            echo "ivalid input try again\n";
            fscanf(STDIN,"%d\n",$val);
        }
    }
    /**
     * validate_Integer($value) function - validates the user input value.
     *
     * @param [integer] $value
     * @return boolean
     */
    function validate_Integer($number)
    {
        // condition for validating user input using preg_match conditions.
        if (preg_match('/[1-9]{1}/', $number) && $number > 0) {
            return true;
        }
    }
    /**
     * primeNumber() function -  to find the Prime numbers in the range of 0 -­ 1000 Numbers.
     * @return void
     *
     */
    function primeNumber($n)
    {
        $array = array();
        for ($i = 1; $i < $n; $i++) {
            $found = 0;
            for ($j = 1; $j < $n- 1; $j++) {
                if ($i % $j === 0) {
                    $found++;
                }
            }
            if ($found === 2) {
               return true;
            //  AlgorithmsUtility::palindrome($n);
                // echo  $i. " ";
            }
            // echo "Toatal count of prime numbers between 1 to 1000 is: ". $count;
        }
        return false;
        
        // AlgorithmsUtility::palindrome($array);
    }

    function isPrime($n){
        for ($i = 2; $i <= $n / 2; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true ;
    }
    
    function Palindrome($n)
    {
        echo " Palindrom numbers between 1 and 1000 .\n";
        for ($i = 0; $i < $n; $i++) {
            $temp = $n;
            $new = 0;
            while (floor($temp)) {
                $d = $temp % 10;
                $new = $new * 10 + $d;
                $temp = $temp / 10;
            }
            if ($new == $n)
                echo "Palindrom";
        }
    }
    /**
     * insertionSort() function -  Reads in integer from standard input and prints them in sorted order,
     * using insertion sort.
     *
     * @return void
     *
     */
    function insertionSort_Integer()
    {
        echo "Total elements of array.\n";
        $size = AlgorithmsUtility::get_Integer();
        $arr = array();
        echo "Enter Integer array elements : \n";
        for ($i = 0; $i < $size; $i++) {
            $arr[$i] = AlgorithmsUtility::get_Integer();
        }
        for ($i = 1; $i < $size; $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j = $j - 1;
            }
            $arr[$j + 1] = $key;
        }
        for ($i = 1; $i < $size; $i++) {
            echo $arr[$i] . " ";
        }
    }
    /**
     * insertionSort_String() function - Reads in strings from standard input and prints them in sorted order,
     * using insertion sort.
     *
     * @return void
     *
     */
    function insertionSort_String()
    {
        echo "Total elements of array.\n";
        $size = AlgorithmsUtility::get_Integer();
        $arr = array();
        echo "Enter String array elements : \n";
        for ($i = 0; $i < $size; $i++) {
            $arr[$i] = AlgorithmsUtility::get_String();
        }
        for ($i = 1; $i < $size; $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && strcmp($arr[$j], $key) > 0) {
                $arr[$j + 1] = $arr[$j];
                $j = $j - 1;
            }
            $arr[$j + 1] = $key;
        }
        for ($i = 1; $i < $size; $i++) {
            echo $arr[$i] . " ";
        }
    }
    /**
     * bubblSort_Integer() function - Reads in integers prints them in sorted 
     * order using Bubble Sort.
     * 
     * @return void
     *
     */
    function bubblSort_Integer()
    {
        echo "Total elements of array.\n";
        $sizeOfarray = AlgorithmsUtility::get_Integer();
        $arr = array();
        echo "elements of array: \n";
        for ($i = 0; $i < $sizeOfarray; $i++) {
            $arr[$i] = AlgorithmsUtility::get_Integer();
        }
        for ($i = 0; $i < $sizeOfarray; $i++) {
            for ($j = 0; $j < $sizeOfarray - 1 - $i; $j++) {
                // swapping logic
                if ($arr[$j] > $arr[$j + 1]) {
                    $t = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $t;
                }
            }
        }
        for ($i = 1; $i < $sizeOfarray; $i++) {
            echo $arr[$i] . " ";
        }
        echo "\n";
    }
    /**
     * bubblSort_String() function - Reads in string and prints them in sorted 
     * order using Bubble Sort.
     * 
     * @return void
     *
     */
    function bubblSort_String()
    {
        echo "Total elements of array.\n";
        $sizeOfarray = AlgorithmsUtility::get_Integer();
        $arr = array();
        echo "elements of array: \n";
        for ($i = 0; $i < $sizeOfarray; $i++) {
            $arr[$i] = AlgorithmsUtility::get_String();
        }
        for ($i = 0; $i < $sizeOfarray; $i++) {
            for ($j = 0; $j < $sizeOfarray - 1 - $i; $j++) {
                // swapping logic
                if (strcmp($arr[$j], $arr[$j + 1]) > 0) {
                    $t = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $t;
                }
            }
        }
        for ($i = 1; $i < $sizeOfarray; $i++) {
            echo $arr[$i] . " ";
        }
        echo "\n";
    }
    function search($arr, $x)
    {
        if (count($arr) === 0) {
            return false;
        }
        $low = 0;
        $high = count($arr) - 1;
        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);
            if ($arr[$mid] == $x) {
                return true;
            }
            if ($x < $arr[$mid]) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        return false;
    }
    /**
     * binarySearch_Integer() function - Reads in integer from standard input and prints them in sorted order,
     * using insertion sort.
     *
     * @return void
     *
     */
    function binarySearch_Integer()
    {
        $arr = array(10, 5, 9, 4, 7, 3, 1);
        $sizeOfarray = count($arr);
        $x = readline("Enter the number to search.\n");
        AlgorithmsUtility::search($arr, $x);
        $result = AlgorithmsUtility::search($arr, $x);
        if ($result == true)
            print("Element not present.\n");
        else
            print("Element found at index.\n");
    }
    /**
     * dayOfWeek() function -  function that takes a date as input and
     * prints the day of the week that date falls on.
     * 
     * @return void
     *
     */
    static function dayOfWeek($d , $m , $y){
        $y0 = floor($y - (14 - $m) / 12) ;
        $x = floor($y0 + floor($y0/4) - floor($y0/100) + floor($y0/400));
        $m0 = $m + 12 * floor((14 - $m) / 12) - 2 ;
        $d0 = ($d + $x + floor((31*$m0) / 12)) % 7;
        return $d0;
    }

    static function isLeapYear($year){
        return (($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0);
    }
    /**
     * temperaturConversion() function - it takes a date as input and
     * prints the day of the week that date falls on.
     * 
     * @return void
     *
     */
    function temperaturConversion()
    {
        echo "Enter temperature: \n";
        $temp = AlgorithmsUtility::get_Integer();
        echo "Enter C for Celsius or F for Fahrenheit for the temperature you have input. \n";
        $chtemp = AlgorithmsUtility::get_String();
        if (strpos($chtemp, "c") === false && strpos($chtemp, "C") === false) {
            $conv = ($temp * 9 / 5) + 32;
        } else {
            $conv = ($temp - 32) * 5 / 9;
        }
        echo "converted temperature is " . $conv . "\n";
    }
    /**
     * monthlyPaymet() function - to calculate monthlyPayment that reads in three
     * ommand­line arguments P, Y, and R and calculates the monthly payments you
     * would have to make over Y years to pay off a P principal loan amount at R per cent
     * interest compounded monthly
     *
     * @return void
     *
     */
    function monthlyPaymet()
    {
        echo "enter principal ";
        $p = AlgorithmsUtility::get_Integer();
        if (AlgorithmsUtility::validate_Integer($p)) {
            echo "enter year ";
            $y = AlgorithmsUtility::get_Integer();
            if (AlgorithmsUtility::validate_Integer($y)) {
                echo "enter rate ";
                $r0 = AlgorithmsUtility::get_Integer();
                if (AlgorithmsUtility::validate_Integer($r0)) {
                    $r = $r0 / (12 * 100);
                    $n = 12 * $y;
                    $pay = ($p * $r) / (1 - (pow(1 + $r, -$n)));
                    echo "Monthly payment is " . $pay;
                } else {
                    echo "Enter a valid input.\n";
                    AlgorithmsUtility::monthlyPayment();
                }
            } else {
                echo "Enter a valid input.\n";
                AlgorithmsUtility::monthlyPayment();
            }
        } else {
            echo "Enter a valid input.\n";
            AlgorithmsUtility::monthlyPayment();
        }
    }
    /**
     * sqrt() function - to compute the square root of a nonnegative number c
     * given in the input using Newton's method
     * @return void
     *
     */
    function sqrt()
    {
        echo "Enter the number:\n";
        $c = AlgorithmsUtility::get_Integer();
        if (AlgorithmsUtility::validate_Integer($c)) {
            $t = $c;
            $epsilon = 1e-15;
            while (abs($t - ($c / $t)) > $epsilon * $t) {
                $t = ($c / $t + $t) / 2;
            }
            echo $t;
        } else {
            echo "Enter a valid input.\n";
            AlgorithmsUtility::sqrt();
        }
    }
    /**
     * toBinary() function - outputs the binary (base 2) representation of
     * the decimal number typed as the input. It is based on decomposing the number into
     * a sum of powers of 2
     * 
     * @return void
     *
     */
    function toBinary($n1)
    {
        $n = $n1;
        $binaryNum = array();
        $i = 0;
        while ($n > 0) {
            $binaryNum[$i] = $n % 2;
            $n = (int) ($n / 2);
            $i++;
        }
        echo "Binary representation of " . $n1 . " is : ";
        for ($j = $i - 1; $j >= 0; $j--) {
            echo  $binaryNum[$j];
        }
    }
    /**
     * swapNibbles() function - Swap nibbles and find the new number.
     * 
     * @param [integer] $number
     * @return void 
     */
    function swapNibbles($number)
    {
        $swap_nibbles = (($number & 0x0F) << 4 | ($number & 0xF0) >> 4);
        $power = $swap_nibbles;
        echo "\n" . "Number generated after swapping nibbles is: " . $swap_nibbles;
        AlgorithmsUtility::checkpower($power);
    }
    /**
     * isPowerOfTwo() function -  Finds the resultant number and check 
     * if the numer is a power of 2.
     * 
     * @param [integer] $n
     * @return void 
     */
    function isPowerOfTwo($num2)
    {
        if ($num2 === 0) {
            $return = 0;
        }
        while ($num2 != 1) {
            if ($num2 % 2 != 0)
                $return = 0;
            $num2 = $num2 / 2;
        }
        $return = 1;
    }
    function checkpower($num2)
    {
        if (AlgorithmsUtility::isPowerOfTwo($num2))
            echo "Number is power of two.\n";
        else
            echo "Number is not power of two.\n";
    }
    /**
     * anagram() function -  One string is an anagram of another if the second is simply a
     * rearrangement of the first
     * 
     * @return void 
     */
    function anagram()
    {
        $str1 = readline("Enter first name: \n");
        $str2 = readline("Enter second name: \n");
        $charArraya = str_split($str1);
        $charArrayb = str_split($str2);
        sort($charArraya);
        sort($charArrayb);
        if ($charArraya == $charArrayb) {
            echo "ANAGRAM.\n";
        } else {
            echo "Not anagram.\n";
        }
    }

    function isAnagram($s1,$s2){
            $arr1 = str_split($s1,1);
            $arr2 = str_split($s2,1);
            if(count($arr1)!=count($arr2)){
                return false ;
            }
            for($i = 0 ; $i < count($arr1);$i++){
                if(array_search($arr1[$i],$arr2)!==false){
                    $key=array_search($arr1[$i],$arr2);
                    unset($arr2[$key]);
                }
                
            }
            if(count($arr2)==0){
                return true ;
            }
            else{
                return false ;
            }
        }
    /**
     * vending_machine() function -  There is 1, 2, 5, 10, 50, 100, 500 and 1000 Rs Notes which can be
     * returned by Vending Machine. Write a Program to calculate the minimum number
     * of Notes as well as the Notes to be returned by the Vending Machine as a
     * Change
     * 
     * @return void 
     */
    function vending_machine()
    {
        $amount = readline("Enter the amoutn: \n");
        $notesarray = array(1000, 500, 100, 50, 10, 5, 2, 1);
        $countarray = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        for ($i = 0; $i <= 8; $i++) {
            if ($amount >= $notesarray[$i]) {
                $countarray[$i] = intval($amount / $notesarray[$i]);
                $amount = $amount - $countarray[$i] * $notesarray[$i];
            }
        }
        for ($i = 0; $i < 8; $i++) {
            if ($countarray[$i] != 0) {
                echo ($notesarray[$i] . " : " . $countarray[$i] . "\n");
            }
        }
    }

    function print2d($arr){
        for($i = 0 ;$i<count($arr);$i++){
            echo "\n";
            for($j = 0 ;$j <count($arr[$i]);$j++){
                echo $arr[$i][$j]."  ";
            }
        }
    }

    //check day of month,year
function day($month, $day, $year)
{
    $y = $year - floor((14 - $month) / 12);
    $x = $y + floor($y / 4) - floor($y / 100) + floor($y / 400);
    $m = $month + 12 * floor((14 - $month) / 12) - 2;
    $d = ($day + $x + floor((31 * $m) / 12)) % 7;
    return ($d);
}

}

