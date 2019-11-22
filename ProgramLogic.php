<?php
include "DataStructureUtility.php";

class ProgramLogic
{
    function balParethesis($exp, $i)
    {
        /**
         * if open paranthesis it will push else it will pop at closed
         */
        $stack_obj = new Stack();
        if ($exp[$i] == '[' || $exp[$i] == '{' || $exp[$i] == '(')
            $stack_obj->push($exp[$i]);
        else if ($exp[$i] == ']' || $exp[$i] == '}' || $exp[$i] == ')') {
            /*checking if already empty*/
            if ($stack_obj->isEmpty())
                return;
            $stack_obj->pop();
        }
        return;
    }
}

