<?php

//require functions of Employees class 
include "Employees.php";

/**
 * Prototype class to create multiple Employee Object
 * using clone technique
 */
class Prototype
{
    /**
     * Driver function
     *
     * @return void
     */
    public function main()
    {
        $emp = new Employees();
        $emp->loadData();
        //@var $empNew hold cloned object created of Employees class
        $empNew = $emp->clone();
        //@var $empNew2 hold cloned object created of Employees class
        $empNew2 = $emp->clone();
        $list = $empNew->getList();
        //adding new name in $list array 
        array_push($list, "Kamal");
        $list1 = $empNew2->getList();
        unset($list1[array_search("akku", $list1)]);
        //displaying employees list
        echo "emps List: ";
        print_r($emp->getList());
        //displaying modified employees list
        echo "empsNew List: ";
        print_r($list);
        //displaying modified employees list
        echo "empsNew1 List: ";
        print_r($list1);
    }
}
