<?php

//require abstract functions of Adapter interface
include "Adapter.php";
//require function of Socket class
include "Socket.php";

/**
 * SocketAdapter class which ast as a adptetr between mobile and socket
 */
class SocketAdapter extends Socket implements Adapter
{
    /**
     * @Override function to get 120 volts output
     * 
     * @return [int] gives 120v output
     */
    public function get120Volts()
    {
        return $this->getVolts();
    }

    /**
     * @Override function to get 3 volts output
     * 
     * @return [int] gives 3v output
     */
    public function get3Volts()
    {
        return $this->getVolts() / 40;
    }

    /**
     * @Override function to get 12 volts output
     * 
     * @return [int] gives 12v output
     */
    public function get12Volts()
    {
        return $this->getVolts() / 10;
    }
}
