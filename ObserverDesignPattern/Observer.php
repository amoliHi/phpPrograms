<?php

/**
 * Observer interface to implement observer behaviour in the class
 */
interface Observer
{
    /**
     * Abstract function to update mail array 
     *
     * @param array $mail
     * @return void
     */
    function update(Mail $mail);
}
