 
<?php 
/**
 * Subject Interface to make subject implementation
 */
interface Subject
{
    //methods to register and unregister observers
    function register(Person $pers);
    function unregister(Person $pers);
    //method to notify observers of change
    function notifyObservers(Mail $mail);
}
/**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});

/**
 * Class mail to make mail as an object
 */
class Mail{
    //var name to store the senders name 
    public $sname;
    //var to store the receivers name
    public $rname ;
    //var to store the message 
    protected $message;
    /**
     * constructor function to initialize the methods
     */
    function __construct(string $sname , string $message , string $rname ){
        $this->rname = $rname ;
        $this->message = $message ;
        $this->sname = $sname ;
    }
    /**
     * functiont to return the message
     */
    function getMessage(){
        return $this->message;
    }
}
/**
 * class post office provides the basic functionality of the post office
 */
class PostOffice implements Subject
{
    //var mail to store the mails of post office in an array in an array
    private $mail = [];
    //var private to store the list of observers
    private $observer = [];
    /**
     * function to add the ail to the mail array
     */
    public function addMail(Mail $m)
    {
        $this->mail[] = $m;
        $this->notifyObservers($m);
    }
    /** 
     * functiont to get mails 
     */
    public function getMails()
    {
        return $this->mail;
    }
    /**
     * functiont to register the person to observer list
     */
    function register(Person $pers)
    {
        $this->observer[] = $pers;
    }
    /**
     * funciton to unregister/remove the person from the observer list
     */
    function unregister(Person $pers){
        if (($key = array_search($pers, $this->observer)) !== false) {
            unset($this->observer[$key]);
        }
    }
    //function to notifyObservers the person if mail is received
    function notifyObservers(Mail $mail){
        for ($i=0; $i < count($this->observer); $i++) { 
            if($this->observer[$i]->name == $mail->rname ){
                $this->observer[$i]->update($mail);
            }
        }
    }
}
/**
 * interface observer to implement observer behaviour in the class
 */
interface Observer
{
    function update(Mail $mail);
}
/**
 * class person to provide basic properties of a person
 */
class Person implements Observer
{
    //var  name to store the name of the person
    public $name ;
    /**
     * constructor to initialize he default properties
     */
    function __construct(string $name ){
        $this->name = $name ;
    }
    /**
     * function to update the peron about the mail
     */
    function update(Mail $mail){
        echo "New Mail to ".$mail->rname." - ".$mail->getMessage()."from $mail->sname\n" ;
    }
}
$post= new PostOffice();
$akku = new Person("akshansh");
$nishu = new Person("nishant");
$post->register($akku);
$post->register($nishu);
$mail = new Mail("akshansh", "Where are you ?","nishant");
$post->addMail($mail);
?>