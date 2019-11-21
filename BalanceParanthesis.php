<?php
include "ProgramLogic.php";

$stack_obj=new Stack();
$programLogic_obj=new ProgramLogic();
$exp=readline("Enter the expression.\n");
for ($i = 0; $i < strlen($exp); $i++) {

    $programLogic_obj->balParethesis($exp,$i);
}
//if empty its balanced and not if not balanced
if ($stack_obj->isEmpty())
    echo "paranthesis is balanced\n";
else
    echo "Paranthesis not balanced\n";
?>