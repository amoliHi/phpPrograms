<?php

/**
 * Employee class to create employee list
 */
class Employees
{
    //@var mixed $empList further to be initialized as an empty array
    private $empList;
    /**
     * Constructor function
     */
    public function __construct()
    {
        $param = func_get_args();
        $paraNum = func_num_args();
        if (method_exists($this, $f = '__construct' . ($paraNum + 1))) {
            call_user_func_array(array($this, $f), $param);
        }
    }

    /**
     * Constructor function to declare empty array to store employee list 
     *
     * @return void
     */
    public function __construct1()
    {
        $this->empList = [];
    }

    /**
     * Constructor function
     *
     * @param array $list
     * @return void
     */
    public function __construct2($list)
    {
        $this->empList = $list;
    }

    /**
     * Function to store employees name in array
     *
     * @return void
     */
    public function loadData()
    {
        array_push($this->empList, "Pankaj");
        array_push($this->empList, "Raj");
        array_push($this->empList, "David");
        array_push($this->empList, "Lisa");
        array_push($this->empList, "Kumar");
    }

    /**
     * Function when called provide the list of employees name
     *
     * @return $empList array storing list of employees name
     */
    public function getList()
    {
        return $this->empList;
    }

    /**
     * Function to be used when cloning the object of Employees class
     *
     * @return new object of Employees class
     */
    public function clone()
    {
        //@var array $temp empty array
        $temp = [];
        foreach ($this->getList() as $key) {
            array_push($temp, $key);
        }
        return new Employees($temp);
    }
}
