<?php
include "dataStructureUtility.php";

class ProgramLogic{
    function balParethesis($exp,$i)
    {
        /**
         * if open paranthesis it will push else it will pop at closed
         */
        $stack_obj=new Stack();

            if ($exp[$i] == '[' || $exp[$i] == '{' || $exp[$i] == '(') 
                $stack_obj->push($exp[$i]);
            else if ($exp[$i] == ']'|| $exp[$i] == '}' || $exp[$i] == ')' ) {
                //checking if already empty
                if ($stack_obj->isEmpty()) {
                    // echo "Unbalanced\n";
                    return;
                }
                $stack_obj->pop();
            }
            return;
        
    }

}
// && $exp[$i] == '{' && $exp[$i] == '('
    // && $exp[$i] == '}' && $exp[$i] == ')'