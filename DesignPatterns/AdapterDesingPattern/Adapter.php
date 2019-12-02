<?php
/**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});
/**
 * class socket to act as the class with 1 method
 */
class Socket
{
    function getVolts()
    {
        return 120 ;
    }
}
/**
 * socket interface to provide rules for adapter
 */
interface Adapter
{
    public function get120Volts();
    public function get3Volts();
    public function get12Volts();
}
/**
 * socket adapter class which ast as a adptetr between mobile and socket
 */
class SocketAdapter extends Socket implements Adapter
{
    /**
     * method overridden to give 120 volts
     */
    public function get120Volts()
    {
        return $this->getVolts();
    }
    /**
     * function to get 3 volts output
     */
    public function get3Volts()
    {
        return $this->getVolts()/40;
    }
    /**
     * function to get 12 volts output
     */
    public function get12Volts()
    {
        return $this->getVolts()/10;
    }
}
/**
 * class mobile to create mobile object
 */
class Mobile{
    //variable to store the charging voltage of the mobile
    private $cvolt ;
    /**
     * constructor of the mobile
     */
    function __construct(int $volt)
    {
        $this->cvolt = $volt ;
    }
    /**
     * function to print charge the mobile if correct voltage is provided
     */
    function charge(int $volt){
        /**
         * charge the mobile if voltage os sam ethe required charging voltage
         * else does not charge
         */
        if($this->cvolt==$volt){
            echo "Charging";
        }
        else {
            echo "Not Charging";
        }
    }
}
//new mobile ogject
$mob = new Mobile(12);
//new adapter
$adapter = new SocketAdapter();
//give apropriate voltage
$volt = $adapter->get12Volts();
$mob->charge($volt);
?>