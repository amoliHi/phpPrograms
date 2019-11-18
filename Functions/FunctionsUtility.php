<?php

class FunctionsUtility
{
    /**
     * get_String() function - for taking name as an input form user.
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
     *  replaceByUserName() function - for replacing a existing word by user input name in a given string. 
     *
     * @return string
     */
    function replaceByUserName()
    {
        $name = FunctionsUtility::get_String();
        if (FunctionsUtility::validateUserName($name)) {
            $stringTemplate = "Hello <<Username>>,how are you?\n";
            echo (str_replace("<<Username>>", $name, $stringTemplate));
        } else {
            echo "Enter Valid name!!\n";
            FunctionsUtility::replaceByUserName();
        }
    }

    /**
     * get_Integer() function for taking numeric input from user
     *
     * @return integer
     */
    function get_Integer()
    {
        // takes the user input.
        echo "Enter the number : \n";
        fscanf(STDIN, "%d\n", $number);
        return $number;
    }

    /**
     * validateIntegerInput($value) function - validates the user input value.
     *
     * @param [integer] $value
     * @return boolean
     */
    function validateIntegerInput($number)
    {
        // condition for validating user input value as per the set preg_match conditions.
        if (preg_match('/[1-9]{1}/', $number) && $number > 0) {
            return true;
        }
    }

    /**
     * flipCoin() function - Flip Coin and print percentage of Heads and Tails
     *
     * @return void
     */
    function flipCoin()
    {
        $numberOfTimes = FunctionsUtility::get_Integer();
        if (FunctionsUtility::validateIntegerInput($numberOfTimes)) {
            /**
             *  @var $head is integer
             *  @var $tails is integer
             */
            $head = 0;
            $tails = 0;
            for ($i = 0; $i < $numberOfTimes; $i++) {
                if (rand(0, 1) > 0.5) {
                    $head++;
                } else {
                    $tails++;
                }
            }
            echo "Head percentage: " . 100 * ($head / $numberOfTimes) . "\n";
            echo "Tails percentage: " . 100 * ($tails / $numberOfTimes) . "\n";
        } else {
            echo "Enter the valid number\n";
            FunctionsUtility::flipCoin();
        }
       
    }

    /**
     * validateLeapYear($year) function - ensures it is a 4 digit number.
     *
     * @param [integer] $value
     * @return boolean value
     */
    function validateYear($year)
    {
        if (preg_match('/[0-9]{4}/', $year) && $year > 0) {
            return true;
        }
    }

    /**
     * leapYear() function - check if user input year is leap year or not.
     *
     * @return void
     */
    function leapYear()
    {
        $year = FunctionsUtility::get_Integer();
        if (FunctionsUtility::validateYear($year)) {
            if (($year % 4 === 0) && ($year % 100 !== 0) || ($year % 400 === 0)) {
                echo $year." is a Leap year \n";
            } else {
                echo $year." is not a Leap year \n";
            }
        } else {
            echo "Enter the valid 4 digit year\n";
            FunctionsUtility::leapYear();
        }
    }

    /**
     * powerOfTwo() function -  to prints a table of the powers of 2.
     *
     * @return integer
     */
    function powerOfTwo()
    {
        $power_value = FunctionsUtility::get_Integer();
        if(FunctionsUtility::validateIntegerInput($power_value) && $power_value<31)
        {
        /**
         * @var $power is integer
         */
        $power = 1;
        for ($i = 1; $i <= $power_value; $i++) 
        {
            $power *= 2;
            echo "2 ^ " . $i . " = " . $power . "\n";
        }
        }
        else
        {
            echo "Enter a valid input and it should be less than 31 \n";
            FunctionsUtility::powerOfTwo();
        }
    }

    /**
     * nthHarmonic() function -  to prints the Nth harmonic number.
     *
     * @return void
     */
    function nthHarmonic()
    {

        $number = FunctionsUtility::get_Integer();
        if (FunctionsUtility::validateIntegerInput($number)) {
            /**
             * @var $harmoic is an integer
             * 
             */
            $harmonic = 1;
            echo "1/1";
            for ($i = 2; $i <= $number; $i++) {
                echo " + 1/".$i;
                $harmonic += (1 / $i);

            }
            $i=$i-1;
            echo  "\n". $i. "th" . " harmonic value is " . $harmonic;
        } else {
            echo "Enter valid input.";
            FunctionsUtility::nthHarmonic();
        }
    }
    /**
     * get_factor() function -  ­Computes the prime factorization of N using brute force.
     *
     * @return void
     */
    function get_factor()
    {
        $number=FunctionsUtility::get_Integer();
        if(FunctionsUtility::validateIntegerInput($number))
        {
           for($i=2;$i*$i<=$number;$i++)
           {
               while($number%$i==0)
               {
                   echo "Prime Factor: ".$i."\n";
                   $number=$number/$i; 
               }
           }
           if($number>1)
           {
               echo "Prime Factor: ".$number."\n";
           }
        }
        else
        {
            echo "Please enter a valid input.";
            FunctionsUtility::get_factor();
        }
    }

