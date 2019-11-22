<?php
include "DataStructureUtility.php";

class BussinessLogic
{

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

    static function getInt()
    {
        fscanf(STDIN, "%d\n", $val);
        while (!is_numeric($val)) {
            echo "ivalid input try again\n";
            fscanf(STDIN, "%d\n", $val);
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
            for ($j = 1; $j < $n - 1; $j++) {
                if ($i % $j === 0)
                    $found++;
            }
            if ($found === 2)
                return true;
            return false;
        }
    }

    function isPrime($n)
    {
        for ($i = 2; $i <= $n / 2; $i++) {
            if ($n % $i == 0)
                return false;
        }
        return true;
    }



    function isLeapYear($year)
    {
        return (($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0);
    }

    function isPowerOfTwo($num2)
    {
        if ($num2 === 0)
            $return = 0;
        while ($num2 != 1) {
            if ($num2 % 2 != 0)
                $return = 0;
            $num2 = $num2 / 2;
        }
        $return = 1;
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
        if ($charArraya == $charArrayb)
            echo "ANAGRAM.\n";
        else
            echo "Not anagram.\n";
    }

    function isAnagram($s1, $s2)
    {
        $arr1 = str_split($s1, 1);
        $arr2 = str_split($s2, 1);
        if (count($arr1) != count($arr2))
            return false;
        for ($i = 0; $i < count($arr1); $i++) {
            if (array_search($arr1[$i], $arr2) !== false) {
                $key = array_search($arr1[$i], $arr2);
                unset($arr2[$key]);
            }
        }
        if (count($arr2) == 0)
            return true;
        else
            return false;
    }


    static function dayOfWeek($d, $m, $y)
    {
        $y0 = floor($y - (14 - $m) / 12);
        $x = floor($y0 + floor($y0 / 4) - floor($y0 / 100) + floor($y0 / 400));
        $m0 = $m + 12 * floor((14 - $m) / 12) - 2;
        $d0 = ($d + $x + floor((31 * $m0) / 12)) % 7;
        return $d0;
    }



    function unorderedlist()
    {
        $firstopen = fopen("myfile.txt", "r");
        $filecontent = file_get_contents("myfile.txt");
        $arr = explode(" ", $filecontent);
        fclose($firstopen);
        $size = count($arr);
        $obj = new LinkedList();
        for ($i = 0; $i < $size; $i++)
            $obj->insertLast($arr[$i]);
        $array = $obj->readList();
        print_r($array);
        $key = readline("Enter the word you want to search: \n");
        $obj->find($key);

        $found = $obj->find($key);
        if ($found == $key) {
            echo "Element found and now deleting it.\n";
            echo '".txt" file updated.' . "\n";
            $obj->deleteNode($key);
            $array1 = $obj->readList();
            print_r($array1);
            $new1 = implode(" ", $array1);
            $open1 = fopen("myfile.txt", "w");
            fwrite($open1, $new1);
            fclose($open1);
        } else {
            echo "Element not found. Adding element to the list.\n";
            echo '".txt" file updated.' . "\n";
            $obj->insertLast($key);
            $array2 = $obj->readList();
            print_r($array2);
            $updatedlist = implode(" ", $array2);
            $open2 = fopen("myfile.txt", "w");
            fwrite($open2, $updatedlist);
            fclose($open2);
        }
    }

    function orderedlist()
    {
        $firstopen = fopen("myfilenumber.txt", "r");
        $filecontent = file_get_contents("myfilenumber.txt");
        $arr = explode(" ", $filecontent);
        fclose($firstopen);
        $size = count($arr);
        $obj = new LinkedList();
        for ($i = 0; $i < $size; $i++)
            $obj->insertLast($arr[$i]);
        echo "Original list.\n";
        $array = $obj->readList();
        print_r($array);
        $key = readline("Enter the number you want to search: \n");
        $obj->find($key);

        $found = $obj->find($key);
        if ($found == $key) {
            echo "Element found and now deleting it.\n";
            echo '".txt" file updated.' . "\n";
            $obj->deleteNode($key);
            $obj->sortList();
            echo "Sorted list :\n";
            $array1 = $obj->readList();
            print_r($array1);
            $new1 = implode(" ", $array1);
            $open1 = fopen("myfilenumber.txt", "w");
            fwrite($open1, $new1);
            fclose($open1);
        } else {
            echo "Element not found. Adding element to the list.\n";
            echo '".txt" file updated.' . "\n";
            $obj->insertLast($key);
            $obj->sortList();
            echo "Sorted list: \n";
            $array2 = $obj->readList();
            print_r($array2);
            $updatedlist = implode(" ", $array2);
            $open2 = fopen("myfilenumber.txt", "w");
            fwrite($open2, $updatedlist);
            fclose($open2);
        }
    }



    /**
     * Function to Run the calender Usind Queue
     */
    function calQueue()
    {
        $que = new Queue();
        echo "Enter Month ";
        $month = BussinessLogic::get_Integer();
        while ($month > 12) {
            echo "enter correct month ";
            $month = BussinessLogic::get_Integer();
        }
        echo "Enter Year ";
        $year = BussinessLogic::get_Integer();
        while ($year < 1000) {
            echo "enter correct year ";
            $year = BussinessLogic::get_Integer();
        }
        $totalDays = BussinessLogic::calTotal($month, $year);
        $start = BussinessLogic::dayOfWeek(1, $month, $year);
        $count = 1;
        $days = explode(" ", "Sun   Mon   Tue   Wed   Thu   Fri   Sat");
        for ($i = 0; $i <= $start; $i++) {
            $que->enqueue(new WeekDay($days[$i], " "));
        }
        for ($i = 0; $i < $totalDays; $i++) {
            $que->enqueue(new WeekDay($days[$start % 7], $count++));
            $start++;
        }
        BussinessLogic::printCalQ($que);
    }

    /**
     * Function to print the queue in form of calender
     */
    function printCalQ($que)
    {
        echo "Sun   Mon   Tue   Wed   Thu   Fri   Sat\n";
        for ($i = 0; !$que->isEmpty(); $i++) {
            $w = $que->dequeue();
            if ($w->date < 10) {
                echo "$w->date" . "     ";
            } else {
                echo "$w->date" . "    ";
            }
            if ($i % 7 == 6) {
                echo "\n";
            }
        }
    }
    /**
     * Function to calculate the total days in a month
     */
    function calTotal($month, $year)
    {
        if ($month < 8) {
            if ($month % 2 == 0) {
                if ($month == 2) {
                    if (BussinessLogic::isLeapYear($year)) {
                        return 29;
                    }
                    return 28;
                }
                return 30;
            } else {
                return 31;
            }
        } else {
            if ($month % 2 == 0) {
                return 31;
            }
            return 30;
        }
    }

    /**
     * getprime($range) - Function to get the prime numbers from 0 to 1000. 
     * @param range the range till which to find the prime numbers
     * @return array array of prime numbers
     */

    function getprime($range)
    {
        $prime = [];
        $count = 0;
        for ($i = 2; $i < $range; $i++) {
            if (BussinessLogic::isprime($i))
                $prime[$count++] = $i;
        }
        return $prime;
    }

    function get2d()
    {
        $arr = [];
        for ($i = 0; $i < 10; $i++) {
            $aa = array();
            array_push($arr, $aa);
        }
        return $arr;
    }

    /**
     * getIndex($numb)- function to get the index to store number in specified place
     */
    function getIndex($numb)
    {
        $num = $numb;
        if ($num < 100)
            return 0;
        while ($num > 9) {
            $num = floor($num / 10);
        }
        return $num;
    }
    /**
     * primeRun()-Function to run and test the other functions in the file
     */
    function primeAnagram()
    {
        $primeArr = BussinessLogic::getPrime(1000);
        $anagram = [];
        $nonAnagram = [];
        for ($i = 0; $i < count($primeArr); $i++) {
            for ($j = 0; $j < count($primeArr); $j++) {
                if ($i != $j) {
                    if ($b = BussinessLogic::isAnagram($primeArr[$i], $primeArr[$j])) {
                        array_push($anagram, $primeArr[$i]);
                        break;
                    }
                }
            }
            if (!$b)
                array_push($nonAnagram, $primeArr[$i]);
        }
        $array2d = [];
        /*pushing two arrays in the 2d arrays*/
        array_push($array2d, $anagram);
        array_push($array2d, $nonAnagram);
        echo "2D array stored is : ";
        BussinessLogic::print2danagram($array2d);
        echo "\n";
    }

    function print2danagram($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            if ($i == 1)
                echo "\nNon-Anagrams" . "\n";
            else
                echo "Anagrams" . "\n";
            echo "\n";
            for ($j = 0; $j < count($arr[$i]); $j++)
                print_r($arr[$i][$j] . ",");
        }
    }

