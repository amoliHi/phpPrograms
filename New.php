<?php
class Queue
{
    public $queue;
    public $front;
    public $rear;
    public $size;

    function __construct()
    {
        $this->queue = array();
        $this->front = 0;
        $this->rear = 0;
        $this->size = 0;
    }

    function enqueue($data)
    {
        $this->queue[$this->rear] = $data;
        $this->rear = $this->rear + 1;
        $this->size = $this->size + 1;
    }

    function dequeue()
    {
        $data = $this->queue[$this->front];
        $this->front = $this->front + 1;
        $this->size = $this->size - 1;
    }

    function isEmpty()
    {
        return ($this->size==0);
    }

    function showQueue()
    {
        for ($i = 0; $i < $this->size; $i++) { 
            echo $this->queue[$this->front+$i]." ";
        }
    }
}

$obj=new Queue();
$obj->enqueue(10);
$obj->enqueue(20);
$obj->enqueue(30);
$obj->enqueue(40);
$obj->showQueue();
$obj->dequeue();
$obj->dequeue();
if($obj->isEmpty())
echo " Queue is empty\n";
else
echo "NOT EMPTY";
$obj->showQueue();
