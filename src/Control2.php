<?php
namespace src;

class Control2
{

    public function __construct()
    {}
    public function uchoGet($klucz)
    {
        if (array_key_exists($klucz, Config::$view)) {
            echo $klucz . '<br>' . Config::$view[$klucz];
        }
    }
    
}