    /**
     * Function to run and test the above functions and run the programs
     */
    function prime2darray()
    {
        $primeArr = BussinessLogic::getPrime(1000);
        $prime2d = BussinessLogic::get2d();
        for ($i = 0; $i < count($primeArr); $i++) {
            $index = BussinessLogic::getIndex($primeArr[$i]);
            $prime2d[$index][count($prime2d[$index])] = $primeArr[$i];
        }
        echo "2D array stored is :";
        BussinessLogic::print2d($prime2d);
        echo "\n";
    }

    function primearray2d()
    {
        $primeArr = BussinessLogic::getPrime(1000);
        $prime2d = BussinessLogic::get2d();
        for ($i = 0; $i < count($primeArr); $i++) {
            $index = BussinessLogic::getIndex($primeArr[$i]);
            $prime2d[$index][count($prime2d[$index])] = $primeArr[$i];
        }
        echo "2D array stored is :";
        BussinessLogic::print2d($prime2d);
        echo "\n";
    }

    function print2d($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            echo "\n";
            for ($j = 0; $j < count($arr[$i]); $j++) {
                echo $arr[$i][$j] . "  ";
            }
        }
    }

    /**
     * queueAnagrams() function-Add the Prime Numbers that are Anagram in the 
     * Range of 0 ­to 1000 in a Queue using the Linked List and Print the Anagrams
     * from the Queue. Note no Collection Library can be used.
     */

    function queueAnagrams()
    {
        $que = new Queue();
        $arr = BussinessLogic::getprime(1000);
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = 0; $j < count($arr); $j++) {
                if ($i != $j) {
                    if (BussinessLogic::isAnagram($arr[$i], $arr[$j])) {
                        $que->enqueue($arr[$i]);
                        break;
                    }
                }
            }
        }
        echo "Anagrams in Queue Are :\n\n";
        echo $que . "\n\n";
    }

    /**
     * stackAnagram() - function to print the anagrams in reverse order using linked list.
     */
    function stackAnagram()
    {
        $stack = new Stack();
        $arr = BussinessLogic::getprime(1000);
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = 0; $j < count($arr); $j++) {
                if ($i != $j) {
                    if (BussinessLogic::isAnagram($arr[$i], $arr[$j])) {
                        $stack->push($arr[$i]);
                        break;
                    }
                }
            }
        }
        echo "Prime Anagrams In Stack Are :\n";
        BussinessLogic::PrintRevStack($stack);
    }

    function PrintRevStack($stack)
    {
        for ($i = 0; $i < $stack->size(); $i++) {
            echo $stack->pop() . ",";
        }
        echo "\n";
    }

    function isPallindrome()
    {
        /*class containing dequeue and its functions
        creating new dequeue*/
        $deq = new Dequeue();
        echo "Enter a string to check for palindrome: \n";
        $str = readline();
        /*adding string characters to the dequeue*/
        for ($i = 0; $i < strlen($str); $i++) {
            $deq->addRear($str[$i]);
        }
        for ($i = 0; $i < strlen($str) / 2; $i++) {
            $f = $deq->removeFront();
            $r = $deq->removeRear();
            if ($f != $r) {
                echo "\nNot Pallindrome";
                return false;
            }
            echo "\nIs Pallindrome";
            return true;
        }
    }
}

class WeekDay
{
    function __construct($day, $date)
    {
        $this->date = $date;
        $this->day = $day;
    }
    public $day;
    public $date;
}
