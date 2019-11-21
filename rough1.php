<?php



// class Queue
// {
//     public $front;
//     public $rear;
//     public $Queue;
//     public $size;

//     public function __construct()
//     {
//         $this->Queue = array();
//         $this->capacity = count($this->Queue);
//         $this->front = $this->size= 0; 
// 		$this->rear = $this->capacity -1; 
//     }

//     public function enqueue($item) 
// 	{
//             $this->rear = ($this->rear + 1)%$this->capacity; 
//             $this->Queue[$this->rear] = $item; 
//             $this->size = $this->size + 1; 
// 		echo $item . " enqueued to queue\n"; 
// 	} 

//     public function dequeue() 
// 	{	
// 		$item = $this->Queue[$this->front]; 
// 		$this->front = ($this->front + 1)%$this->capacity; 
// 		$this->size = $this->size - 1; 
// 		return $item; 
// 	} 


//     public function isEmpty(){
//     return ($this->size == 0);
//     }  


//     public function isFull() 
// 	{ return ($this->size == $this->capacity); 
// 	} 

//     public function display($object)
//     {
//         while (!$object->isEmpty()) {
//             $value = $object->dequeue();
//             echo $value . " ";
//         }
//         echo "\n";
//     }
// }

// $obj = new Queue();
// $obj->enqueue(1);
// $obj->enqueue(2);
// $obj->enqueue(3);
// $obj->enqueue(4);
// $obj->display($obj);


// class Queue 
// { 
// 	public function enQueue($x) 
// 	{ 
// 		while (Stack::isEmpty()) 
// 		{ 
// 			Stack::push(Stack::pop()); 
// 		} 

// 		Stack::push($x); 

// 		// Push everything back to s1 
// 		while (Stack::isEmpty()) 
// 		{ 
// 			Stack::push(Stack::pop()); 
// 			//s2.pop(); 
// 		} 
// 	} 

// 	// Dequeue an item from the queue 
// 	public function deQueue() 
// 	{ 
// 		// if first stack is empty 
// 		if (Stack::isEmpty()) 
// 		{ 
// 			echo "Queue is Empty\n"; 
// 			return;
// 		} 

// 		// Return top of s1 
// 		$x = Stack::peek(); 
// 		Stack::pop(); 
// 		return $x; 
// 	} 
// } 


// 	$q = new Queue(); 
// 	$q->enQueue(1); 
// 	$q->enQueue(1); 
// 	$q->enQueue(1); 

//     echo($q->deQueue());
//     echo($q->deQueue()); 




class Queue
{
   
    function enqueue($item)
    {
        return LinkedList::insertatStart($item);
    }
   
    function dequeue()
    {


        return LinkedList::deleteLastNode(0);
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
        return $this->list->count();
    }
}
$q = new Queue();
$q->enQueue(1);
$q->enQueue(2);
$q->enQueue(3);

        // while ($this->list->isEmpty()) {
        //     $value = $this->list->dequeue();
        //     echo $value . " ";
        // }
        // echo "\n";

