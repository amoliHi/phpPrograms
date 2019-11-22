<?php
include "ProgramLogic.php";
/**
 * Simple Balanced Parentheses:- Take an Arithmetic Expression such as
 * (5+6)∗(7+8)/(4+3)(5+6)∗(7+8)/(4+3) where parentheses are used to order the
 * performance of operations. Ensure parentheses must appear in a balanced
 * fashion
 */

$programLogic_obj = new ProgramLogic();
$exp = readline("Enter the expression.\n");
for ($i = 0; $i < strlen($exp); $i++) {

    $programLogic_obj->balParethesis($exp, $i);
}
/*if empty its balanced and not if not balanced*/
if ($stack_obj->isEmpty())
    echo "paranthesis is balanced\n";
else
    echo "Paranthesis not balanced\n";
