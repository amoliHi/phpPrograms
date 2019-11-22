<?php
/**
 * ListNode class for the linked list
 */
class ListNode
{
    public $data;
    public $next;

    /**
     * __construct($data) function - for storing the data.
     */
    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
    public function readNode()
    {
        return $this->data;
    }
}

class LinkedList
{
    public $firstNode;
    public $lastNode;
    public $count;

    function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }

    /**
     *  insertatStart($data) function - for inserting data at first position on every insertion.
     * 
     */
    function insertatStart($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;
        if ($this->lastNode == NULL)
            $this->lastNode = &$link;
        $this->count++;
    }

    /**
     *  insertLast($data) function - for inserting data at last position on every insertion.
     * 
     */
    public function insertLast($data)
    {
        if ($this->firstNode != NULL) {
            $link = new ListNode($data);
            $this->lastNode->next = $link;
            $link->next = NULL;
            $this->lastNode = &$link;
            $this->count++;
        } else
            $this->insertatStart($data);
    }

    function add($data)
    {
        $temp = new ListNode($data);
        if ($this->isEmpty()) {
            $this->firstNode = $temp;
            $this->firstNode->next = $this->lastNode;
        } else {
            $temp->next = $this->firstNode;
            $this->firstNode = $temp;
        }
        $this->count++;
    }

    /**
     *  isEmpty() function - to check if linked list is empty. 
     * 
     */
    public function isEmpty()
    {
        return $this->firstNode == NULL;
    }


    public function readNode($nodePos)
    {
        if ($nodePos <= $this->count) {
            $current = $this->firstNode;
            $pos = 1;
            while ($pos != $nodePos) {
                if ($current->next == NULL)
                    return null;
                else
                    $current = $current->next;
                $pos++;
            }
            return $current->data;
        } else
            return NULL;
    }

    /**
     *  readList() function - to read linked list and store it in an array. 
     *  @return array
     */
    function readList()
    {
        $listData = array();
        $current = $this->firstNode;
        $i = 0;
        while ($current != NULL) {
            $listData[$i] = $current->readNode();
            $current = $current->next;
            $i++;
        }
        return $listData;
    }

    /**
     *  find($key) function - to read linked list and store it in an array. 
     *  @param $key - data passed by user to search in linked list.
     *  @return data
     */
    public function find($key)
    {
        $current = $this->firstNode;
        while ($current->data != $key) {
            if ($current->next == NULL)
                return null;
            else
                $current = $current->next;
        }
        return $current->data;
    }

    /**
     *  deleteNode($index) function - delete a node at a given position/index in linked list. 
     *  @param $index [integer] 
     *  @return data
     */
    public function deleteNode($index)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;
        while ($current->data != $index) {
            if ($current->next == NULL)
                return NULL;
            else {
                $previous = $current;
                $current = $current->next;
            }
        }
        if ($current == $this->firstNode) {
            if ($this->count == 1) {
                $this->lastNode = $this->firstNode;
            }
            $this->firstNode = $this->firstNode->next;
        } else {
            if ($this->lastNode == $current) {
                $this->lastNode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }

    /**
     *  deleteFirstNode() function - delete first node from linked list. 
     *  
     */
    public function deleteFirstNode()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;
        if ($this->firstNode != NULL)
            $this->count--;
        return $temp;
    }

    /**
     *  deleteLastNode() function - delete last node from linked list. 
     *  
     */
    public function deleteLastNode()
    {
        if ($this->firstNode != NULL) {
            if ($this->firstNode->next == NULL) {
                $this->firstNode = NULL;
                $this->count--;
            } else {
                $previousNode = $this->firstNode;
                $currentNode = $this->firstNode->next;
                while ($currentNode->next != NULL) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }
                $previousNode->next = NULL;
                $this->count--;
            }
        }
    }

    /**
     *  size() function - to get the complete size of linked list. 
     */
    function size()
    {
        return $this->count;
    }

    function append($data)
    {
        $temp = new ListNode($data);
        if ($this->isEmpty()) {
            $this->firstNode = $temp;
            $this->firstNode->next = $this->lastNode;
        } else {
            $node = $this->firstNode;
            while ($node->next != null) {
                $node = $node->next;
            }
            $node->next = $temp;
        }
        $this->count++;
    }

    function pop()
    {
        try {
            if ($this->size() == 0) {
                throw new Exception("No Item To Pop ,Empty!!!!!!");
            }
            if ($this->firstNode->next == null) {
                $data = $this->firstNode->data;
                $this->firstNode = null;
                $this->count--;
                return $data;
            }
            $node = $this->firstNode;

            while ($node->next != null) {
                $prev = $node;
                $node = $node->next;
            }
            $ret = $node->data;
            $prev->next = null;
            $this->count--;
            return $ret;
        } catch (Exception $e) {
            echo "\n", $e->getMessage(), "\n";
        }
    }

    /**
     * function to pop the element from the desired position
     * 
     * @throws Exception if list is empty
     */
    function popPos($pos)
    {
        try {
            if ($pos < 0 && $pos > $this->size() - 1) {
                throw new Exception("Index Out Of Bound");
                return;
            } else if ($this->size() == 0) {
                throw new Exception("No Item To Pop ,Empty!!!!!!");
            } else if ($pos == 0) {
                $data = $this->firstNode->data;
                $this->firstNode = $this->firstNode->next;
                $this->count--;
                return $data;
            } else {
                $counting = 0;
                $node = $this->firstNode;

                while ($pos != $counting) {
                    $prev = $node;
                    $node = $node->next;
                    $counting++;
                }
                $data = $node->data;
                $prev->next = $node->next;
                $this->count--;
                return $data;
            }
        } catch (Exception $e) {
            echo "\n", $e->getMessage();
        }
    }

    function __toString()
    {
        $s = "{ ";
        $node = $this->firstNode;
        while ($node != null) {
            $s .= $node->data . ",";
            $node = $node->next;
        }
        $s = substr($s, 0, -1);
        return $s . " }";
    }

    function sortList()
    {
        //Node current will point to head  
        $current = $this->firstNode;
        $index = null;

        if ($this->firstNode == null) {
            return;
        } else {
            while ($current != null) {
                //Node index will point to node next to current  
                $index = $current->next;

                while ($index != null) {
                    //If current node's data is greater than index's node data, swap the data between them  
                    if ($current->data > $index->data) {
                        $temp = $current->data;
                        $current->data = $index->data;
                        $index->data = $temp;
                    }
                    $index = $index->next;
                }
                $current = $current->next;
            }
        }
    }
}

