<?php

/**
 * Desc ­> Read in the following message: Hello <<name>>, We have your full
 * name as <<full name>> in our system. your contact number is 91­xxxxxxxxxx.
 * Please,let us know in case of any clarification Thank you BridgeLabz 01/01/2016.
 * Use Regex to replace name, full name, Mobile#, and Date with proper value.
 * b. I/P ­> read in the Message
 * c. Logic ­> Use Regex to do the following
 * i. Replace <<name>> by first name of the user ( assume you are the user)
 * ii. replace <<full name>> by user full name.
 * iii. replace any occurance of mobile number that should be in format
 * iv. 91­xxxxxxxxxx by your contact number.
 * replace any date in the format XX/XX/XXXX by current date.
 * d. O/P ­> Print the Modified Message.
 * 
 */

//require functions in OPPsProgramLogic class
require "OPPsProgramLogic.php";
$object=new OPPsProgramLogic();
//calling Driver function
$object->regExDemonstration();
