<?php

class Utility
{
    static function getInt()
    {
        $val=readline();
        while (!is_numeric($val)) {
            echo "ivalid input try again\n";
            $val=readline();
        }
    }

}