    /**
     * gambler() function -  Simulates a gambler who start with $stake and place fair $1 bets until
     * he/she goes broke (i.e. has no money) or reach $goal.
     *
     * @return void
     */
     function gambler()
     {
     echo "How much stake do you have.\n";
     $stake=FunctionsUtility::get_Integer();
     
        echo "What is your goal price.\n";
        $goal=FunctionsUtility::get_Integer();
        
         echo "How many times you wish to play:\n";
         $times=FunctionsUtility::get_Integer();
           
        $bet=0;
        $win=0;
      
        for($i=0;$i<$times;$i++)
        {
         $cash=$stake;
         while($cash>0 && $cash<$goal)
         {
          $bet++;
          if(rand(0,1)>0.5) {
           $cash++;
          } else {
           $cash--;
          }
           if($cash==$goal)
             {
                $win++;
               }
        }
    }
        echo "Number of wins: ".$win."\n";
        echo "Win percentage: ". 100*($win/$times)."\n";
        echo "Lose percentage: ". (100*(($times-$win)/$times))."\n";
 }
    /**
     * get_Integerarray() function for taking numeric input from user and creating an array. 
     *
     * @return integerarray
     */
 function get_Integerarray()
 {
     $number=readline("Enter the total number of elements: \n");
     $array=array();
     echo "Now enter the elements:\n";
     for($i=0;$i< $number;$i++)
     {
         $array[$i]=readline();
     }
     return $array;
 }
    /**
     * sum_Of_Integers() function - A program with cubic running time. Read in N integers and counts the
     * number of triples that sum to exactly 0. 
     *
     * @return void
     */
 function sum_Of_Integers()
 {
    $array=FunctionsUtility::get_Integerarray();
    $size=count($array);
    $found=1;
     for($i=0;$i<$size-2;$i++)
     {
        for($j=$i+1;$j<$size-1;$j++)
        {
            for($k=$j+1;$k<$size;$k++)
            {
                if($array[$i]+$array[$j]+$array[$k]===0)
                {
                    echo "Triplet found.\n";
                    echo $array[$i]." ".
                         $array[$j]." ".
                         $array[$k]." "."\n";
                         $found=0;
                }

            }
        }
     }
     if($found===1)
     {
         echo "No Integer Triplet found.";
     }
 }

/**
 * quadratic() function -  to find the roots of the equation a*x*x + b*x + c.
 *
 * @return void
 */
function quadratic()
{

    /**
    * getting user input using Utility class
    */
	$a=FunctionsUtility::get_Integer();
	$b=FunctionsUtility::get_Integer();
	$c=FunctionsUtility::get_Integer();
	 $delta=$b*$b-(4*$a*$c);
	 $root=0;
	 $root=0;

	 if($delta===0){
	 //printing roots
	 echo "Roots are real and equal. \n";
	 $root1=$root2=$b/2*$a;
	}

	 else if($delta>0){
	 echo "Roots are real and different. \n";
	 $root1 = (-$b + sqrt($delta))/(2*$a);
     $root2 = (-$b - sqrt($delta))/(2*$a);
     //printing roots
     echo "roots are: ".$root1." & ".$root2;
	}

	else{
	 echo "Roots are complex. \n";
	 $root1 = (-$b + sqrt(abs($delta)))/(2*$a);
     $root2 = (-$b - sqrt(abs($delta)))/(2*$a);
     //printing roots
     echo "roots are: ".$root1." & ".$root2;
    }
}

/**
 * windChill() function -  to takes two double command­line arguments t
 * and v and prints the wind chill.
 *
 * @return void
 */
function windChill()
{
    $t=FunctionsUtility::get_Integer();
    $v=FunctionsUtility::get_Integer();
    
        if(($t<50 && $v<120) && $v>3){
            $w =  35.74 + 0.62158 * $t + (0.4275 * $t - 35.75) * pow($v,0.16);
            echo "Wind chill is ".$w."\n";
        }
        else 
        { 
            echo "Please enter a valid input. \n";
        }
}

/**
 * twoDarray() function -  A library for reading in 2D arrays of integers, doubles, or booleans 
 * from standard input and printing them out to standard output.
 *
 * @return void
 */
function twoDarray(){
    echo "Rows:"."\n";
    $row=FunctionsUtility::get_Integer();
    echo "Columns:\n";
    $col=FunctionsUtility::get_Integer();
    $arr=FunctionsUtility::getArr($row,$col); 
    FunctionsUtility::printArry($arr);   
}

/**
 * getArr() function -  taking user input and creating a 2D array.
 * 
 * @param [integer] $row
 * @param [integer] $col
 * @return integer 
 * 
 */
function getArr($row , $col){
    $arr = array();
    echo "Enter the elemensts:\n";
    for($i = 0 ;$i<$row;$i++){
        $array = array();
        for($j = 0 ;$j <$col ;$j++){
            $array[$j]=readline();
        }
        array_push($arr , $array);
    }
    return $arr;
    
}

/**
 * printArry() function -  for printing the array.
 * 
 * @param [integer] $arr
 * @return void 
 * 
 */
function printArry($arr){
    for($i = 0 ;$i<count($arr);$i++){
        echo "\n"; 
        for($j =0 ;$j<count($arr[$i]);$j++) {
            echo $arr[$i][$j]. " ";
        }
    }
    echo "\n";
}



/**
 * coupon_number() function -  Given N distinct Coupon Numbers, how many random numbers do you
 * need to generate distinct coupon number? This program simulates this random
 * process.
 * 
 * @return void 
 * 
 */
function coupon_number()
{
     $number =FunctionsUtility::get_Integer();
     $array=array();
     $size=count($array);
     $count=0;
     while($size<$number)
     {
        $random=rand(1,$number);
        $count++;
        $array=FunctionsUtility::check_array($array,$random);
        $size=count($array);
     }

     echo "The distinct numbers are: \n";

     for($i=0;$i< count($array);$i++)
     {
         echo $array[$i]." ";
     }

     echo "\n The count of random number generated is: ".$count;
    }
     /**
      * check_array() function - check pre-existing elements in array with 
      * randomly generaed elements, if present then skip if not then store.
      * @param [integer] $array
      * @param [integer] $random
      * 
      * @return integer array 
      * 
      */
     function check_array($array,$random)
    {
       $flag=1;
        for($i=0;$i< count($array);$i++)
        {
            if($array[$i]===$random)
            {
                $flag =0;
            }
        }
        if ($flag ===1) {
          $array[$i] =$random;
        }
        return $array;
    }

