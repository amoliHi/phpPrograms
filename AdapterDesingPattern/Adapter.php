<?php

/**
 * Adapter interface to provide different volts
 */
interface Adapter
{
    public function get120Volts();
    public function get3Volts();
    public function get12Volts();
}
