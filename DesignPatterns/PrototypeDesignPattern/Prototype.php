<?php

class Employees
{
    private $empList;
    public function __construct()
    {
        $param = func_get_args();
        $paraNum = func_num_args();
        if (method_exists($this,$f = '__construct'.($paraNum+1))) 
        {
            call_user_func_array(array($this,$f),$param);
        }
    } 
   
    public function __construct1()
    {
        $this->empList = [];
    }
    public function __construct2($list)
    {
        $this->empList = $list;
    }
    public function loadData()
    {
        array_push($this->empList, "akku");
        array_push($this->empList, "chirag");
        array_push($this->empList, "deepu");
        array_push($this->empList, "nishant");
        array_push($this->empList, "sarthak");
    }
    public function getList()
    {
        return $this->empList;
    }
    public function clone()
    {
        $temp = [];
        foreach ($this->getList() as $key) {
            array_push($temp,$key);
        }
        //$obj = new Employees();
        return new Employees($temp);
        //$obj->Employeess($temp);
    }
}
class Prototype {
    public function main()
    {
        $emp = new Employees();
        //$emp->Employeess();
        $emp->loadData();
        $empNew = $emp->clone();
        $empNew2 = $emp->clone();
        //print_r($empNew);
        $list = $empNew->getList();
        array_push($list,"abc");
        $list1 = $empNew2->getList();
        unset($list1[array_search("akku",$list1)]);
        echo "emps List: ";
        print_r($emp->getList()) ;
        echo "empsNew List: ";print_r($list);
        echo "empsNew1 List: ";print_r($list1);
    }
}
Prototype::main();
?>