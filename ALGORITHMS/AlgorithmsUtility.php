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
    function primeNumber()
    {
        for($i=1;$i<1000;$i++)
        {
            $found=0;
            for($j=1;$j<100-1;$j++)
            {
                if($i%$j===0)
                {
                    $found++;
                }
            }
                if($found===2)
                {
                    echo $i." ";
                }
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
    $arr=array();
    echo "elements of array: \n";
    for($i=0;$i<$size;$i++)
    {
    $arr[$i]=AlgorithmsUtility::get_Integer();
    }
        for ($i = 1; $i < $size; $i++) 
        { 
        $key = $arr[$i]; 
        $j = $i-1; 
  
        while ($j >= 0 && $arr[$j] > $key) 
        { 
            $arr[$j + 1] = $arr[$j]; 
            $j = $j - 1; 
        } 
          
        $arr[$j + 1] = $key; 
        } 
        for($i = 1; $i < $size; $i++)
        {
            echo $arr[$i]." "; 
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
    $arr=array();
    echo "elements of array: \n";
    for($i=0;$i<$size;$i++)
    {
    $arr[$i]=AlgorithmsUtility::get_String();
    }
        for ($i = 1; $i < $size; $i++) 
        { 
        $key = $arr[$i]; 
        $j = $i-1; 
  
        while ($j >= 0 && strcmp($arr[$j],$key)>0)
        { 
            $arr[$j + 1] = $arr[$j]; 
            $j = $j - 1; 
        } 
          
        $arr[$j + 1] = $key; 
        } 
        for($i = 1; $i < $size; $i++)
        {
            echo $arr[$i]." "; 
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
    $arr=array();
    echo "elements of array: \n";
    for($i=0;$i<$sizeOfarray;$i++)
    {
    $arr[$i]=AlgorithmsUtility::get_Integer();
    }


    for($i = 0; $i < $sizeOfarray; $i++)  
    {  
        for ($j = 0; $j < $sizeOfarray - 1-$i; $j++)  
        { 
            // swapping logic
            if ($arr[$j] > $arr[$j+1]) 
            { 
                $t = $arr[$j]; 
                $arr[$j] = $arr[$j+1]; 
                $arr[$j+1] = $t; 
            } 
        } 
    }
        for($i = 1; $i < $sizeOfarray; $i++)
        {
            echo $arr[$i]." "; 
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
    $arr=array();
    echo "elements of array: \n";
    for($i=0;$i<$sizeOfarray;$i++)
    {
    $arr[$i]=AlgorithmsUtility::get_Integer();
    }


    for($i = 0; $i < $sizeOfarray; $i++)  
    {  
        for ($j = 0; $j < $sizeOfarray - 1-$i; $j++)  
        { 
            // swapping logic
            if ($arr[$j] > $arr[$j+1]) 
            { 
                $t = $arr[$j]; 
                $arr[$j] = $arr[$j+1]; 
                $arr[$j+1] = $t; 
            } 
        } 
    }
        for($i = 1; $i < $sizeOfarray; $i++)
        {
            echo $arr[$i]." "; 
        }
        echo "\n";
}


function search($arr, $x) 
{ 
    $x=FunctionsUtility::get_String(); 
    if (count($arr) === 0){
         return false;
    }
     
    $low = 0; 
    $high = count($arr) - 1; 
      
    while ($low <= $high) { 
          
        $mid = floor(($low + $high) / 2); 
   
        if($arr[$mid] == $x) { 
            return true;
        } 
  
        if ($x < $arr[$mid]) { 

            $high = $mid -1; 
        } 
        else { 
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
function binarySearch_Integer(){
    $arr=FunctionsUtility::get_Stringarray();
    $x=FunctionsUtility::get_String();
    FunctionsUtility::search($arr, $x);
    $result = search($arr, $x);

    if ($result == true) 
    print("Element not present."); 
else
    print("Element found at index " . $result); 
}

/**
 * dayOfWeek() function -  function that takes a date as input and
 * prints the day of the week that date falls on.
 * 
 * @return void
 *
 */
function dayOfWeek()
{
    echo "Enter the day: \n";
    $d=AlgorithmsUtility::get_Integer();
    echo "Enter the month: \n";
    $m=AlgorithmsUtility::get_Integer();
    echo "Enter the year. \n";
    $y=AlgorithmsUtility::get_Integer();

    $y0 = floor($y - (14 - $m) / 12) +1;
    $x = floor($y0 + $y0/4 - $y0/100 + $y0/400);
    $m0 = ($m + 12 * floor(((14 - $m) / 12)) - 2);
    $d0 = floor(($d + $x + floor((31*$m0) / 12)) % 7);
    $d1 = "Sunday Monday Tuesday Wednesday Thursday Friday Saturday";
    $day = explode(" ", $d1);
    echo "day on given date is " . $day[$d0] . "\n";     
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
    $temp=AlgorithmsUtility::get_Integer();
    echo "Enter C for Celsius or F for Fahrenheit for the temperature you have input. \n";
    $chtemp=AlgorithmsUtility::get_String();

        if(strpos($chtemp , "c")===false&&strpos($chtemp , "C")===false){
            $conv =  ($temp * 9/5) + 32 ; 
        }
        else{
            $conv =  ($temp - 32) * 5/9 ; 
        }
        
        echo "converted temperature is ".$conv."\n";
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
    if(AlgorithmsUtility::validate_Integer($p))
    {
        echo "enter year ";
        $y =AlgorithmsUtility::get_Integer();

        if(AlgorithmsUtility::validate_Integer($y))
        {
            echo "enter rate ";
            $r0 = AlgorithmsUtility::get_Integer();

            if(AlgorithmsUtility::validate_Integer($r0))
            {
                $r = $r0/(12*100);
                 $n = 12* $y;
                    $pay = ($p*$r)/(1-(pow(1+$r,-$n)));
 
                    echo "Monthly payment is ".$pay;
            }
            else
            {
                echo "Enter a valid input.\n";
                AlgorithmsUtility::monthlyPayment();
            }
        }
        else
        {
            echo "Enter a valid input.\n";
            AlgorithmsUtility::monthlyPayment();
        }
    }
    else
    {
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
    $c=AlgorithmsUtility::get_Integer();
    if(AlgorithmsUtility::validate_Integer($c))
    {
        $t = $c ;
        $epsilon = 1e-15 ;

        while(abs($t-($c/$t))>$epsilon*$t)
        {
            $t = ($c/$t + $t)/2 ;
        }

        echo $t;

    }
    else
    {
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
function toBinary()
{ 
    echo "Enter the number you want binary representation of:\n";
    $n1=AlgorithmsUtility::get_Integer();
    $n=$n1;
    $binaryNum=array(); 
  
    $i = 0; 
    while ($n > 0)  
    { 
  
        $binaryNum[$i] = $n % 2; 
        $n = (int)($n / 2); 
        $i++; 
    } 
     echo "Binary representation of ".$n1." is : ";
  
    for ($j = $i - 1; $j >= 0; $j--)
    {
       echo  $binaryNum[$j]; 
    }
    AlgorithmsUtility::swapNibbles($n1);  
}

/**
 * swapNibbles() function - Swap nibbles and find the new number.
 * 
 * @param [integer] $number
 * @return void 
 */
function swapNibbles($number) 
{ 
    $swap_nibbles=(($number & 0x0F) << 4 | ($number & 0xF0) >> 4); 
    $power=$swap_nibbles;
    echo "\n"."Number generated after swapping nibbles is: ".$swap_nibbles;
    AlgorithmsUtility::isPowerOfTwo($power);
            
} 

/**
 * isPowerOfTwo() function -  Finds the resultant number and check 
 * if the numer is a power of 2.
 * 
 * @param [integer] $n
 * @return void 
 */
function isPowerOfTwo($n) 
{ 
    if ($n === 0)
    {
        $result=0;
    } 
    while ($n != 1) 
    { 
        if ($n % 2 != 0) 
            $result=0; 
            $n = $n / 2; 
    } 
    $result=1; 
  
    if($result===1)
    {
        echo "Number is power of two.\n";
    }
    else
    {
        echo "Number is not power of two.\n"; 
    }
}

/**
 * anagram() function -  One string is an anagram of another if the second is simply a
 * rearrangement of the first
 * 
 * @return void 
 */
function anagram(){
    $str1=readline("Enter first name: \n");
    $str2=readline("Enter second name: \n");
    $charArraya = str_split($str1);
    $charArrayb = str_split($str2);
    sort($charArraya);
    sort($charArrayb);
 
    if($charArraya==$charArrayb){
        echo "ANAGRAM.\n";
    }
    else{
        echo "Not anagram.\n";
    }
 }

}