   /**
    * permutation() function - to return all permutation of a String using iterative method and
    * Recursion method
    * 
    * @return void 
    * 
    */
    function permutation()
    {
        $str=FunctionsUtility::get_String();
        $size=strlen($str);
        $r=$size-1;
        $l=0;

        FunctionsUtility::permute($str,$l,$r);
        
    }

    function permute($str,$l,$r)
    {
        if($l===$r)
        {
            echo $str."\n";
        } else {

        for($i=$l;$i<=$r;$i++)
        {
            $str=FunctionsUtility::swap($str,$l,$i);
            FunctionsUtility::permute($str,$l+1,$r);
            $str=FunctionsUtility::swap($str,$l,$i);
        }

        }
    }

    /**
    * swap() function - contains logic to swap the elements in array
    * 
    * @return integer array 
    * 
    */
    function swap($str, $l, $i) 
    { 
        $charArray = str_split($str); 
        $temp = $charArray[$l] ; 
        $charArray[$l] = $charArray[$i]; 
        $charArray[$i] = $temp; 
        return implode($charArray); 
    }
    
    /**
    * stopWatch() function - for measuring the time that elapses between
    * the start and end clicks
    * 
    * @return integer array 
    * 
    */
    function stopWatch()
    {
        echo "Enter S for starting. E for stopping the watch.\n";
        $ch=readline();
        if($ch==="S"||$ch=="s"){
            echo "StopWatch started.\n";
            $time=microtime(true);
            echo $time."\n";
        }
        $ch1=readline();
        if($ch1==="E"||$ch1=="e"){
            echo "StopWatch stopped.\n";
            $time1=microtime(true);
            echo $time1."\n";

            $time_elapsed=($time1-$time);
            echo "Time elapsed is: ".$time_elapsed;
        } 
    }


    /**Write a program Distance.java that takes two integer command­line arguments x
     *and y and prints the Euclidean distance from the point (x, y) to the origin (0, 0). The
     *formulae to calculate distance = sqrt(x*x + y*y). Use Math.power function.
     */
    function cal_distance(){
        $x=FunctionsUtility::get_Integer();
        $y=FunctionsUtility::get_Integer();

        $distance=sqrt(pow($x,2)+pow($y,2));
        echo "The Euclidean distance is: ".$distance."\n";

    }
}
