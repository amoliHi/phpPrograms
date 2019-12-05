<?php

/**
 * Mail class to make mail as an object
 */
class Mail
{
    //@var string $sname to store the senders name 
    public $sname;
    //@var string $rname to store the receivers name
    public $rname;
    //@var string $message to store the message 
    protected $message;

    /**
     * Constructor function to initialize the above variables
     */
    function __construct(string $sname, string $message, string $rname)
    {
        $this->rname = $rname;
        $this->message = $message;
        $this->sname = $sname;
    }

    /**
     * Function to return the message
     * 
     * @return string $message
     */
    function getMessage()
    {
        return $this->message;
    }
}
