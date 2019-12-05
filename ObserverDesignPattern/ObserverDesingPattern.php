 
<?php

//require functions of PostOffice class
include "PostOffice.php";
//require functions of Person class
include "Person.php";
//require functions of Mail class
include "Mail.php";

$post = new PostOffice();
$akku = new Person("Pramod");
$nishu = new Person("Kamal");
$post->register($akku);
$post->register($nishu);
$mail = new Mail("Pramod", "How are you ?", "Kamal");
$post->addMail($mail);
?>