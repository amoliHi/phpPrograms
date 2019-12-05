<?php

/**
 * Subject Interface to make subject implementation
 */
interface Subject
{
    /**
     * Abstract function to register observers
     *
     * @param Person $pers
     */

    function register(Person $pers);
    /**
     * Abstract function to unregister observers
     *
     * @param Person $pers
     */
    function unregister(Person $pers);

    /**
     * Abstract function to notify observers of any change
     *
     * @param Person $pers
     */
    function notifyObservers(Mail $mail);
}
