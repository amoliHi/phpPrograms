<?php
include "dataStructureUtility.php";

class Unorderedlist
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
    function insertatStart($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;
        if ($this->lastNode == NULL)
            $this->lastNode = &$link;
        $this->count++;
    }
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
    function readList()
    {
        $listData = array();
        $current = $this->firstNode;
        $i = 0;
        while($current != NULL) {
            $listData[$i] = $current->readNode();
            $current = $current->next;
            $i++;
        }
        return $listData;
    }

    public function find($key)
    {
        $current = $this->firstNode;
        while($current->data != $key)
        {
            if($current->next == NULL)
                return null;
            else
                $current = $current->next;
        }
        return $current->data;
    }


    public function deleteFirstNode()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;
        if ($this->firstNode != NULL)
            $this->count--;
        return $temp;
    }
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
    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;
        while ($current->data != $key) {
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
}

function unorderedlist(){
    $firstopen= fopen("myfile.txt", "r");
    $filecontent = file_get_contents("myfile.txt");
    $arr = explode(" ", $filecontent);
    fclose($firstopen);
    $size = count($arr);
    $obj = new Unorderedlist();
    for ($i = 0; $i < $size; $i++) {
        $obj->insertLast($arr[$i]);
    }
    $array=$obj->readList();
    print_r($array);
    $key = readline("Enter the word you want to search: \n");
    $obj->find($key);
    
    $found=$obj->find($key);
    if($found==$key){
        echo "Element found and now deleting it.\n";
        echo '".txt" file updated.'."\n";
        $obj->deleteNode($key);
        $array1=$obj->readList();
        $new1=implode(" ",$array1);
        $open1=fopen("myfile.txt", "w");
        fwrite($open1, $new1);
        fclose($open1);
    }
    else{
        echo "Element not found. Adding element to the list.\n";
        echo '".txt" file updated.'."\n";
        $obj->insertLast($key);
        $array2=$obj->readList();
        $updatedlist=implode(" ",$array2);
        $open2=fopen("myfile.txt", "w");
        fwrite($open2,$updatedlist );
        fclose($open2);
    }
}