class Stack
{
    public $stack;
    public $top;
    public $size;

    public function __construct()
    {
        $this->stack = array();
        $this->top = -1;
        $this->size = 0;
    }

    /**
     * function to push data at the end of the stack
     * @param item the item to be pushed
     */
    public function push($item)
    {
        $this->stack[++$this->top] = $item;
        $this->size++;
    }
    /**
     * function to delete data at the start of the stack
     * 
     */
    public function pop()
    {
        return $this->stack[$this->top--];
        $this->size--;
    }

    public function peek()
    {
        return $this->stack[$this->top];
    }

    public function isEmpty()
    {
        return ($this->top == -1);
    }

    public function isFull()
    {
        return ($this->top + 1);
    }

    public function top()
    {
        return current($this->stack);
    }

    public function size()
    {
        return $this->size;
    }
}


class Queue
{
    /**
     * list to store the element and implement linked list
     */
    public $list;
    /**
     * Constructor function to initialize the list 
     */
    function __construct()
    {
        $this->list = new LinkedList();
    }
    /**
     * function to push data at the end of the queue
     * @param item the item to be pushed
     */
    function enqueue($item)
    {
        $this->list->append($item);
    }
    /**
     * Function to remove the item from the start of the list
     */
    function dequeue()
    {
        return $this->list->popPos(0);
    }
    /**
     * Function to check if the queue is empty or not
     * @return boolean true of false
     */
    function isEmpty()
    {
        return $this->list->isEmpty();
    }
    /**
     * Function to check the size of queue
     * @return size the size of the queue
     */
    function size()
    {
        return $this->list->size();
    }
    function __toString()
    {
        return $this->list->__toString();
    }
}

class Calander
{

    // take input month and year from user
    function getInput()
    {
        echo ("Enter the month : ");
        $month = readline();

        echo ("Enter the Year : ");
        $year = readline();

        $months = array(
            "", "January", "February", "March", "April", "May",
            "June", "July", "August", "September", "October", "November", "December"
        );
        $algo = new BussinessLogic();
        $days = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($month == 2 && $algo->isLeapYear($year)) {
            $days[$month] = 29;
        }
        echo $months[$month] . $year . "\n";
        echo " Su Mo Tu We Th Fr Sa \n";

        $d = $algo->dayOfWeek($month, 1, $year);
        for ($i = 0; $i < $d; $i++) {
            echo "   ";
        }
        for ($j = 1; $j <= $days[$month]; $j++) {
            echo " " . $j;
            if ((($j + $d) % 7 == 0) || ($j == $days[$month])) {
                echo "\n";
            }
        }
    }
}

class Dequeue
{
    /**
     * list to store the element and implement linked list
     */
    private $list;
    /**
     * Constructor function to initialize the list 
     */
    function __construct()
    {
        $this->list = new LinkedList();
    }
    /**
     * function to push data at the end of the queue
     * @param item the item to be pushed
     */
    function addRear($item)
    {
        $this->list->append($item);
    }
    /**
     * function to push data at the start of the queue
     * @param item the item to be pushed
     */
    function addFront($item)
    {
        $this->list->add($item);
    }
    /**
     * Function to remove the item from the start of the list
     */
    function removeFront()
    {
        return $this->list->popPos(0);
    }
    /**
     * Function to remove the item from the end of the list
     */
    function removeRear()
    {
        return $this->list->popPos($this->size() - 1);
    }
    /**
     * Function to check if the queue is empty or not
     * @return boolean true of false
     */
    function isEmpty()
    {
        return $this->list->isEmpty();
    }
    /**
     * Function to check the size of queue
     * @return size the size of the queue
     */
    function size()
    {
        return $this->list->size();
    }
    function __toString()
    {
        return $this->list->__toString();
    }
}
