<?php

//require abstract functions of Subject interface
include "Subject.php";

/**
 * PostOffice class to provides the functionality of the post office
 */
class PostOffice implements Subject
{
    //@var array $mail to store the mails of post office in an array
    private $mail = [];
    //@var array $observer to store the list of observers
    private $observer = [];

    /**
     * function to add mail to the mail array
     * 
     * @param Mail $m
     * @return void
     */
    public function addMail(Mail $m)
    {
        $this->mail[] = $m;
        $this->notifyObservers($m);
    }

    /** 
     * functiont to get mails 
     * 
     * @return array mail
     */
    public function getMails()
    {
        return $this->mail;
    }

    /**
     * functiont to register the person to observer list
     * 
     * @param $pers
     */
    function register(Person $pers)
    {
        $this->observer[] = $pers;
    }

    /**
     * funciton to unregister/remove the person from the observer list
     * 
     * @param $pers
     */
    function unregister(Person $pers)
    {
        if (($key = array_search($pers, $this->observer)) !== false) {
            unset($this->observer[$key]);
        }
    }


    /**
     * function to notify observers if mail is received
     *
     * @param array $mail
     * @return void
     */
    function notifyObservers(Mail $mail)
    {
        for ($i = 0; $i < count($this->observer); $i++) {
            if ($this->observer[$i]->name == $mail->rname) {
                $this->observer[$i]->update($mail);
            }
        }
    }
}
