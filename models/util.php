<?php

abstract class UTIL
{
    public static function dumpVar($var)
    {
        echo "<pre>";
        if(is_array($var))
        {
            print_r($var);
        }
        else
        {
            var_dump($var);
        }
        echo"</pre>";
    }
}

?>