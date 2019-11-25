<?php

include "OPPsProgramLogic.php";

$arr = json_decode(file_get_contents("AddressBook.json"));
addressbkmenu($arr);
